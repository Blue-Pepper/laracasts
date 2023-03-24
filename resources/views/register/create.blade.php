<x-layout>
    <section class="p-6">
       <main class="max-w-lg mx-auto mt-10">
        <x-panel class="rounded-lg">
        <h1 class="mb-8 text-2xl uppercase font-bold text-gray-700 text-center">Register An Account</h1>
        <form method="POST" action="/register">
        @csrf
        <x-form.container>
             <x-form.input name="name"/>
        </x-form.container>


        <x-form.container>
             <x-form.input name="username"/>
        </x-form.container>

        <x-form.container>
             <x-form.input name="email" type="email"/>
        </x-form.container>

        <x-form.container>
             <x-form.input name="password" type="password"/>
        </x-form.container>
        <x-form.container>
            <x-form.button>Submit</x-form.button>
            <p class="text-xs mt-3 text-gray-500 hover:underline">
                <a href="/register">Already have an account? Log In!</a>
            </p>
        </x-form.container>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li class="text-xs pt-1 text-bold text-gray-900">{{ $error }}</li>
                @endforeach
                </ul>
            @enderror
        </form>
        </x-panel>
       </main>
    </section>
</x-layout>
