<?php
/**
 * Page Header Component
 *
 * Displays a reusable page header with subtitle, title, and working hours
 *
 * @param string $subtitle - Small text above the title (e.g., "Manzillarimiz")
 * @param string $title - Main heading text
 * @param string $workingHours - Working hours text (e.g., "09:00 - 19:00")
 * @param string $workingDaysText - Text before hours (e.g., "Barcha filiallarimiz")
 * @param string $workingDaysLabel - Text after hours (e.g., "ishlaydi")
 */

// Default values
$subtitle = $subtitle ?? 'Manzillarimiz';
$title = $title ?? 'Ofislarimizga tashrif buyuring';
$workingHours = $workingHours ?? '09:00 - 19:00';
$workingDaysText = $workingDaysText ?? 'Barcha filiallarimiz';
$workingDaysLabel = $workingDaysLabel ?? 'ishlaydi';
?>

<div class="page-header mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Subtitle -->
                <p class="text-uppercase text-primary fw-semibold mb-2 letter-spacing-wide">
                    <?= htmlspecialchars($subtitle) ?>
                </p>

                <!-- Main Title -->
                <h1 class="display-5 fw-bold text-dark mb-3">
                    <?= htmlspecialchars($title) ?>
                </h1>

                <!-- Working Hours -->
                <div class="working-hours d-flex align-items-center">
                    <span class="text-muted me-2">
                        <?= htmlspecialchars($workingDaysText) ?>
                    </span>
                    <span class="badge bg-warning text-dark px-3 py-2 fs-6 fw-semibold">
                        <?= htmlspecialchars($workingHours) ?>
                    </span>
                    <span class="text-muted ms-2">
                        <?= htmlspecialchars($workingDaysLabel) ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>