<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-2xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/note">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">

            <?php require base_path('views/partials/fields.php') ?>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/notes" class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Cancel
                </a>

                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Update
                </button>
            </div>
        </form>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>