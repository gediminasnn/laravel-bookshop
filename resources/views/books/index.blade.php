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
                    @forelse($books as $book)
                        <div class="p-3 bg-white rounded group">
                            <a href="{{route('books.show', ['id' => $book->id])}}" class="">
                                <img class="rounded" src="{{URL::asset("/images/".$book->cover)}}" alt="Card image cap">

                                <div class="block p-4 group">
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
                    @empty
                        No books found
                    @endforelse
                </div>

                {{--PAGINATION--}}
                <div class="d-flex justify-items-center pb-5 px-5">
                    {{$books->links()}}
                </div>

            </div>
        </div>
    </div>

</x-app-layout>

