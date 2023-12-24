@extends('layouts.master')

@section('content')
    <div class="page-content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Welcome to Test Application</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#adduser" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Add new user</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#userlist" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">User list</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="adduser" role="tabpanel">
                                <!-- Form to add a new user -->
                                <form id="userForm" enctype="multipart/form-data" name="userForm" action="javascript:void(0)">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <input type="text" class="form-control" id="address" name="address" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="roles">Roles:</label>
                                        <select class="form-control" id="roles" name="roles" required>
                                            <option value="">Select Role</option>
                                            @foreach($roles as $role)
                                                <option {{ old('roles') == $role->id ? 'selected' : '' }} value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                                <button type="button" class="btn btn-primary" id="btn-submit">Submit</button>
                            </div>

                            <div class="tab-pane" id="userlist" role="tabpanel">
                                <!-- Table to display user list -->
                                <table id="userTable" class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Role Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                        <!-- Delete User Modal -->
                        <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this user?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger" id="btn-delete">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="modal-update-user">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Edit</h4>
                                    </div>

                                    <div class="modal-body">
                                        <form id="modal-form" name="modal-form">
                                            <input type="hidden" name="userId" id="modal-user-id">

{{--                                            @csrf--}}
{{--                                            <input type="hidden" id="editUserId" name="id">--}}
                                            <div class="form-group">
                                                <label for="editName">Name:</label>
                                                <input type="text" class="form-control" id="editName" name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="editEmail">Email:</label>
                                                <input type="email" class="form-control" id="editEmail" name="email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="editAddress">Address:</label>
                                                <input type="text" class="form-control" id="editAddress" name="address" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="editRoles">Roles:</label>
                                                <select class="form-control" id="editRoles" name="roles" required>
                                                    <!-- Options will be filled dynamically via AJAX -->
                                                </select>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="modal-btn-update">Update</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        var formData = new FormData($('#userForm')[0]);
        formData.append('_token', '{{ csrf_token() }}');

        $(document).ready(function () {
            $('#btn-submit').click(function () {
                var formData = new FormData($('#userForm')[0]);
                $.ajax({
                    type: "POST",
                    url: "{{ route('users.store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            // $('#modal-account-head').modal('hide');
                            Swal.fire(
                                'Add!',
                                response.message,
                                'success'
                            ).then((result) => {
                                // location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message,
                            });
                        }
                    }
                });
            });
        });


        $(function () {
            $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('user.datatable') }}',
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'address', name: 'address'},
                    {data: 'role', name: 'role_id'},
                    {data: 'action', name: 'action', orderable: false},
                ],
                "responsive": true, "autoWidth": false,
            });
        })

        $('body').on('click', '.btn-edit', function () {
            var userId = $(this).data('id');
            $('#modal-user-id').val(userId);
            $.ajax({
                method: "GET",
                url: "{{ route('user.details') }}",
                data: { userId: userId }
            }).done(function( response ) {
                console.log(response);
                // $('#modal-task-id').val(response.task);
                $('#modal-update-user').modal('show');
            });
        });

        $('#modal-btn-update').click(function () {
            // Get the selected status and task ID
            var selectedUser = $('#update_user').val();
            var userId = $('#modal-user-id').val();

            // Check if a status is selected
            if (!selectedUser) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Please select a status before updating.'
                });
                return;
            }

            // Create form data with the selected status and task ID
            var formData = new FormData($('#modal-form')[0]);
            formData.append('user', selectedUser);
            formData.append('userId', userId); // Add the user ID to the form data

            $.ajax({
                type: "POST",
                url: "{{ route('user.update') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        $('#modal-update-user').modal('hide');
                        Swal.fire(
                            'Updated!',
                            response.message,
                            'success'
                        ).then((result) => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                        });
                    }
                }
            });
        });

        function deleteUser(userId) {
            // AJAX request to delete a user
            $.ajax({
                type: 'DELETE',
                url: '/user/delete/' + userId,
                data: {
                    _token: '{{ csrf_token() }}', // Add this line to include CSRF token
                },
                success: function (response) {
                    // Reload the DataTable
                    $('#userTable').DataTable().ajax.reload();
                    // Show a success message
                    Swal.fire(
                        'Delete!',
                        response.message,
                        'success'
                    );
                },
                error: function (xhr, status, error) {
                    // Handle error, show an error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error deleting user',
                    });
                }
            });
        }
    </script>

@endsection
