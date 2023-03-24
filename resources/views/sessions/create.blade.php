<x-layout>
    <section class="p-6">
       <main class="max-w-lg mx-auto mt-10">
        <x-panel>
        <h1 class="mb-8 text-2xl uppercase font-bold text-gray-700 text-center">LOGIN</h1>
        <form method="POST" action="sessions">
        @csrf
        <x-form.container>
                <x-form.input name="email" type="email" autocomplete="username"/>
        </x-form.container>

        <x-form.container>
             <x-form.input name="password" type="password" autocomplete="current-password"/>
        </x-form.container>

        <x-form.container>
            <x-form.button>Submit</x-form.button>
                <p class="text-xs mt-3 text-gray-500 hover:underline">
                    <a href="/register">Don't have an account yet? Register!</a>
                </p>
        </x-form.container>
        </form>
        </x-panel>
       </main>
    </section>
</x-layout>
