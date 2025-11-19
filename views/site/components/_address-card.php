<?php
$name = $name ?? 'Office Name';
$address = $address ?? '';
$phones = $phones ?? [];
$region = $region ?? '';
?>
?>

<div class="address-card h-100">
    <div class="card shadow-sm border-0 h-100 hover-lift">
        <div class="card-body p-4">
            <!-- Location Icon and Name -->
            <div class="d-flex align-items-start mb-3">
                <div class="icon-wrapper me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="text-primary" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                    </svg>
                </div>
                <div class="flex-grow-1">
                    <h5 class="card-title mb-1 fw-bold text-dark">
                        <?= htmlspecialchars($name) ?>
                    </h5>
                    <?php if ($region): ?>
                        <span class="badge bg-light text-muted small">
                            <?= htmlspecialchars($region) ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Address -->
            <?php if ($address): ?>
                <div class="address-text mb-3">
                    <p class="text-muted mb-0 small">
                        <?= nl2br(htmlspecialchars($address)) ?>
                    </p>
                </div>
            <?php endif; ?>

            <!-- Phone Numbers -->
            <?php if (!empty($phones)): ?>
                <div class="phone-numbers">
                    <?php foreach ($phones as $phone): ?>
                        <a href="tel:<?= preg_replace('/[^0-9+]/', '', $phone) ?>"
                           class="d-flex align-items-center text-decoration-none mb-2 phone-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-success me-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                            <span class="fw-semibold text-primary">
                                <?= htmlspecialchars($phone) ?>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>