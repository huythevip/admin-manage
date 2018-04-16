@extends('main')

@section('title', '| Homepage')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <h1>Welcome to our Authentication System!</h1>
            <div class="col-md-6">
                <a class="btn btn-primary btn-block" data-toggle="modal" data-target="#loginForm">Log in</a>
            </div>
            <div class="col-md-6">
                <a class="btn btn-success btn-block" data-toggle="modal" data-target="#registrationForm">Register</a>
            </div>
        </div>
    </div>

    <!-- Modal Login-->
    <div class="modal fade" id="loginForm" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="loginModal">Log in</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                            <label for="loginEmail">Email address</label>
                            <input type="text" class="form-control" id="loginEmail" placeholder="Your Email">
                    </div>
                    <div class="modal-body">
                            <label for="loginPassword">Password</label>
                            <input type="password" class="form-control" id="loginPassword" placeholder="Your Password">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="buttonLogin">Log in</button>
                    </div>
            </div>
        </div>
    </div>


    <!-- Modal Registeration-->
    <div class="modal fade" id="registrationForm" tabindex="-1" role="dialog" aria-labelledby="regisModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="regisModal">Register</h1>
                </div>
                <div class="modal-body">
                    <label for="regisName">Your name</label>
                    <input type="text" class="form-control" id="regisName" placeholder="Your name">
                </div>
                <div class="modal-body">
                    <label for="regisEmail">Email address</label>
                    <input type="text" class="form-control" id="regisEmail" placeholder="Your Email">
                </div>
                <div class="modal-body">
                    <label for="regisPassword">Password</label>
                    <input type="password" class="form-control" id="regisPassword" placeholder="Your Password">
                </div>
                <div class="modal-body">
                    <label for="confirmRegisPassword">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmRegisPassword" placeholder="Retype your password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="buttonRegister">Register</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#buttonLogin').click( function() {
                var email = $('#loginEmail').val();
                var password = $('#loginPassword').val();
                $.ajax({
                    url: '/login',
                    type: 'POST',
                    dataType: 'JSON',
                    data: { email, password},
                    success: function(response) {
                        alert(response['message']);
                        if (response['status'] == 'ok') {
                            window.location.href = '/home';
                        }
                    } //Success
                }); //Ajax
            }); //Click Register button


            $('#buttonRegister').click( function() {
                var name = $('#regisName').val();
                var email = $('#regisEmail').val();
                var password = $('#regisPassword').val();
                var password_confirmation = $('#confirmRegisPassword').val();
                $.ajax({
                    url: '/register',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {name, email, password, password_confirmation},
                    success: function(response) {
                        alert(response['message']);
                        window.location.href = '/home';
                    } //Success
                }); //Ajax
            }); //Click Register button

        }); //Document ready

    </script>


@endsection