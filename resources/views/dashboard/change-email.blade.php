<x-dashboard name="slot">

    <div class="col-span-5 xl:col-span-4">
        <div class="overflow-x-auto border-gray-200">

{{--            @if (count($errors) > 0)--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <strong>Whoops!</strong> There were some problems with your input.--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-success">
                    {{ session()->get('error') }}
                </div>
            @endif

            <form method="POST" action="{{route('dashboard.change-email')}}" enctype="multipart/form-data">
                @csrf
                <div class="overflow-hidden shadow rounded-md px-4 py-5 bg-white sm:p-6">

                        <div class="grid grid-cols-2 gap-6">

                            <div class="col-span-2 md:col-span-1">

                                <label for="first_name" class="block text-sm font-medium text-gray-700">Enter new desired email</label>
                                <input type="text" name="new_email" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                                <label for="first_name" class="block text-sm font-medium text-gray-700">Retype new email</label>
                                <input type="text" name="retype_new_email" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                                <label for="first_name" class="block text-sm font-medium text-gray-700">Enter current password</label>
                                <input type="text" name="current_password" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                            </div>

                        </div>

                    <div class="py-3 bg-white text-right">
                        <x-button>
                            Update
                        </x-button>
                    </div>

                </div>

            </form>
        </div>
    </div>

</x-dashboard>

