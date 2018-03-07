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

                <form action="{{ route('admin.update_cat', ['cat_id' => $data[0]->id]) }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Name of Category</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $data[0]->name }}">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug of Category</label>
                        <input type="text" id="slug" name="slug" class="form-control" value="{{ $data[0]->slug }}">
                    </div>

                    <button type="submit" id="btn" class="btn btn-success">Update Category</button>
                </form>

            </div>

            <div class="card-footer">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;<a href="{{ route('admin.add_cat') }}" class="card-link">Back to Categories Section</a>
            </div>

        </div>

    </div>
@endsection