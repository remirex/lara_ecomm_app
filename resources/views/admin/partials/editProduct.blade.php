@extends('admin.master')

@section('title','add_product')

@section('content')

    <div class="col-sm-4">

        <div class="card">

            <div class="card-header">

                <h5>Edit Product</h5>

            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(Session::has('message'))
                    <div class="alert alert-success"><em> {!! session('message') !!}</em></div>
                @endif

                <script>
                    $('.alert').delay(5000).slideUp(300);
                </script>

                <form action="{{ route('admin.update', ['pro_id' => $data[0]->id]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $data[0]->name }}">
                    </div>
                    <div class="form-group">
                        <label for="pro_slug">Product Slug</label>
                        <input type="text" id="slug" name="slug" class="form-control" value="{{ $data[0]->slug }}">
                    </div>
                    <div class="form-group">
                        <label for="details">Product Details</label>
                        <input type="text" id="details" name="details" class="form-control" value="{{ $data[0]->details }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Product Price</label>
                        <input type="text" id="price" name="price" class="form-control" value="{{ $data[0]->price }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <textarea class="form-control" id="description" name="description" rows="6">{{ $data[0]->description }}</textarea>
                    </div>

                    <button type="submit" id="btn" class="btn btn-success">Update Product</button>

                </form>

            </div>

            <div class="card-footer">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;<a href="{{ route('admin.add') }}" class="card-link">Back to Products Section</a>
            </div>

        </div>
    </div>

    <div class="col-sm-3">

        <div class="card">
            <div class="card-header">
                <h5>Edit product with ID: {{ $data[0]->id }}</h5>
            </div>
            <img class="card-img-top" src="{{ asset('/images/products/'.$data[0]->slug.'.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">{{ $data[0]->name }}</h2>
                <p class="subtitle">{{ $data[0]->details }}</p>
                <p class="price">{{ $data[0]->presentPrice() }}</p>
                <p>{{ $data[0]->description }}</p>
            </div>
        </div>
    </div>

@endsection