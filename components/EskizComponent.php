<?php

namespace components;

use yii\base\Component;

class EskizComponent extends Component
{
    public $email;
    public $password;

    private $token;
    private $tokenFile = '@runtime/eskiz_token.json';

    public function init()
    {
        parent::init();
        $this->loadToken();
        if (!$this->token) {
            $this->authenticate();
        }
    }

    private function loadToken()
    {
        $file = Yii::getAlias($this->tokenFile);
        if (file_exists($file)) {
            $data = json_decode(file_get_contents($file), true);
            if (!empty($data['token'])) {
                $this->token = $data['token'];
            }
        }
    }

    private function saveToken($token)
    {
        $file = Yii::getAlias($this->tokenFile);
        file_put_contents($file, json_encode(['token' => $token]));
        $this->token = $token;
    }

    private function authenticate()
    {
        $client = new Client();

        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl('https://notify.eskiz.uz/api/auth/login')
            ->setData([
                'email' => $this->email,
                'password' => $this->password
            ])
            ->send();

        if ($response->isOk) {
            $newToken = $response->data['data']['token'];
            $this->saveToken($newToken);
        }
    }

    private function refreshToken()
    {
        $client = new Client();

        $response = $client->createRequest()
            ->setMethod('PATCH')
            ->setUrl('https://notify.eskiz.uz/api/auth/refresh')
            ->addHeaders(['Authorization' => 'Bearer ' . $this->token])
            ->send();

        if ($response->isOk) {
            $newToken = $response->data['data']['token'];
            $this->saveToken($newToken);
        } else {
            $this->authenticate();
        }
    }

    public function sendSms($phone, $message)
    {
        $client = new Client();

        $request = $client->createRequest()
            ->setMethod('POST')
            ->setUrl('https://notify.eskiz.uz/api/message/sms/send')
            ->addHeaders([
                'Authorization' => 'Bearer ' . $this->token
            ])
            ->setData([
                'mobile_phone' => $phone,
                'message' => $message,
                'from' => '4546',
                'callback_url' => null
            ]);

        $response = $request->send();

        // Retry if token expired
        if ($response->statusCode == 401) {
            $this->refreshToken();
            $request->addHeaders([
                'Authorization' => 'Bearer ' . $this->token
            ]);
            $response = $request->send();
        }

        return $response->data;
    }
}
