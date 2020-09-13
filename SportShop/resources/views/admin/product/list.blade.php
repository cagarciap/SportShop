@extends('admin.menu')

@section('menu_content')
<div class="container">
    @include('util.message')
    <div class="row justify-content-center">
        
            @foreach($data["products"] as $product)
                <div class="col-md-auto container-product"></div">
                    <div class="row justify-content-center img-container">
                        <div class="col-12" align="center">
                            <img src="/img/{{ $product->getImage() }}" class="list-picture">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 product-information"><b>{{ $product->getName() }}</b> </div>

                    </div>
                    <div class="col-8 product-information-2">
                        <b>Price:  {{ $product->getPrice() }}$</b>
                    </div>
                    <div class="col-4 product-information-2">
                        <a class="navbar-brand  btn btn-outline-info btn-block" href="{{ route('admin.product.show',['id'=> $product->getId()]) }}"><img src="/icons/file-earmark-text.svg" class="delete-icon"></a>
                    </div>

                </div>
            @endforeach
    </div>
</div>
@endsection
