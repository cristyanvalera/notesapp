<?php require_once('partials/head.php') ?>
<?php require_once('partials/nav.php') ?>
<?php require_once('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        Hello, <?= $_SESSION['user']['email'] ?? 'Guest' ?>!, you are in the Home page.
    </div>
</main>

<?php require_once('partials/footer.php') ?>