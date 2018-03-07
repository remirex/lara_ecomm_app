@extends('admin.master')

@section('title','add_product')

@section('content')

    <div class="col-sm-4">

        <div class="card">

            <div class="card-header">

                <h5>Add Product</h5>

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

                <form action="{{ route('admin.save') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="cat">Category</label>
                        <select class="form-control" name="categories">
                            <option>Chose category</option>
                            @foreach($categories as $category)

                                <option value="{{ $category->id }}">{{ $category->name }}</option>

                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pro_slug">Product Slug</label>
                        <input type="text" id="slug" name="slug" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="details">Product Details</label>
                        <input type="text" id="details" name="details" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Product Price</label>
                        <input type="text" id="price" name="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <textarea class="form-control" id="description" name="description" rows="6"></textarea>
                    </div>

                    <button type="submit" id="btn" class="btn btn-success">Add Product</button>

                </form>

            </div>

        </div>
    </div>

    <div class="col-sm-8">

        <div class="col-sm-12">

            <h4>Section Products</h4>

            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Details</th>
                    <th>Price</th>
                    <th class="text-right">Action</th>
                </tr>
                </thead>
                @foreach($products as $product)

                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ $product->details }}</td>
                        <th>{{ $product->presentPrice() }}</th>
                        <td class="text-right">
                            <a href="{{ route('admin.edit_pro',['pro_id' => $product->id]) }}"><i class="fa fa-pencil-square fa-2x" aria-hidden="true" style="color: orange"></i></a>
                        </td>
                    </tr>

                    @endforeach

            </table>

            <div class="d-flex justify-content-center pagination">
                {{ $products->links() }}
            </div>

        </div>

    </div>


    @endsection