@extends('layouts.app')

@section('title', 'shop')

@section('content')

    <nav aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a> </li>
                @if(request()->category)
                    <li class="breadcrumb-item"><a href="{{ route('shop') }}">Shop</a> </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $categoryName }}</li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                @endif
            </ol>
        </div>
    </nav><!-- /.breadcrumb -->

    <section id="product-section" class="container">
        <div class="row">
            <div class="col-sm-3 sidebar mr-auto">
                <h5>By Category</h5>

                <ul>
                    @foreach($categories as $category)

                        <li class="{{ request()->category == $category->slug ? 'active' : '' }}"><a href="{{ route('shop', ['category' => $category->slug ]) }}">{{ $category->name }}</a> </li>

                        @endforeach
                </ul>

                <h5>By Price</h5>

                <div class="drop_down">
                    <a href="#" class="drop_btn">Select a sorting method &nbsp;&nbsp;<i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                    <div class="drop_down-content">
                        <a href="{{ route('shop', ['category' => request()->category, 'sort' => 'low_high' ]) }}">Low to High</a>
                        <a href="{{ route('shop', ['category' => request()->category, 'sort' => 'high_low' ]) }}">High to Low</a>
                        <a href="{{ route('shop', ['category' => request()->category, 'sort' => '0-750']) }}">$0 - $750</a>
                        <a href="{{ route('shop', ['category' => request()->category, 'sort' => '750-1500']) }}">$750 - $1500</a>
                        <a href="{{ route('shop', ['category' => request()->category, 'sort' => '1500-2500+']) }}">$1500 - $2500+</a>
                    </div>
                </div>

            </div>

            <div class="main col-sm-9" style="padding-left: 0px">

                <h1>{{ $categoryName }}</h1>

                <div class="row text-center" style="margin-left: 0;margin-right: 0">

                    @forelse($products as $product)

                        <div class="col-lg-4 products">
                            <a href="{{ route('show', ['category' => request()->category, 'product' => $product->slug]) }}">
                                <img src="{{ asset('/images/products/'.$product->slug.'.jpg') }}">
                                <p>{{ $product->name }}</p>
                                <p>{{ $product->presentPrice() }}</p>
                            </a>
                        </div>

                        @empty

                        <p>No items found</p>

                        @endforelse

                </div><!-- product list -->

                <div class="d-flex justify-content-center pagination">
                    {{ $products->appends(request()->input())->links() }}
                </div>
            </div>

        </div>

    </section><!-- /.products-section -->


    @include('partials.about')

    @endsection