<div class="py-4 px-0">
    <h1 class="birun-block-header">Kalkulyator</h1>

    <div class="main-card p-4">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="calculation_title fw-bold fs-4 mb-0">Qayerga yuboryapsiz?</h2>
            <button class="btn btn-primary-custom text-white">
                <i class="fas fa-download me-2"></i>Tariflar
            </button>
        </div>

        <!-- Weight and Location Inputs -->
        <div class="row g-3 mb-4">
            <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                <label class="form-label fw-medium">Yuk hajmi</label>
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
                <label class="form-label fw-medium">Yuk hajmi</label>
                <select class="form-select">
                    <option>sm</option>
                    <option>m</option>
                    <option>cm</option>
                </select>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                <label class="form-label fw-medium">Qayerga</label>
                <select class="form-select">
                    <option>Toshkent</option>
                    <option>Samarqand</option>
                    <option>Buxoro</option>
                </select>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                <label class="form-label fw-medium">Qayerdan</label>
                <select class="form-select">
                    <option>Samarqand</option>
                    <option>Toshkent</option>
                    <option>Buxoro</option>
                </select>
            </div>
        </div>

        <!-- Services Section -->
        <h3 class="fw-bold fs-5 mb-3">Xizmat turlari</h3>

        <div class="service-item">
            <div class="service-icon icon-home rounded-circle">
                <i class="fas fa-home"></i>
            </div>
            <div class="flex-grow-1 d-flex align-items-center justify-content-start gap-2">
                <div class="fw-medium">Ofisdan ofisgacha</div>
                <div class="text-muted small">0 so'm</div>
            </div>
            <div class="radio-circle"></div>
        </div>

        <div class="service-item">
            <div class="service-icon icon-user rounded-circle">
                <i class="fas fa-user"></i>
            </div>
            <div class="flex-grow-1 d-flex align-items-center justify-content-start gap-2">
                <div class="fw-medium">Kuryer olib ketish xizmati</div>
                <div class="text-muted small">10,000 so'm</div>
            </div>
            <div class="radio-circle"></div>
        </div>

        <div class="service-item">
            <div class="service-icon icon-truck rounded-circle">
                <i class="fas fa-truck"></i>
            </div>
            <div class="flex-grow-1 d-flex align-items-center justify-content-start gap-2">
                <div class="fw-medium">Yetkazib berish xizmati</div>
                <div class="text-muted small">15,000 so'm</div>
            </div>
            <div class="radio-circle"></div>
        </div>

        <!-- Quote Form Section -->
        <h3 class="inter fw-bold fs-5 mb-3 mt-4">Ariza qoldirish</h3>

            <div class="inter fw-light text-uppercase small mb-3">
                OPERATOR QAYTA ALOQAGA CHIQISH UCHUN MA'LUMOTLARINGIZI QOLDIRING
            </div>
        <div class="alert alert-light border-0 mb-4 px-2">

            <div class="row py-3 calculation_custom-bg rounded-2">
                <div class="col-md-6">
                    <label class="form-label">Telefon raqam</label>
                    <input type="tel" class="form-control" placeholder="+998">
                </div>
                <div class="col-md-6">
                    <label class="form-label">F.I.O</label>
                    <input type="text" class="form-control" placeholder="F.I.O">
                </div>
                <div class="text-muted small mt-3">
                    To'lov ma'lumotlari avtomatik yangilanish uchun saqlanadi.
                </div>
            </div>
        </div>

        <button class="btn btn-orange">Ariza qoldirish</button>
    </div>
</div>