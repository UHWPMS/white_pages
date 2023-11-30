
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
                        <th>Edit Role</th>
                        <th>Delete Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr id= {{"trow-". $item -> pid}}>
                            <td>{{$item->name_of_record}}</td>
                            <td>{{$item->code}}</td>
                            <td>{{$item->dept_name}}</td>
                            <td>{{$item->per_email}}</td>
                            <td>{{$item->per_phone}}</td>
                            <td>{{$item->role_name}}</td>
                            <td style="text-align: center;">
                                <button class="btn edit-button btn-custom"
                                    style="background-color: #86C2F1;"
                                    data-pid="{{$item->pid}}"
                                    data-name="{{$item->name_of_record}}"
                                    data-role="{{$item->role_name}}"
                                    data-toggle="modal" data-target="#editModal">
                                
                                    <i class="fa fa-pencil"></i>
                                </button>
                            </td>
                            <td style="text-align: center;">
                                    <button class="btn delete-button btn-custom"
                                        style="background-color: #CB5D5D;"
                                        data-pid="{{$item->pid}}"
                                        data-name="{{$item->name_of_record}}"
                                        data-role="{{$item->role_name}}">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                            </td>
           
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
<script>
    $(document).ready(function () {
        $("#dept-contacts-table").DataTable({
            "pagingType": "simple_numbers",
            "language": {
                "emptyTable": "The Department Contacts table is empty",
                "lengthMenu": "Display _MENU_ contacts",
                "loadingRecords": "Loading...",
                "processing": "Processing...",
                "zeroRecords": "No search results found",
                "paginate": {
                    "next": "Next",
                    "previous": "Previous"
                }
            },
            label: false

        });
        
    

    
</script>