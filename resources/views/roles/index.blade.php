@extends('../Layout/layout')


@section('content')
<div class="mt-lg-5 m-lg-5">
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="main-title-container mb-3">
            <div class="main-title-wrapper">
                <h1>Roles</h1>
            </div>
        </div>

        <div class="pull-right">

            <a class="btn btn-success mb-2" href="{{ route('roles.create') }}"> Create New Role</a>

        </div>

    </div>

</div>


@if ($message = Session::get('success'))

<div class="alert alert-success">

    <p>{{ $message }}</p>

</div>

@endif


<table class="table table-bordered">

    <tr>

        <th>No</th>

        <th>Name</th>

        <th width="280px">Action</th>

    </tr>

    @foreach ($roles as $key => $role)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $role->name }}</td>

        <td>

            <a class="btn btn-primary me-1" href="{{ route('roles.edit',$role->id) }}">Edit</a>

            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}

        </td>

    </tr>

    @endforeach

</table>


{!! $roles->render() !!}

</div>
@endsection
