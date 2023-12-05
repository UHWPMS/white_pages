@extends('../Layout/layout')


@section('content')
<div class="mt-lg-5 m-lg-5">
<div class="row">

    <div class="col-lg-12 margin-tb">

            <div class="main-title-container mb-3">
                <div class="main-title-wrapper">
                    <h1>Users</h1>
                </div>
            </div>


        <div class="pull-right">

            <a class="btn btn-success mb-2" href="{{ route('users.create') }}"> Create New User</a>

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

        <th>Email</th>

        <th>Roles</th>

        <th width="280px">Action</th>

    </tr>

    @foreach ($data as $key => $user)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $user->name }}</td>

        <td>{{ $user->email }}</td>

        <td>

            @if(!empty($user->getRoleNames()))

            @foreach($user->getRoleNames() as $v)

            <label class="">{{ $v }}</label>

            @endforeach

            @endif

        </td>

        <td>

            <a class="btn btn-primary me-1" href="{{ route('users.edit',$user->id) }}">Edit</a>

            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}

        </td>

    </tr>

    @endforeach

</table>


{!! $data->render() !!}
</div>
@endsection
