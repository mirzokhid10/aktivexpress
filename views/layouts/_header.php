
<?php
    use yii\bootstrap5\Html;
    use yii\helpers\Url;
?>

<nav class="navbar fixed-top navbar-expand-lg birun-nav">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <?= Html::img('@web/assets/logos/aktivlogowhite.png', ['alt' => 'AKTIV logo', 'class' => 'position-relative d-inline-block align-middle', 'width' => '120px', 'height' => '30px']) ?>
        </a>

        <!-- Desktop Navigation -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active d-lg-none d-xl-inline-block" aria-current="page" href="<?= Url::to(['pages/about']) ?>">
                        <?= Yii::t('app', 'About us') ?>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a id="legalDropdown1" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= Yii::t('app', 'For legal entities') ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="legalDropdown1">
                        <li><a class="dropdown-item" href="#"><?= Yii::t('app', 'Express Delivery') ?></a></li>
                        <li><a class="dropdown-item" href="#"><?= Yii::t('app', 'Courier Service') ?></a></li>
                        <li><a class="dropdown-item" href="#"><?= Yii::t('app', 'International Mail') ?></a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a id="servicesDropdown1" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= Yii::t('app', 'Services') ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="servicesDropdown1">
                        <li><a class="dropdown-item" href="#"><?= Yii::t('app', 'Express Delivery') ?></a></li>
                        <li><a class="dropdown-item" href="#"><?= Yii::t('app', 'Courier Service') ?></a></li>
                        <li><a class="dropdown-item" href="#"><?= Yii::t('app', 'International Mail') ?></a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-lg-none d-xl-inline-block" href="<?= Url::to(['pages/tariffs']) ?>">
                        <?= Yii::t('app', 'Prices') ?>
                    </a>
                </li>
                <li class="nav-item d-lg-none d-xl-inline-block">
                    <a class="nav-link" href="<?= Url::to(['pages/addresses']) ?>">
                        <?= Yii::t('app', 'Our addresses') ?>
                    </a>
                </li>
            </ul>

            <!-- Desktop Right Side: Search, Language, Login/Avatar -->
            <div class="d-flex align-items-center gap-3">
                <!-- Collapsible Search -->
<!--                <div class="search-box" id="desktopSearch">-->
<!--                    <div class="search-icon-wrapper" onclick="toggleSearch('desktopSearch')">-->
<!--                        <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">-->
<!--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>-->
<!--                        </svg>-->
<!--                    </div>-->
<!--                    <input type="text" class="search-input" placeholder="--><?php //= Yii::t('app', 'Search') ?><!--" id="desktopSearchInput">-->
<!--                </div>-->

                <!-- Language Switcher -->
                <div class="header_lang-btn dropdown">
                    <button class="btn btn-secondary dropdown-toggle d-flex justify-content-center align-items-center rounded-pill bg-white text-dark border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span><?= strtoupper(Yii::$app->language) ?></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= Url::current(['language' => 'uz']) ?>">O'zbek</a></li>
                        <li><a class="dropdown-item" href="<?= Url::current(['language' => 'uz_cyrl']) ?>">Ўзбекча</a></li>
                        <li><a class="dropdown-item" href="<?= Url::current(['language' => 'en']) ?>">English</a></li>
                        <li><a class="dropdown-item" href="<?= Url::current(['language' => 'ru']) ?>">Русский</a></li>
                    </ul>
                </div>

                <!-- Login Button or User Avatar -->
                <?php if (Yii::$app->user->isGuest): ?>
                    <button type="button" class="btn btn-primary header_login-btn d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <span><?= Yii::t('app', 'Login') ?></span>
                    </button>
                <?php else: ?>
                    <?= Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        '<span>Logout (' . Yii::$app->user->identity->name . ')</span>',
                        ['class' => 'btn btn-primary header_login-btn', 'encode' => false]
                    )
                    . Html::endForm()
                    ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Mobile Right Side: Language + Hamburger -->
        <div class="d-lg-none d-flex align-items-center gap-2 ms-auto">
            <!-- Language Switcher (Mobile) -->
            <div class="header_lang-btn dropdown">
                <button class="btn btn-secondary dropdown-toggle d-flex justify-content-center align-items-center rounded-pill bg-white text-dark border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span><?= strtoupper(Yii::$app->language) ?></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="<?= Url::current(['language' => 'uz']) ?>">O'zbek</a></li>
                    <li><a class="dropdown-item" href="<?= Url::current(['language' => 'uz_cyrl']) ?>">Ўзбекча</a></li>
                    <li><a class="dropdown-item" href="<?= Url::current(['language' => 'en']) ?>">English</a></li>
                    <li><a class="dropdown-item" href="<?= Url::current(['language' => 'ru']) ?>">Русский</a></li>
                </ul>
            </div>

            <!-- Hamburger Menu -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                <i class="fa-solid fa-bars text-white fs-4"></i>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Offcanvas Menu -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header gap-3">
        <!-- Search in Header -->
        <div class="search-box flex-grow-1">
            <div class="search-icon-wrapper">
                <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <input type="text" class="search-input" placeholder="<?= Yii::t('app', 'Search') ?>">
        </div>
        <button type="button" class="close-btn" data-bs-dismiss="offcanvas">✕</button>
    </div>

    <div class="offcanvas-body p-0">
        <!-- Mobile Navigation Menu -->
        <div class="mobile-menu">
            <a href="<?= Url::to(['pages/about']) ?>" class="nav-link">
                <?= Yii::t('app', 'About us') ?>
            </a>

            <!-- Dropdown 1: For legal entities -->
            <div class="mobile-dropdown">
                <button class="mobile-dropdown-toggle" onclick="toggleMobileDropdown(this)">
                    <span><?= Yii::t('app', 'For legal entities') ?></span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="mobile-dropdown-content">
                    <a href="#"><?= Yii::t('app', 'Express Delivery') ?></a>
                    <a href="#"><?= Yii::t('app', 'Courier Service') ?></a>
                    <a href="#"><?= Yii::t('app', 'International Mail') ?></a>
                </div>
            </div>

            <!-- Dropdown 2: Services -->
            <div class="mobile-dropdown">
                <button class="mobile-dropdown-toggle" onclick="toggleMobileDropdown(this)">
                    <span><?= Yii::t('app', 'Services') ?></span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="mobile-dropdown-content">
                    <a href="#"><?= Yii::t('app', 'Express Delivery') ?></a>
                    <a href="#"><?= Yii::t('app', 'Courier Service') ?></a>
                    <a href="#"><?= Yii::t('app', 'International Mail') ?></a>
                </div>
            </div>

            <a href="<?= Url::to(['pages/tariffs']) ?>" class="nav-link ">
                <?= Yii::t('app', 'Prices') ?>
            </a>
            <a href="<?= Url::to(['pages/addresses']) ?>" class="nav-link">
                <?= Yii::t('app', 'Our addresses') ?>
            </a>
        </div>

        <!-- Login Button or User Avatar -->


        <!-- Bottom Menu Section -->
        <div class="menu-section mt-5 d-flex justify-content-center">
            <?php if (Yii::$app->user->isGuest): ?>
                <button type="button" class="btn btn-primary header_login-btn w-75 mx-auto rounded-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                    <?= Yii::t('app', 'Login') ?>
                </button>
            <?php else: ?>
                <button type="button" class="btn btn-primary header_login-btn w-75 mx-auto rounded-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                    <?= Yii::t('app', 'Dashboard') ?>
                </button>
            <?php endif; ?>
        </div>
    </div>
</div>


<script>
    // Toggle desktop search
    function toggleSearch(searchId) {
        const searchBox = document.getElementById(searchId);
        const searchInput = document.querySelector(`#${searchId} .search-input`);

        if (!searchBox.classList.contains('expanded')) {
            searchBox.classList.add('expanded');
            setTimeout(() => {
                searchInput.focus();
            }, 300);
        }
    }

    // Close search when clicking outside
    document.addEventListener('click', function(event) {
        const desktopSearch = document.getElementById('desktopSearch');
        const desktopSearchInput = document.getElementById('desktopSearchInput');

        if (desktopSearch && !desktopSearch.contains(event.target)) {
            if (desktopSearchInput && desktopSearchInput.value === '') {
                desktopSearch.classList.remove('expanded');
            }
        }
    });

    // Keep search open if there's text
    const desktopSearchInput = document.getElementById('desktopSearchInput');
    if (desktopSearchInput) {
        desktopSearchInput.addEventListener('blur', function() {
            const desktopSearch = document.getElementById('desktopSearch');
            if (this.value === '') {
                setTimeout(() => {
                    desktopSearch.classList.remove('expanded');
                }, 200);
            }
        });
    }

    // Toggle mobile dropdown
    function toggleMobileDropdown(button) {
        const content = button.nextElementSibling;
        const icon = button.querySelector('i');

        content.classList.toggle('show');
        icon.classList.toggle('fa-chevron-down');
        icon.classList.toggle('fa-chevron-up');
    }
</script>