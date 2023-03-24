@auth
<x-panel>
    <form action="/posts/{{ $post->slug }}/comments" method="POST" >
        @csrf
        <header class="flex items-center space-x-5">
         <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}"  class="rounded-full" width="40" alt="">
             <h2 class="text-xs -pt-1">
                 Want to participate?
             </h2>
         </header>
         <div class="mt-3">
            <x-form.textarea name="body" placeholder="Quick, think of something to say!"/>
         </div>
         <div class="text-right border-t border-gray-300">
            <x-form.button>Post</x-form.button>
        </div>
     </form>
</x-panel>
@else
<div class="my-12 border-t border-gray-300 pt-10">
    <a href="/login" class="bg-blue-500 py-3 px-4 text-white text-sm rounded-full text-right">Login to place a comment</a>
</div>
@endauth
