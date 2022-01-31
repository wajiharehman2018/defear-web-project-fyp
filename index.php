<?php
session_start();
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']==1){
		header("Location:teacher_home.php");
	}
	else{
		header("Location:therapist_home.php");	
	}
}
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <!-- Including Bootstrap Css -->
    <!-- Latest compiled and minified CSS -->
    <?php include 'css.php'; ?>
    <!-- Adding Custom Css -->
    <style type="text/css">
    .container {
        margin-top: 30px;
    }

    body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
    }

    .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }

    .form-signin .form-signin-heading,
    .form-signin .checkbox {
        margin-bottom: 10px;
    }

    .form-signin .checkbox {
        font-weight: normal;
    }

    .form-signin .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
    }

    .form-signin .form-control:focus {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Template</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <!-- Am Using Bootstrap Css for Designing My web page -->
    <!-- Let's Create Login part -->
    <!-- Now Adding Bootstrap Login Part Design -->
    <!-- Now Login Page Done -->
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container" style="margin-top: -100px">
            <div class="row">
                <?php if(isset($_REQUEST['error'])){ ?>
                <div class="col-lg-12">
                    <span class="alert alert-danger" style="display: block;"><?php echo $_REQUEST['error']; ?></span>
                </div>
                <?php } ?>
            </div>
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="images/banner.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="images/logo.png" alt="logo" class="logo" style="width: 280px; height: 120px">
                            </div>
                            <p class="login-card-description">Sign into your account</p>
                            <form action="login.php" method="post">
                                <div class="form-group">
                                    <label for="inputEmail" class="sr-only">Email address</label>
                                    <input type="email" id="inputEmail" name="email" class="form-control"
                                        placeholder="Email address" required autofocus>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="inputPassword" class="sr-only">Password</label>
                                    <input type="password" name="password" id="inputPassword" class="form-control"
                                        placeholder="Password" required>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-block login-btn mb-4" type="submit">Log in</button>
                                </div>
                            </form>
                            <a href="#!" class="forgot-password-link">Forgot password?</a>
                            <p class="login-card-footer-text">Don't have an account? 
								<a href="add_student.php"
                                    class="text-reset">Register here</a></p>
                            <nav class="login-card-footer-nav">
                                <a href="#!">Terms of use.</a>
                                <a href="#!">Privacy policy</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    *98520+96385241<crpt src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
        </script>/
</body>

</html>