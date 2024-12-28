<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
            <div class="shrink-0">
                <img class="size-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="/" class="<?= urlIs("/") ? "bg-gray-900 text-white" : "text-gray-300" ?> rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-white">Home</a>
                    <a href="/about" class="<?= urlIs("/about") ? "bg-gray-900 text-white" : "text-gray-300" ?> rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-white">About</a>
                    <a href="/notes" class="<?= urlIs("/notes") ? "bg-gray-900 text-white" : "text-gray-300" ?> rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-white">Notes</a>
                    <a href="/contact" class="<?= urlIs("/contact") ? "bg-gray-900 text-white" : "text-gray-300" ?> rounded-md px-3 py-2 text-sm font-medium hover:bg-gray-700 hover:text-white">Contact</a>
                </div>
            </div>
        </div>
    </div>
</nav>