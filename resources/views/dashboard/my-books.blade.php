<x-dashboard name="slot">
    <div class="col-span-5 xl:col-span-4">
        <div class="overflow-x-auto border-gray-200">

            <table class="table-fixed w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>

                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Title
                    </th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Authors
                    </th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Genres
                    </th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Description
                    </th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Full Price
                    </th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Discount
                    </th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Created at
                    </th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Last updated at
                    </th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>

                </tr>
                </thead>
                <tbody class=" bg-white text-xs divide-y divide-gray-200">
                @forelse($books as $book)
                    <tr class="hover:bg-blue-50">

                        <td class="px-1 py-1 ">
                            {{$book->title}}
                        </td>

                        <td class="px-1 py-1 ">
                            <p class="py-2">
                                @forelse($book->authors->pluck('name')->toArray() as $genre)
                                    <span class="px-1 border-gray-700 rounded-full ripple border">{{$genre}}</span>
                                @empty

                                @endforelse
                            </p>
{{--                            {{substr($book->authors(), 0 , 50)}}--}}
                        </td>

                        <td class="px-1 py-1 ">
                            <p class="py-2">
                                @forelse($book->genres->pluck('name')->toArray() as $genre)
                                <span class="px-1 border-gray-700 rounded-full ripple border">{{$genre}}</span>
                                @empty

                                @endforelse
                            </p>
{{--                            {{substr($book->genres(), 0 , 50)}}--}}
                        </td>

                        <td class="px-1 py-1 ">
                            {{substr($book->description, 0, 50)}}
                        </td>

                        <td class="px-1 py-1 ">
                            {{$book->price}}
                        </td>

                        <td class="px-1 py-1 ">
                            {{$book->discount}}%
                        </td>

                        <td class="px-1 py-1 ">
                            {{$book->created_at}}
                        </td>

                        <td class="px-1 py-1 ">
                            {{$book->updated_at}}
                        </td>

                        <td class="px-1 py-1 text-sm text-gray-500">

                            <div class="flex justify-start space-x-1">
                                <a href="{{route("books.show", $book->id)}}" class="border-2 border-indigo-200 rounded-md p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-indigo-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <a href="{{route("books.edit", $book->id)}}" class="border-2 border-indigo-200 rounded-md p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                                <form method="POST" action="{{route("books.destroy", $book->id)}}">
                                <button type="submit" class="border-2 border-red-200 rounded-md p-1">
                                    @csrf
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                                </form>
                            </div>

                        </td>
                    </tr>

                    @empty

                    @endforelse


                <!-- More items... -->
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard>
