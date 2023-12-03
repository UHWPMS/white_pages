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
                    </tr>
                </thead>
                <tbody>
                    @foreach($unique_persons as $index => $person)
                        <tr id= {{"trow-". $person -> pid}}>
                            <td>{{$person->name_of_record}}</td>
                            <td>{{$person->code}}</td>
                            <td>{{$person->dept_name}}</td>
                            <td>{{$person->per_email}}</td>
                            <td>{{$person->per_phone}}</td>
                            <td>{{$combined_roles[$index]->roles}}</td>
                            <td style="text-align: center;">
                            <button class="btn edit-button btn-custom"
                                    style="background-color: #86C2F1;"
                                    data-name="{{ $person->name_of_record }}"
                                    data-id="{{$person->pid}}"
                                    data-toggle="modal" data-target="#editPersonModal">
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
<!-- editPersonModal -->
<div class="modal fade" id="editPersonModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('person_listings.update', ':personUsername' ) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header" style="background-color: #86C2F1;">
                    <h5 class="modal-title" id="editModalLabel">Edit Person's Roles</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                            id="edit-x-button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit-username">Username</label>
                        <input type="text" name="username" class="form-control" id="edit-username"
                               required minlength="6" maxlength="60" title="Enter a username (6 to 60 characters)">
                    </div>
                    <div class="form-group">
                        <label for="edit-person-name">Name of Record</label>
                        <input type="text" name="name" class="form-control" id="edit-person-name"
                               required minlength="2" maxlength="60" title="Enter a name (10 to 60 characters)">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="edit-close-button">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
   $(document).ready(function () {
        $("#dept-contacts-table").DataTable({
            "pagingType": "simple_numbers",
            "language": {
                "emptyTable": "The Person Listings table is empty",
                "lengthMenu": "Display _MENU_ persons",
                "loadingRecords": "Loading...",
                "processing": "Processing...",
                "zeroRecords": "No search results found",
                "paginate": {
                    "next": "Next",
                    "previous": "Previous"
                }
            }
        });
    });
    
        // Function to handle the edit button click
        $("#person-listings-table").on("click", ".edit-button", function () {
            var personUsername = $(this).data("username");
            var personName = $(this).data("name");
            var personNameOfRecord = $(this).data("nameOfRecord");
            var personJobTitle = $(this).data("jobTitle");
            var personEmail = $(this).data("email");
            var personAliasEmail = $(this).data("aliasEmail");
            var personPhone = $(this).data("phone");
            var personLocation = $(this).data("location");
            var personFax = $(this).data("fax");
            var personWebsite = $(this).data("website");
            var personPub = $(this).data("publishable");

            $("#edit-username").val(personUsername);
            $("#edit-person-name").val(personName);
            $("#edit-person-name-of-record").val(personNameOfRecord);
            $("#edit-person-job-title").val(personJobTitle);
            $("#edit-person-email").val(personEmail);
            $("#edit-person-alias-email").val(personAliasEmail);
            $("#edit-person-phone").val(personPhone);
            $("#edit-person-location").val(personLocation);
            $("#edit-person-fax").val(personFax);
            $("#edit-person-website").val(personWebsite);
            $("#edit-person-publishable option").filter(function() {
                return $(this).text() === personPub;
            }).prop('selected', true);

            $("#editPersonModal").modal("show");

            var editUrl = "{{ route('person_listings.update', ':personUsername') }}";
            editUrl = editUrl.replace(":personUsername", personUsername);
            $("#editPersonModal form").attr("action", editUrl);
        });

    
</script>

@endsection
