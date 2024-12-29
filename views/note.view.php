<?php require_once('partials/head.php') ?>
<?php require_once('partials/nav.php') ?>
<?php require_once('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-4">
            <a href="/notes" class="text-blue-500 underline">go back...</a>
        </p>

        <p>
            <?= htmlentities($note['body']) ?>
        </p>
    </div>
</main>

<?php require_once('partials/footer.php') ?>