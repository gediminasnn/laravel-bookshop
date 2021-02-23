<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


<x-slot name="slot">
    </body>
    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="col-span-1 border-r">
                    <a href="#" class="block px-10 py-5 border-b text-xl hover:bg-blue-50 @if(request()->routeIs('books')) bg-blue-50 @endif">My Books</a>
                    <a href="#" class="block px-10 py-5 border-b text-xl hover:bg-blue-50 @if(request()->routeIs('books')) bg-blue-50 @endif">Add a Book</a>
                    <a href="#" class="block px-10 py-5 border-b text-xl hover:bg-blue-50 @if(request()->routeIs('books')) bg-blue-50 @endif">My Comments</a>
                    <a href="#" class="block px-10 py-5 border-b text-xl hover:bg-blue-50 @if(request()->routeIs('books')) bg-blue-50 @endif">Report a Book</a>
                    <a href="#" class="block px-10 py-5 border-b text-xl hover:bg-blue-50 @if(request()->routeIs('books')) bg-blue-50 @endif">Change email</a>
                    <a href="#" class="block px-10 py-5 border-b text-xl hover:bg-blue-50 @if(request()->routeIs('books')) bg-blue-50 @endif">Change Password</a>
                    <a href="#" class="block px-10 py-5 border-b border-t-2 text-xl hover:bg-blue-50 @if(request()->routeIs('books')) bg-blue-50 @endif">Confirm a Book</a>
                    <a href="#" class="block px-10 py-5 border-b text-xl hover:bg-blue-50 @if(request()->routeIs('books')) bg-blue-50 @endif">Reports</a>
                </div>
                {{ $slot }}
{{--                <div class="col-span-3 px-10 py-3">--}}
{{--                    <a href="#" class="">test</a>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</x-slot>

</x-app-layout>
