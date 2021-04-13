@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Settings</h2>

            <a href="{{ route('settings.create') }}" class="btn btn-warning pull-right">Add new user</a>

            @if(count($settings) > 0)

                <table class="table table-bordered">
                    <tr>
                        <td>Title</td>
                        <td>Email</td>
                        <td>Role</td>
                        <td>Photo</td>
                        <td>Actions</td>
                    </tr>
                    @foreach($settings as $settings)
                        <tr>
                            <td>{{ $settings->title }}</td>
                            <td><img width="150" src="{{ url('uploads/' . $settings->photo) }}" /></td>
                            <td><a href="{{ $website->email }}">{{ $settings->email }}</a> </td>
                            <td><a href="{{ $website->role }}">{{ $settings->role }}</a> </td>
                            <td>
                                <a href="{{ url('settings/' . $settings->id . '/edit') }}"><i class="glyphicon glyphicon-edit"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </table>

                @if(count($settings) > 0)
                    <div class="pagination">
                        <?php echo $settings->render();  ?>
                    </div>
                @endif

            @else
                <i>No settings found</i>

            @endif
        </div>
    </div>

@endsection