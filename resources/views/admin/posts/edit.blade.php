<x-layout>
    <x-setting :heading="'Edit: '.$post->title">
        <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
                <x-form.input name="title" :value="$post->title"/>

                    <div class="flex mt-6">
                        <div class="flex-1">
                            <x-form.input name="thumbnail" type="file" :value="$post->thumbnail"/>
                        </div>
                        <img src="{{ asset('/storage/'.$post->thumbnail) }}" alt="" class="rounded-lg w-1/6 ml-3">
                    </div>
                <x-form.textarea name="excerpt">{{ $post->excerpt }}</x-form.textarea>
                <x-form.textarea name="body">{{ $post->body }}</x-form.textarea>
                <x-form.container>

                    <x-form.label name="category"/>
                        <select name="category_id" id="">
                            @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $post->category->id) === $category->id ? 'selected' : ''}}>{{ ucwords($category->name) }}</option>
                            @endforeach
                        </select>

                        <x-form.error name="category_id"/>
                </x-form.container>
                <x-form.button>Update</x-form.button>
                </div>
            </form>
    </x-setting>
</x-layout>

