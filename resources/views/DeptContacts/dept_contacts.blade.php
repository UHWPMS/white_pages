
@extends('../Layout/layout')

@section('content')

<div class="container-fluid">
    <div>
        <h1>Manage Department Contacts</h1>
    </div>    
    
    <div class="table-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <table id="dept-contacts-table" class="table table-size table-bordered mt-5">
                <thead class="table-header-color align-middle">
                    <tr>
                        <th>Contact Name</th>
                        <th>Campus Code</th>
                        <th>Department Name</th>
                        <th>UH Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr id="row-{{$item->pid}}>
                            <td>{{$item->name_of_record}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection