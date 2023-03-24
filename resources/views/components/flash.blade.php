@if(session()->has('success'))
<p x-data="{show:true}"
   x-init="setTimeout(() => show = false, 4000)"
   x-show="show" x-transtion
  class="fixed text-white bg-blue-500 py-2 px-4 bottom-3 right-3 rounded-lg text-ms">
    {{ session('success') }}
</p>
@endif
