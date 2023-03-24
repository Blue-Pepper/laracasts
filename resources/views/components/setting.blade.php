@props(['heading', ])
<section class="px-6 py-8 max-w-4xl mx-auto">

        <div class="bg-blue-500 text-white py-1 mb-3 border-blue-700 rounded-lg">
            <h1 class="text-lg font-semibold my-4 pl-5" >{{ $heading }}</h1>
        </div>

        <div class="flex">
            <aside class="w-48">
                <h4 class="font-semibold mb-4">Links</h4>
                <ul class="space-y-1">
                    <li>
                        <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500 font-semibold ' : 'text-sm'}}">New Post</a>
                    </li>
                    <li>
                        <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500 font-semibold'  : 'text-sm'}}">Dashboard</a>
                    </li>
                </ul>
            </aside>
            <main class="flex-1">
                <x-panel >
                    {{ $slot }}
                </x-panel>
            </main>
        </div>
</section>
