@extends('admin.master')

@section('title','add_category')

@section('content')

    <div class="col-sm-4">

        <div class="card">

            <div class="card-header"><h5>Add Category</h5></div>

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

                <form action="{{ route('admin.save_cat') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Name of Category</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug of Category</label>
                        <input type="text" id="slug" name="slug" class="form-control">
                    </div>

                    <button type="submit" id="btn" class="btn btn-success">Add Category</button>
                </form>

            </div>

        </div>

    </div>

    <div class="col-sm-6">

        <h4>Section Category</h4>

        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name of Category</th>
                <th>Slug of Category</th>
                <th class="text-right">Edit</th>
            </tr>
            </thead>

            @foreach($categories as $category)

                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td class="text-right"><a href="{{ route('admin.edit_cat', ['cat_id' => $category->id]) }}"><i class="fa fa-pencil-square fa-2x" aria-hidden="true" style="color: orange"></i></a> </td>
                </tr>

                @endforeach

        </table>
    </div>


@endsection