<div>
    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
    <x-dropdown :categories="$categories">
        <x-slot name="trigger">
                <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full text-left lg:w-32 flex lg:inline-flex "
                    >{{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Category' }}
                <x-down-arrow class="absolute pointer-events-none"/>
                </button>
        </x-slot>
        <x-dropdown-item href="/">All</x-dropdown-item>
        @foreach($categories as $category)
            <x-dropdown-item href="/?category={{$category->slug}}& {{ http_build_query(request()->except('category', 'page')) }}"  >
            {{$category->name}}
        </x-dropdown-item>
        @endforeach
    </x-dropdown>
</div>
