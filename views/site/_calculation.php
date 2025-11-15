<div class="py-4 px-0">
    <h1 class="birun-block-header"><?= Yii::t('calc', 'Calculator') ?></h1>

    <div class="main-card p-4">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="calculation_title fw-bold fs-4 mb-0"><?= Yii::t('calc', 'Where are you sending?')?></h2>
            <button class="btn btn-primary-custom text-white">
                <i class="fas fa-download me-2"></i>
                <?= Yii::t('calc', 'Rates')?>
            </button>
        </div>

        <!-- Weight and Location Inputs -->
        <div class="row g-3 mb-4">
            <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                <label class="form-label fw-medium"><?= Yii::t('calc', 'Load Weight')?></label>
                <div class="weight-control position-relative">
                    <button class="weight-btn" style="left: 2px" onclick="decrementWeight()">
                        <i class="fas fa-minus"></i>
                    </button>
                    <input type="number" class="weight-input" id="weight" value="kg">
                    <button class="weight-btn" style="right: 2px" onclick="incrementWeight()">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                <label class="form-label fw-medium"><?= Yii::t('calc', 'Load Dimensions')?></label>
                <select class="form-select">
                    <option><?= Yii::t('calc', 'mm')?></option>
                    <option><?= Yii::t('calc', 'sm')?></option>
                    <option><?= Yii::t('calc', 'm')?></option>
                </select>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                <label class="form-label fw-medium"><?= Yii::t('calc', 'From')?></label>
                <select class="form-select">
                    <option><?= Yii::t('calc', 'Tashkent')?></option>
                    <option><?= Yii::t('calc', 'Samarkand')?></option>
                    <option><?= Yii::t('calc', 'Bukhara')?></option>
                </select>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                <label class="form-label fw-medium"><?= Yii::t('calc', 'To')?></label>
                <select class="form-select">
                    <option><?= Yii::t('calc', 'Tashkent')?></option>
                    <option><?= Yii::t('calc', 'Samarkand')?></option>
                    <option><?= Yii::t('calc', 'Bukhara')?></option>
                </select>
            </div>
        </div>

        <!-- Services Section -->
        <h3 class="fw-bold fs-5 mb-3"><?= Yii::t('calc', 'Service Types')?></h3>

        <div class="service-item">
            <div class="service-icon icon-home rounded-circle">
                <i class="fas fa-home"></i>
            </div>
            <div class="flex-grow-1 d-flex align-items-center justify-content-start gap-2">
                <div class="fw-medium"><?= Yii::t('calc', 'From office to office')?></div>
                <div class="text-muted small">0 <?= Yii::t('calc', 'uzs')?></div>
            </div>
            <div class="radio-circle"></div>
        </div>

        <div class="service-item">
            <div class="service-icon icon-user rounded-circle">
                <i class="fas fa-user"></i>
            </div>
            <div class="flex-grow-1 d-flex align-items-center justify-content-start gap-2">
                <div class="fw-medium"><?= Yii::t('calc', 'Courier pickup service')?></div>
                <div class="text-muted small">10,000 <?= Yii::t('calc', 'uzs')?></div>
            </div>
            <div class="radio-circle"></div>
        </div>

        <div class="service-item">
            <div class="service-icon icon-truck rounded-circle">
                <i class="fas fa-truck"></i>
            </div>
            <div class="flex-grow-1 d-flex align-items-center justify-content-start gap-2">
                <div class="fw-medium"><?= Yii::t('calc', 'Delivery service')?></div>
                <div class="text-muted small">15,000 <?= Yii::t('calc', 'uzs')?></div>
            </div>
            <div class="radio-circle"></div>
        </div>

        <!-- Quote Form Section -->
        <h3 class="inter fw-bold fs-5 mb-3 mt-4"><?= Yii::t('calc', 'Submit Application')?></h3>

            <div class="inter fw-light text-uppercase small mb-3">
                <?= Yii::t('calc', 'LEAVE YOUR CONTACT INFORMATION FOR THE OPERATOR TO CONTACT YOU')?>
            </div>
        <div class="alert alert-light border-0 mb-4 px-2">

            <div class="row py-3 calculation_custom-bg rounded-2">
                <div class="col-md-6">
                    <label class="form-label"><?= Yii::t('calc', 'Phone Number')?></label>
                    <input type="tel" class="form-control" placeholder="+998">
                </div>
                <div class="col-md-6">
                    <label class="form-label"><?= Yii::t('calc', 'Full Name')?></label>
                    <input type="text" class="form-control" placeholder="<?= Yii::t('calc', 'Full Name')?>">
                </div>
                <div class="text-muted small mt-3">
                    <?= Yii::t('calc', 'Payment information is saved for automatic updates.')?>
                </div>
            </div>
        </div>

        <button class="btn btn-orange">
            <?= Yii::t('calc', 'Submit Application Button')?></button>
    </div>
</div>