
<?php
    use yii\bootstrap5\Html;
?>


<nav class="navbar fixed-top navbar-expand-lg birun-nav">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <?= Html::img('@web/assets/logos/aktivlogowhite.png', ['alt' => 'AKTIV logo', 'class' => 'position-relative d-inline-block align-middle', 'width' => '120px', 'height' => '30px']) ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Biz haqimizda</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Yuridik shaxslarga <i class="bi bi-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Xizmatlar <i class="bi bi-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Narxlar</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Manzillarimiz</a></li>
                <li class="nav-item"><a class="nav-link disabled" aria-disabled="true">Aloqa</a></li>
            </ul>
        </div>
        <!-- Desktop Actions -->
        <div class="header-actions d-none d-lg-flex align-items-center gap-2 ms-auto">
            <button type="button" class="btn btn-primary header_login-btn"
                    data-bs-toggle="modal" data-bs-target="#loginModal">
                Tizimga kirish
            </button>
        </div>
    </div>
</nav>

