<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Book report
        </h2>
    </x-slot>

    </body>
    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">

                <div class="grid grid-cols-2 md:grid-cols-6">
{{--                    @if(!Auth::guest())--}}
{{--                        @if($book->user_id == auth()->user()->id)--}}
                        <div class="col-span2 md:col-span-6">
                            <div class="flex justify-start space-x-1 col-span-2 md:col-span-6 p-5 bg-white border-b border-gray-200">
                                <x-a href="{{route('dashboard.my-reports')}}">Dashboard</x-a>
{{--                                <a href="{{route("books.edit", $book->id)}}" class="border-2 border-indigo-200 rounded-md p-2">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-gray-500">--}}
{{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />--}}
{{--                                    </svg>--}}
{{--                                </a>--}}
{{--                                <form method="POST" action="{{route("books.destroy", $book->id)}}">--}}
{{--                                    <button type="submit" class="border-2 border-red-200 rounded-md p-2">--}}
{{--                                        @csrf--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-red-500">--}}
{{--                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />--}}
{{--                                        </svg>--}}
{{--                                    </button>--}}
{{--                                </form>--}}
                            </div>
                        </div>
{{--                        @endif--}}
{{--                    @endif--}}

                    <div class="col-span-6 px-10">
                            <p class="pt-10 pb-2">
                                <span class="text-xl px-2 border-gray-700 rounded-full shadow ripple border-2">{{$report->user->name}}</span>
                            </p>
                            <p class="pr-5 pb-2 text-xl">{{$report->report}}</p>


                    </div>

                </div>


                <div class="px-10 pt-5 bg-white border-b border-gray-200">
                    <hr>
                    <label for="first_name" class="block text-2xl font-medium text-gray-700">Replies</label>
                    <hr>
                    @forelse($replies as $reply)
                    <div class="p-4">
                        <p class="">
                            <span class="text-1x1 px-2 border-gray-700 rounded-full shadow ripple border-2">{{$reply->user->name}}</span>
                        </p>
                        <p class="text-1x1">{{$reply->reply}}</p>
                        <hr>
                    </div>
                    @empty
                        <p class="pr-5 pb-2 text-xl">There are no replies yet</p>

                    @endforelse
                    <!-- Comment section -->
                    <div class="col-span-6 sm:col-span-4">
                        <form method="POST" action="{{route('reply.store', ['id' =>$report->id])}}">
                        @csrf

                                <x-label class="text-2xl" for="comment" :value="__('Reply')" />

                                <textarea name="reply" rows="5" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>

                            <div class="flex justify-end mt-4">
                                <x-button>
                                    {{ __('Submit') }}
                                </x-button>
                            </div>
                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>

    </div>
</x-app-layout>

