<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Book listing
        </h2>
    </x-slot>

    </body>
    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">

                <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-5">

                    @foreach ($books as $book)
                        <div class="p-3 bg-white rounded group">
                            <a href="{{route('books.show', ['id' => $book->id])}}" class="">
                                <img class="rounded" src="{{URL::asset("/images/".$book->cover)}}" alt="Card image cap">

                                <div class="block p-4 border-b group">
                                    <p class="mb-1 text-blue-700 text-lg font-bold text-secondary group-hover:underline group-hover:text-amazon-orange"><ins class="text-red-600 group-hover:text-amazon-orange">*NEW*</ins> {{$book->title}}</p>
                                    <p class="mb-2 text-blue-700 text-grey-darker group-hover:underline group-hover:text-amazon-orange">By {{$book->author}}</p>
                                    @if($book->discount)
                                        <p class="mb-2 line-through text-blue-700 text-grey-darker group-hover:underline group-hover:line-through group-hover:text-amazon-orange">{{$book->price}}</p>
                                        <p class="mb-2 font-bold text-grey-darker text-red-600 group-hover:underline group-hover:text-amazon-orange">{{$book->price}}</p>
                                    @elseif(!$book->discount)
                                    <p class="mb-2 text-blue-700 text-grey-darker group-hover:underline group-hover:text-amazon-orange">{{$book->price}}$</p>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>

                {{--PAGINATION--}}
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <a href="{{url("/books/?page=".$previousPage)}}" @if($previousPage == 0) onclick="return false;"  @endif class=" relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500">
                            Previous
                        </a>
                        <a href="{{url("/books/?page=".$nextPage)}}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500">
                            Next
                        </a>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                {{--        TODO: Potential feature for pagination--}}
                {{--        <div>--}}
                {{--            <p class="text-sm text-gray-700">--}}
                {{--                Showing--}}
                {{--                <span class="font-medium">1</span>--}}
                {{--                to--}}
                {{--                <span class="font-medium">10</span>--}}
                {{--                of--}}
                {{--                <span class="font-medium">97</span>--}}
                {{--                results--}}
                {{--            </p>--}}
                {{--        </div>--}}

                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <a href="{{url("/books/?page=".$previousPage)}}" @if($previousPage == 0) onclick="return false;"  @endif class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
                                    <!-- Heroicon name: solid/chevron-left -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href="{{url("/books/?page=".$nextPage)}}" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Next</span>
                                    <!-- Heroicon name: solid/chevron-right -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    </div>
</x-app-layout>

