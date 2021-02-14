<x-customlayout>
    <div class="control-group rounded">

        <div class="row">


            <div class="col m-1">
                <div class="card" style="">
                    <img class="card-img-top" src="{{URL::asset('/images/IMG_20210206_152320.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h1 class="card-title">Hakingas</h1>
                        <p class="card-text">by Stephen Hawking</p>
                        <p class="card-text">420.0$</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col m-1">
                <div class="card" style="">
                    <img class="card-img-top" src="{{URL::asset('/images/IMG_20210206_152320.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h1 class="card-title">Hakingas</h1>
                        <p class="card-text">by Stephen Hawking</p>
                        <p class="card-text">420.0$</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col m-1">
                <div class="card" style="">
                    <img class="card-img-top" src="{{URL::asset('/images/IMG_20210206_152320.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h1 class="card-title">Hakingas</h1>
                        <p class="card-text">by Stephen Hawking</p>
                        <p class="card-text">420.0$</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col m-1">
                <div class="card" style="">
                    <img class="card-img-top" src="{{URL::asset('/images/IMG_20210206_152320.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h1 class="card-title">Hakingas</h1>
                        <p class="card-text">by Stephen Hawking<br>420.0$</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col m-1">
                <div class="card" style="">
                    <img class="card-img-top" src="{{URL::asset('/images/IMG_20210206_152320.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h1 class="card-title">Hakingas</h1>
                        <p class="card-text">by Stephen Hawking</p>
                        <p class="card-text">420.0$</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
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

