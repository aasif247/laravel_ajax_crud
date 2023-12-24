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

    <form id="userForm">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <button type="button" onclick="submitForm()">Add User</button>
    </form>
</div>
@endsection

@section('script')
    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
{{--    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}">--}}
    <script>
        function submitForm() {
            let formData = new FormData(document.getElementById('userForm'));

            // Use AJAX to submit the form data
            $.ajax({
                type: 'POST',
                url: '/user/add',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    // Handle success (e.g., show a success message)
                },
                error: function(error) {
                    console.error(error);
                    // Handle error (e.g., show an error message)
                }
            });
        }
    </script>
@endsection
