<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="col-span-full">
                <label for="body" class="block text-sm/6 font-medium text-gray-900">Content</label>

                <div class="mt-2">
                    <textarea name="body" id="body" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Here's an idea for a note... "><?= $note['body'] ?? ($_POST['body'] ?? '') ?></textarea>

                    <?php if (isset($errors['body'])): ?>
                        <p class="mt-2 text-xs text-red-500 font-bold">
                            <?= $errors['body'] ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>