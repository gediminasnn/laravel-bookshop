<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Book details
        </h2>
    </x-slot>

    <div class="control-group rounded">

        <div class=""></div>
        <div class="row">
            <div class="col m-auto">
                <a href="">
                    <img class="rounded mx-auto d-block" src="{{URL::asset('/images/IMG_20210206_152320.jpg')}}" alt="" style="height: 400px">
                </a>
            </div>
            <div class="col-lg-9">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Title : Hakingas</li>
                        <li class="list-group-item">Author : Stephen Hawking</li>
                        <li class="list-group-item">Price : 420.0$</li>
                        <li class="list-group-item">
                            Rating :
                            <button type="button" class="btn btn-light">1</button>
                            <button type="button" class="btn btn-light">2</button>
                            <button type="button" class="btn btn-light">3</button>
                            <button type="button" class="btn btn-warning">4</button>
                            <button type="button" class="btn btn-light">5</button>
                        </li>
                        <li class="list-group-item">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</li>
                    </ul>
            </div>
        </div>

        <div class="row mt-1">
            <div class="col-lg-12">
                <ul class="list-group list-group-flush">
                    <b><li class="list-group-item">Write a review</li></b>
                    <li class="list-group-item">John Doe : Lorem Ipsum is simply dummy text of the printing and typesetting</li>
                    <li class="list-group-item">John Doe : Lorem Ipsum is simply dummy text of the printing and typesetting</li>
                    <li class="list-group-item">John Doe : Lorem Ipsum is simply dummy text of the printing and typesetting</li>
                </ul>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

        </div>
        <button type="button" class="btn btn-primary">Primary</button>

    </div>
</x-app-layout>

