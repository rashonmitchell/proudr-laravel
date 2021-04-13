@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Update User #{{$settings->id}}</h2>

            @if(session('error')!='')
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (count($errors) > 0)

                <div class="alert alert-danger">

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form method="post" action="{{ route('settings.update', ['id' => $settings->id]) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field("PUT") }}

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">

                            <strong>Title:</strong>

                            <input type="text" name="title" value="{{ $website->title }}" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">

                            <strong>Email:</strong>

                            <input type="text" name="email" value="{{ $settings->email }}" class="form-control" />

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">

                            <strong>Role:</strong>

                            <input type="text" name="role" value="{{ $settings->role }}" class="form-control" />

                        </div>
                    </div>
                </div>

                <div class="row">
                    @if($settings->photo != "")
                        <img src="{{ url('uploads/' . $settings->photo) }}" width="150" />
                    @endif
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">

                            <strong>Photo:</strong>

                            <input type="file" name="photo" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="submit" class="btn btn-primary" id="btn-save">Update</button>

                </div>

            </form>
        </div>
    </div>

@endsection