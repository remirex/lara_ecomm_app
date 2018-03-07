@extends('layouts.app')

@section('title', 'home')

@section('baner')

    @include('partials.baner')

@endsection

@section('content')


    <section class="featured-section">
        <div class="container">
            <h1 class="text-center">Regie Ecommerce</h1>

            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error fugiat hic illo inventore iure iusto modi, molestiae natus nemo perferendis placeat quas qui recusandae similique veritatis! Aliquid dolorum sequi veniam? Ad alias, aperiam architecto at, consequatur deleniti doloremque enim eum hic laborum magni modi natus nihil optio porro quas quis ullam. Amet autem cumque earum illo nihil quia sunt, velit!</p>

            <div class="button-container text-center">
                <a href="{{ route('shop') }}" class="button">Featured</a>
                <a href="#" class="button">On &nbsp;sale</a>
            </div>

            <div class="row text-center">
                @foreach($products as $product)
                <div class="col-lg-3 products">
                    <a href="{{ route('show', ['product' => $product->slug]) }}">
                        <img src="{{ asset('images/products/'.$product->slug.'.jpg') }}">
                        <p>{{ $product->name }}</p>
                        <p>{{ $product->presentPrice() }}</p>
                    </a>
                </div>
                    @endforeach
            </div><!-- /.products -->

            <div class="button-container text-center">
                <a href="{{ route('shop') }}" class="button">View more products</a>
            </div>
        </div>
    </section><!-- /.featured-section -->

    @include('partials.about')

@endsection
