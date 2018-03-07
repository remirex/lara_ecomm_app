@extends('admin.master')

@section('title', 'dashboard')

@section('content')

    <div class="col-sm-3">
        <img class="card-img-top" src="{{ asset('images/'.$admin->slug_img.'.jpg') }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $admin->name }}</h5>
            <p>position: <i>{{ $admin->job_title }}</i></p>
            <p><small><cite title="San Francisco, USA">{{ $admin->country }} <i class="fa fa-map-marker" aria-hidden="true"></i></cite></small></p>
            <p>
                <i class="fa fa-envelope" aria-hidden="true"></i> {{ $admin->email }}<br>
                <a href="#"><i class="fa fa-globe" aria-hidden="true"></i> {{ $admin->site }}</a>
            </p>
            <div class="btn-group profile">
                <button type="button" class="button dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Social Networks
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Facebook&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                    <a class="dropdown-item" href="#">Instagram&nbsp;&nbsp;&nbsp;<i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a class="dropdown-item" href="#">Linkedin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Github&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-github-square" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3">

        <div class="card">

            <div class="card-header">
                <h5>Add Coupon for products</h5>
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

                <form action="{{ route('admin.save_coupon') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="code">Code of coupon</label>
                        <input type="text" id="code" name="code" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="type">Type of coupon</label>
                        <input type="text" id="type" name="type" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="value">Value of coupon</label>
                        <input type="text" id="value" name="value" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="percent_off">Percent off</label>
                        <input type="text" id="percent_off" name="percent_off" class="form-control">
                    </div>

                    <button type="submit" id="btn" class="btn btn-success">Add Coupon</button>

                </form>
            </div>
        </div>
    </div>

    <div class="col-sm-6">

        <h4>Section Coupon</h4>

        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Type</th>
                <th>Value</th>
                <th>Percent</th>
                <th class="text-right">Action</th>
            </tr>
            </thead>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-right">
                    <a href=""><i class="fa fa-pencil-square fa-2x" aria-hidden="true" style="color: orange"></i></a> |
                    <a href=""><i class="fa fa-trash fa-2x" aria-hidden="true" style="color: red"></i></a>
                </td>
            </tr>
        </table>
    </div>

    <div class="col-sm-12">

        <h3>Section Products</h3>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Details</th>
                <th class="text-right">Price</th>
            </tr>
            </thead>
            @foreach($products as $product)
            <tr>
                <th>{{ $product->id }}</th>
                <td> <img src="{{ asset('/images/products/'.$product->slug.'.jpg') }}" width="100" height="60"> </td>
                <td> {{ $product->name }}</td>
                <td> {{ $product->details }}</td>
                <th class="text-right"> {{ $product->presentPrice() }} </th>
            </tr>
                @endforeach
        </table>

       <div class="d-flex justify-content-center pagination">
           {{ $products->links() }}
       </div>

    </div>
    @endsection