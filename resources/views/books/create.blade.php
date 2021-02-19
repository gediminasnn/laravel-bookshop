<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Add Book to Listing
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

{{--                @if ($message = Session::get('message'))--}}
{{--                    <div class="alert alert-success alert-block">--}}
{{--                        <button type="button" class="close" data-dismiss="alert">×</button>--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </div>--}}
{{--                    <img src="images/{{ Session::get('file') }}">--}}
{{--                @endif--}}

            <form method="POST" action="{{route('book.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="overflow-hidden shadow rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-4 gap-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" name="title" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <div class="col-span-6 sm:row-start-2 sm:col-span-2">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">Price</label>
                                <input placeholder="$" type="text" name="price" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <div class="col-span-6 sm:row-start-2 sm:col-span-2">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">Discount</label>
                                <input placeholder="%" type="text" name="discount" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <div class="col-span-6 sm:row-start-3 sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-700">Author</label>
                                <select name="author" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
{{--                                    <option>Zac Muckerberg</option>--}}
{{--                                    <option>Canada</option>--}}
{{--                                    <option>Mexico</option>--}}
                                </select>
                            </div>

                            <div class="col-span-6 sm:row-start-4 sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-700">Genre</label>
                                <select name="genre" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
{{--                                    <option>Drama</option>--}}
{{--                                    <option>Canada</option>--}}
{{--                                    <option>Mexico</option>--}}
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" rows="5" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label class="block text-sm font-medium text-gray-700">
                                    Cover photo
                                </label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, GIF up to 10MB
                                        </p>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                        <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Add
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

{{--        <form method="POST" action="{{route('book.store')}}">--}}
{{--            @csrf--}}
{{--            <div class="form-group">--}}
{{--                <label for="title">Title</label>--}}
{{--                <input id="title" type="text" class="form-control" placeholder="Enter desired title" name="title">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="title">Desription</label>--}}
{{--                <input type="textarea" class="form-control" placeholder="Enter book's description" name="description">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="title">Price</label>--}}
{{--                <input type="text" class="form-control" placeholder="Enter book's price" name="price">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="title">Discount</label>--}}
{{--                <input type="text" class="form-control" placeholder="Enter desired book's discount" name="discount">--}}
{{--            </div>--}}
{{--            <button type="submit" class="mt-1 btn btn-primary">Submit</button>--}}
{{--        </form>--}}



</x-app-layout>

