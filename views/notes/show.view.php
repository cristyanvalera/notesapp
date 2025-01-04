<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="border-b border-gray-900/10 pb-12">
            <p class="mb-8">
                <a href="/notes" class="text-blue-500 underline">go back...</a>
            </p>

            <p>
                <?= htmlentities($note['body']) ?>
            </p>
        </div>

        <div class="mt-6 flex space-x-4">
            <form method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">

                <button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Delete
                </button>
            </form>

            <a href="/note/edit?id=<?= $note['id'] ?>" class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Edit
            </a>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>