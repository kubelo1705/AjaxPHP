<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  
</head>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login_form" class="form" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username_login" id="username_login" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password_login" id="password_login" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="login" id="login" class="btn btn-info btn-md" value="Log in">
                                <button type="button" name="register" id="register" data-toggle="modal" data-target="#register_Modal" class="btn btn-info btn-md">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="register_Modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Register</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="register_form" method="POST">
                        <div class="control-group">
                            <!-- Username -->
                            <label class="control-label" for="username">Username</label>
                            <div class="controls">
                                <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
                                <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- E-mail -->
                            <label class="control-label" for="email">E-mail</label>
                            <div class="controls">
                                <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                                <p class="help-block">Please provide your E-mail</p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" for="password">Password</label>
                            <div class="controls">
                                <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                                <p class="help-block">Password should be at least 4 characters</p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Password -->
                            <label class="control-label" for="password_confirm">Password (Confirm)</label>
                            <div class="controls">
                                <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
                                <p class="help-block">Please confirm password</p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                                <button class="btn btn-success" id="submit" name="submit" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</html>

<script>
    $(document).ready(function() {
        $('#register').click(function() {
            $('#register_form')[0].reset();
        });
        $('#register_form').on("submit", function(event) {
            event.preventDefault();
            if ($('#username').val() == "" ||$('#email').val() == ''||$('#password').val() == ''||$('#password_confirm').val() == '') {
                alert("Please enter all required fields");
            } else if($('#password_confirm').val()!=$('#password').val()) {
                alert("Password confirm is invalid");
            }else {
                $.ajax({
                    url: "register.php",
                    method: "POST",
                    data: $('#register_form').serialize(),
                    success: function(data) {
                        $('#register_form')[0].reset();
                        $('#register_Modal').modal('hide');
                        alert(data);
                    }
                });
            }
        });
        $('#login').on("submit", function(event) {
            event.preventDefault();
            if ($('#username_login').val().includes(" ")) {
                alert("Username is invalid");
            }else if ($('#password_login').val().includes(" ")) {
                alert("Password is invalid");
            }else if($('#username_login').val()==""||$('#password_login').val()==""){
                alert("Please enter all field");
            }else {
                $.ajax({
                    url: "login.php",
                    method: "POST",
                    data: $('#login_form').serialize(),
                    success: function(data) {
                        $('#login_form')[0].reset();
                        alert(data);
                    }
                });
            }
        });
    });
</script>