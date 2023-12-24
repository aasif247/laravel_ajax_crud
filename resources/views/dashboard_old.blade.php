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

                    <h4 class="card-title">Note</h4>
                    <p class="card-title-desc">Only use ajax to create new user, edit and delete user.</p>
                    <h6 class="mb-3">Already user table and roles table there. No need to create that</h6>
                    <p style="color:#c40b0b">Delete all instructions in tabs when you complete</p>

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
                            <p class="mb-0">
                                *. Create a form here and include fields like name,email,password,address,roles. <br>
                                *. A submit button to submit the form data via ajax. <br>
                                *. All fields are required <br>
                                *. You can implement any design and color etc. No rules for it. <br>
                                *. Create necessary route,controller,model,view etc if required <br>
                            </p>
                        </div>
                        <div class="tab-pane" id="userlist" role="tabpanel">
                            <p class="mb-0">
                                *. When open this tab load latest data via ajax. <br>
                                *. Use datatables to show data as table. [you can find demo from html theme that provided to you or search google as datatabsles]
                                <br>
                                *. Table column name will be Id,Name,Email,Address, Role Name, Actions. Actions column row will contain two buttons edit and delete. If user click each row for edit. A modal will open
                                with information field like Name,Email,Address,Role and a save button to save data via ajax. After save data information will update for that user. After clicking delete button each user will be deleted via ajax. And reload the table to show latest data

                                <h6 class="pt-3">Example Table [ this example table column name and other information is different]</h6>
                                <img class="img-fluid mb-5" src="{{asset('assets/images/Screenshot_4.jpg')}}" alt="">

                            <hr>

                                after clicking edit a modal will open like something to update data

                                <img class="mb-3" src="{{asset('assets/images/Screenshot_5.jpg')}}" alt="">



                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection

{{--@section('content')--}}
{{--    <div class="page-content">--}}
{{--        <!-- start page title -->--}}
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                <div class="page-title-box d-flex align-items-center justify-content-between">--}}
{{--                    <h4 class="page-title mb-0 font-size-18">Add New User</h4>--}}

{{--                    <div class="page-title-right">--}}
{{--                        <ol class="breadcrumb m-0">--}}
{{--                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>--}}
{{--                            <li class="breadcrumb-item active">Add New User</li>--}}
{{--                        </ol>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- end page title -->--}}

{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <form id="add-user-form">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="name">Name</label>--}}
{{--                                <input type="text" class="form-control" id="name" name="name" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="email">Email</label>--}}
{{--                                <input type="email" class="form-control" id="email" name="email" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="password">Password</label>--}}
{{--                                <input type="password" class="form-control" id="password" name="password" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="address">Address</label>--}}
{{--                                <input type="text" class="form-control" id="address" name="address" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="roles">Roles</label>--}}
{{--                                <select class="form-control" id="roles" name="roles" required>--}}
{{--                                    <!-- Populate roles dynamically if needed -->--}}
{{--                                    <option value="admin">Admin</option>--}}
{{--                                    <option value="user">User</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

{{--@section()--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            // Load users on user list tab click--}}
{{--            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {--}}
{{--                if (e.target.hash === '#userlist') {--}}
{{--                    loadUsers();--}}
{{--                }--}}
{{--            });--}}

{{--            // Add user form submission--}}
{{--            $('#add-user-form').submit(function (e) {--}}
{{--                e.preventDefault();--}}
{{--                addUser();--}}
{{--            });--}}

{{--            // Edit user form submission--}}
{{--            $('#edit-user-form').submit(function (e) {--}}
{{--                e.preventDefault();--}}
{{--                editUser();--}}
{{--            });--}}

{{--            // Delete user--}}
{{--            $('#user-list').on('click', '.delete-user', function () {--}}
{{--                deleteUser($(this).data('user-id'));--}}
{{--            });--}}
{{--        });--}}

{{--        function loadUsers() {--}}
{{--            // Ajax request to get users and populate the table--}}
{{--            $.ajax({--}}
{{--                url: '/get-users',--}}
{{--                type: 'GET',--}}
{{--                success: function (data) {--}}
{{--                    renderUserTable(data);--}}
{{--                },--}}
{{--                error: function (error) {--}}
{{--                    console.error('Error loading users:', error);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}

{{--        function addUser() {--}}
{{--            // Ajax request to add a new user--}}
{{--            $.ajax({--}}
{{--                url: '/add-user',--}}
{{--                type: 'POST',--}}
{{--                data: $('#add-user-form').serialize(),--}}
{{--                success: function (data) {--}}
{{--                    // Clear form and reload user table--}}
{{--                    $('#add-user-form')[0].reset();--}}
{{--                    loadUsers();--}}
{{--                },--}}
{{--                error: function (error) {--}}
{{--                    console.error('Error adding user:', error);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}

{{--        function editUser() {--}}
{{--            // Ajax request to edit an existing user--}}
{{--            $.ajax({--}}
{{--                url: '/update-user/' + $('#edit-user-id').val(),--}}
{{--                type: 'PUT',--}}
{{--                data: $('#edit-user-form').serialize(),--}}
{{--                success: function (data) {--}}
{{--                    // Close the modal and reload user table--}}
{{--                    $('#edit-user-modal').modal('hide');--}}
{{--                    loadUsers();--}}
{{--                },--}}
{{--                error: function (error) {--}}
{{--                    console.error('Error editing user:', error);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}

{{--        function deleteUser(userId) {--}}
{{--            // Ajax request to delete a user--}}
{{--            $.ajax({--}}
{{--                url: '/delete-user/' + userId,--}}
{{--                type: 'DELETE',--}}
{{--                success: function (data) {--}}
{{--                    // Reload user table after deletion--}}
{{--                    loadUsers();--}}
{{--                },--}}
{{--                error: function (error) {--}}
{{--                    console.error('Error deleting user:', error);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}

{{--        function renderUserTable(users) {--}}
{{--            // DataTables initialization and rendering--}}
{{--            $('#user-list').DataTable().destroy();--}}

{{--            $('#user-list').DataTable({--}}
{{--                data: users,--}}
{{--                columns: [--}}
{{--                    { data: 'id' },--}}
{{--                    { data: 'name' },--}}
{{--                    { data: 'email' },--}}
{{--                    { data: 'address' },--}}
{{--                    { data: 'role' },--}}
{{--                    {--}}
{{--                        data: null,--}}
{{--                        render: function (data, type, row) {--}}
{{--                            // Action buttons (Edit and Delete)--}}
{{--                            return '<button class="btn btn-sm btn-primary edit-user" data-toggle="modal" data-target="#edit-user-modal" data-user-id="' + row.id + '">Edit</button> ' +--}}
{{--                                '<button class="btn btn-sm btn-danger delete-user" data-user-id="' + row.id + '">Delete</button>';--}}
{{--                        }--}}
{{--                    }--}}
{{--                ]--}}
{{--            });--}}
{{--        }--}}

{{--        // Additional code for initializing DataTables--}}
{{--        $(document).ready(function () {--}}
{{--            $('#user-list').DataTable();--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
