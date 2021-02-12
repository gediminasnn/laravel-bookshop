<x-customlayout>
    <div class="control-group bg-light rounded">

{{--        5 book row--}}
        <div class="row">
            <div class="col m-1">
                <a href="">
                    <img src="{{URL::asset('/images/IMG_20210206_152320.jpg')}}" alt="">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Title : Hakingas</li>
                        <li class="list-group-item">Author : Stephen Hawking</li>
                        <li class="list-group-item">Price : 420.0$</li>
                    </ul>
                </a>
            </div>

            <div class="col m-1">
                <a href="">
                    <img src="{{URL::asset('/images/IMG_20210206_152320.jpg')}}" alt="">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Title : Hakingas</li>
                        <li class="list-group-item">Author : Stephen Hawking</li>
                        <li class="list-group-item">Price : 420.0$</li>
                    </ul>
                </a>
            </div>

            <div class="col m-1">
                <a href="">
                    <img src="{{URL::asset('/images/IMG_20210206_152320.jpg')}}" alt="">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Title : Hakingas</li>
                        <li class="list-group-item">Author : Stephen Hawking</li>
                        <li class="list-group-item">Price : 420.0$</li>
                    </ul>
                </a>
            </div>

            <div class="col m-1">
                <a href="">
                    <img src="{{URL::asset('/images/IMG_20210206_152320.jpg')}}" alt="">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Title : Hakingas</li>
                        <li class="list-group-item">Author : Stephen Hawking</li>
                        <li class="list-group-item">Price : 420.0$</li>
                    </ul>
                </a>
            </div>

            <div class="col m-1">
                <a href="">
                    <img src="{{URL::asset('/images/IMG_20210206_152320.jpg')}}" alt="">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Title : Hakingas</li>
                        <li class="list-group-item">Author : Stephen Hawking</li>
                        <li class="list-group-item">Price : 420.0$</li>
                    </ul>
                </a>
            </div>
        </div>

        {{--        5 book row--}}
        <div class="row">
            <div class="col m-1">
                <a href="">
                    <img src="{{URL::asset('/images/IMG_20210206_152320.jpg')}}" alt="">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Title : Hakingas</li>
                        <li class="list-group-item">Author : Stephen Hawking</li>
                        <li class="list-group-item">Price : 420.0$</li>
                    </ul>
                </a>
            </div>

            <div class="col m-1">
                <a href="">
                    <img src="{{URL::asset('/images/IMG_20210206_152320.jpg')}}" alt="">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Title : Hakingas</li>
                        <li class="list-group-item">Author : Stephen Hawking</li>
                        <li class="list-group-item">Price : 420.0$</li>
                    </ul>
                </a>
            </div>

            <div class="col m-1">
                <a href="">
                    <img src="{{URL::asset('/images/IMG_20210206_152320.jpg')}}" alt="">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Title : Hakingas</li>
                        <li class="list-group-item">Author : Stephen Hawking</li>
                        <li class="list-group-item">Price : 420.0$</li>
                    </ul>
                </a>
            </div>

            <div class="col m-1">
                <a href="">
                    <img src="{{URL::asset('/images/IMG_20210206_152320.jpg')}}" alt="">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Title : Hakingas</li>
                        <li class="list-group-item">Author : Stephen Hawking</li>
                        <li class="list-group-item">Price : 420.0$</li>
                    </ul>
                </a>
            </div>

            <div class="col m-1">
                <a href="">
                    <img src="{{URL::asset('/images/IMG_20210206_152320.jpg')}}" alt="">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Title : Hakingas</li>
                        <li class="list-group-item">Author : Stephen Hawking</li>
                        <li class="list-group-item">Price : 420.0$</li>
                    </ul>
                </a>
            </div>
        </div>

{{--        Pagination --}}
        <nav aria-label="Page navigation example" >
            <ul class="pagination justify-content-end" >
                <li class="page-item"><a class="page-link" href="#"><</a></li>
                <li class="page-item"><a class="page-link" href="#">></a></li>
            </ul>
        </nav>

    Hello World!
    @foreach ($users as $user)
        <p>This is user {{ $user->id }}</p>
    @endforeach
    </div>
</x-customlayout>

