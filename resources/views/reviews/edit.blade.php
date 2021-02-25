<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Editing a review
        </h2>
    </x-slot>

    </body>
    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">

                <div class="grid grid-cols-2 md:grid-cols-6">

                    @if($review->user_id === auth()->user()->id)
                    <div class="col-span2 md:col-span-6">
                        <div class="flex justify-start space-x-1 col-span-2 md:col-span-6 p-5 bg-white border-b border-gray-200">
                            <x-a href="{{route('dashboard.my-reviews')}}">Dashboard</x-a>
                            <a href="{{route("books.show", $review->book_id)}}" class="border-2 border-indigo-200 rounded-md p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-indigo-500">
                                    b      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                            <form method="POST" action="{{route("reviews.destroy", $review->id)}}">
                                <button type="submit" class="border-2 border-red-200 rounded-md p-2">
                                    @csrf
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endif

                </div>


                <div class="px-10 py-5 bg-white border-b border-gray-200">

                    <!-- Comment section -->
                    <div class="col-span-6 sm:col-span-4">
                        <form method="POST" action="{{route('reviews.update', $review->id)}}">
                        @csrf
                                <x-label class="text-2xl" for="review" :value="__('Review')" />

                                <div class="flex inline-flex items-center">
                                    <input type="radio" class="form-radio" name="star" value="1" @if($review->stars == 1) checked @endif>
                                    <span class="mx-1">1</span>

                                    <input type="radio" class="form-radio" name="star" value="2" @if($review->stars == 2) checked @endif>
                                    <span class="mx-1">2</span>

                                    <input type="radio" class="form-radio" name="star" value="3" @if($review->stars == 3) checked @endif>
                                    <span class="mx-1">3</span>

                                    <input type="radio" class="form-radio" name="star" value="4" @if($review->stars == 4) checked @endif>
                                    <span class="mx-1">4</span>

                                    <input type="radio" class="form-radio" name="star" value="5" @if($review->stars == 5) checked @endif>
                                    <span class="mx-1">5</span>
                                </div>
                                <textarea name="comment" rows="5" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{$review->comment}}</textarea>

                            <div class="flex justify-end mt-4">
                                <x-button>
                                    {{ __('Update') }}
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

