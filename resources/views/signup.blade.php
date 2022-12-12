<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Focus Admin: Widget</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="css/lib/themify-icons.css" rel="stylesheet">
    <link href="css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="bg-secondary">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="index.html"><span>Student-suspension</span></a>
                        </div>
                        <div class="login-form">
                            <h4> Sign-Up</h4>
                            <form action="{{route('user.signup')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>First name</label>
                                    <input type="text" class="form-control" name="fname" placeholder="First name">
                                </div>
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input type="text" class="form-control" name="lname" placeholder="Last name">
                                </div>
                                <div class="form-group">
                                    <label>Registration number</label>
                                    <input type="text" class="form-control" name="regNumber" placeholder="Registration number">
                                </div>
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                        <label>Program</label>
                        <select class="form-control" name="program_id">
                            @foreach($programs as $program)
                                <option value={{ $program->id }}>{{ $program->program_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
                            <option value='male'>Male</option>
                            <option value='female'>Female</option>

                        </select>
                    </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember Me
                                    </label>
                                    <label class="pull-right">
                                        <a href="#">Forgotten Password?</a>
                                    </label>

                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign up</button>
                                <div class="social-login-content">
                                    <div class="social-button">
                                    </div>
                                </div>
                                <div class="register-link m-t-15 text-center">
                                    <p>already have an account ? <a href="/login"> Login Here</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>