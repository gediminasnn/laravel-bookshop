<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Report a book
        </h2>
    </x-slot>

    <div class="px-8 mx-auto mt-5 max-w-7xl md:grid md:grid-cols-2 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

            <form method="POST" action="{{route('reports.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="overflow-hidden shadow rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">


                        <div class="grid grid-cols-4 gap-6">

                            <div class="col-span-4 sm:col-span-1">
                                <div class="flex inline-flex gap-2 pb-2">
                                    <x-a href="{{route('dashboard.my-reports')}}">Dashboard</x-a>
                                    @if($id)
                                    <x-a href="{{route('books.show', ['id' => $id])}}" class="">Back to book</x-a>
                                    @endif
                                </div>

                                <label for="first_name" class="block text-sm font-medium text-gray-700">Book id</label>
                                <input @if($id > 0) value="{{$id}}" @endif type="text" name="book_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <div class="col-span-4 sm:row-start-2 sm:col-span-3">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">Report</label>
                                <textarea name="report" rows="5" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                            </div>


                        </div>

                    </div>

                    <div class="px-4 py-3 bg-white text-right sm:px-6">
                        <x-button>
                            Create
                        </x-button>
                    </div>

                </div>
            </form>
        </div>
    </div>

</x-app-layout>

