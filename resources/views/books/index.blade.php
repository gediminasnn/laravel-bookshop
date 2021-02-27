<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Book listing
        </h2>
    </x-slot>

    </body>
    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-md sm:rounded-lg">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-5">
                    @forelse($books as $book)
                        <div class="p-3 bg-white rounded group">
                            <a href="{{route('books.show', ['id' => $book->id])}}" class="">
                                <img class="rounded" src="{{URL::asset("/images/".$book->cover)}}" alt="Card image cap">
                                <div class="block p-4 group">
                                    <p class="mb-1 text-lg font-bold text-blue-700 text-secondary group-hover:underline group-hover:text-amazon-orange">
                                        @if($book->is_new)
                                            <ins class="text-red-600 group-hover:text-amazon-orange">*NEW*</ins>
                                        @endif
                                        {{$book->title}}
                                    </p>
                                    <p class="mb-2 text-blue-700 text-grey-darker group-hover:text-amazon-orange">By <span class="px-1 border-2 border-blue-700 rounded-full group-hover:border-amazon-orange">{{$book->authors[0]->name}}</span></p>
                                    @if($book->discount)
                                        <span class="mb-2 text-blue-700 line-through text-grey-darker group-hover:underline group-hover:line-through group-hover:text-amazon-orange">{{$book->price_point}}$</span>
                                        <span class="mb-2 font-bold text-red-600 text-grey-darker group-hover:underline group-hover:text-amazon-orange">{{$book->discounted_price}}$</span>
                                    @elseif(!$book->discount)
                                        <span class="mb-2 text-blue-700 text-grey-darker group-hover:underline group-hover:text-amazon-orange">{{$book->price_point}}$</span>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @empty
                        No books found
                    @endforelse
                </div>

                {{--PAGINATION--}}
                <div class="px-5 pb-5 d-flex justify-items-center">
                    {{$books->links()}}
                </div>

            </div>
        </div>
    </div>

</x-app-layout>

