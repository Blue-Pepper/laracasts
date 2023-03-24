<x-layout>
    <x-setting heading="Manage Posts">
            <div class="px-1 py-1 flex justify-center">
                <table class="w-full text-sm bg-white shadow-md rounded mb-4 table-auto">
                    <tbody>
                        @foreach ($posts as $post)
                        <tr class="border-b hover:bg-orange-100 {{ $loop->odd ? 'bg-blue-100' : ' '}}">
                            <td class="py-4 px-2"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></td>
                            <td class="py-4 px-2"><a href="/admin/posts/{{ $post->id }}/edit" class="text-sm bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a></td>
                            <td>
                            <form action="/admin/posts/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline mr-1">Delete</button>
                            </form>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
    </x-setting>
</x-layout>
