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
            <div class="grid grid-cols-5 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="col-span-5 xl:col-span-1 border-r">
                    <a href="{{route('dashboard.my-books')}}" class="block px-10 py-5 border-b hover:bg-blue-50 @if(request()->routeIs('dashboard.my-books')) bg-blue-50 @endif">My Books</a>
                    <a href="{{route('books.create')}}" class="block px-10 py-5 border-b hover:bg-blue-50 @if(request()->routeIs('dashboard.add-a-book')) bg-blue-50 @endif">Add a Book</a>
                    <a href="{{route('dashboard.my-reviews')}}" class="block px-10 py-5 border-b hover:bg-blue-50 @if(request()->routeIs('dashboard.my-reviews')) bg-blue-50 @endif">My Reviews</a>
                    <a href="{{route('dashboard.my-reports')}}" class="block px-10 py-5 border-b hover:bg-blue-50 @if(request()->routeIs('dashboard.my-reports')) bg-blue-50 @endif">My Reports</a>
                    <a href="{{route('dashboard.report-a-book')}}" class="block px-10 py-5 border-b hover:bg-blue-50 @if(request()->routeIs('dashboard.report-a-book')) bg-blue-50 @endif">Report a Book</a>
                    <a href="{{route('dashboard.change-email')}}" class="block px-10 py-5 border-b hover:bg-blue-50 @if(request()->routeIs('dashboard.change-email')) bg-blue-50 @endif">Change email</a>
                    <a href="{{route('dashboard.change-password')}}" class="block px-10 py-5 border-b hover:bg-blue-50 @if(request()->routeIs('dashboard.change-password')) bg-blue-50 @endif">Change Password</a>
                    @if(Auth::user()->is_admin)
                    <a href="{{route('dashboard.confirm-books')}}" class="block px-10 py-5 border-b border-t-2 hover:bg-blue-50 @if(request()->routeIs('dashboard.confirm-books')) bg-blue-50 @endif">Confirm Books</a>
                    <a href="{{route('dashboard.reports')}}" class="block px-10 py-5 border-b hover:bg-blue-50 @if(request()->routeIs('dashboard.reports')) bg-blue-50 @endif">Reports</a>
                    @endif
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
