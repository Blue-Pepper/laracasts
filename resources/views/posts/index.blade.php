<x-layout>
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
            <x-post-grid :posts="$posts"/>
            {{ $posts->links() }}
        @else
            <p class="text-center"> No posts available, Pleases check back later!</p>
        @endif
    </main>
     {{--
        {{-- @foreach ($posts as $post)
        // @loop
        <article class="{{ $loop->even ? 'mb-10' : '' }}">
        <a href="/posts/{{ $post->slug }}">
           <h1>{{ $post->title }}</h1>
           </a>
           <p>
            by <a href="/authors/{{ $post->author->username }}"> {{  $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>

            </p>
           <div>
             {{ $post->excerpt }}
        </div>
    </article>
    @endforeach --}}
</x-layout>


