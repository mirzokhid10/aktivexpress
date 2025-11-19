<?php
/** @var array $item */
?>

<div class="col-12 col-md-6 col-lg-4">
    <div class="mb-3 d-flex align-items-start justify-content-start">

        <!-- icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="custom-orange me-2 flex-shrink-0 mt-1" width="20" height="20" viewBox="0 0 24 24">-->
        <path fill="#FF6010" d="M12 3a7 7 0 0 0-7 7c0 2.862 1.782 5.623 3.738 7.762A26.158 26.158 0 0 0 12 20.758a26.14 26.14 0 0 0 3.262-2.994C17.218 15.623 19 12.863 19 10a7 7 0 0 0-7-7Zm0 20.214l-.567-.39l-.003-.002l-.006-.005l-.02-.014l-.075-.053a25.34 25.34 0 0 1-1.214-.94a28.157 28.157 0 0 1-2.853-2.698C5.218 16.876 3 13.637 3 10a9 9 0 0 1 18 0c0 3.637-2.218 6.877-4.262 9.112a28.145 28.145 0 0 1-3.796 3.44a16.794 16.794 0 0 1-.345.251l-.021.014l-.006.005l-.002.001l-.568.39ZM12 8a2 2 0 1 0 0 4a2 2 0 0 0 0-4Zm-4 2a4 4 0 1 1 8 0a4 4 0 0 1-8 0Z"/></svg>

        <div class="text-start mb-2 d-flex flex-column gap-2">

            <h5 class="mb-0 fw-normal fs-6"><?= $item['title'] ?></h5>

            <?php if ($item['map_url']): ?>
                <a href="<?= $item['map_url'] ?>" class="text-muted small">
                    <?= $item['address'] ?>
                </a>
            <?php else: ?>
                <p class="text-muted small"><?= $item['address'] ?></p>
            <?php endif; ?>

            <div>
                <?php foreach ($item['phones'] as $phone): ?>
                    <a href="tel:<?= $phone ?>"
                       class="d-block text-primary text-decoration-none fw-semibold small mb-1">
                        <?= $phone ?>
                    </a>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>