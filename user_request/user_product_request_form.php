<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="user_product_request_form.css">
    <link rel="stylesheet" href="../css/app.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <title>Defear - User Product Request</title>
</head>

<body>
    <div class="container pt-5">
        <div class="df-product-request-form-container mt-5">
            <div class="df-request-form-heading">
                <p>Product Request</p>
            </div>
            <div class="df-request-form-body">
                <div class="alert alert-danger error"></div>
                <div class="alert alert-success success"></div>
                <form action="" method="post">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" placeholder="Enter email" id="email"
                                        name="email">
                                    <div class="text-danger email-error"></div>
                                    <div class="text-success email-available"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pwd">Password</label>
                                    <input type="password" class="form-control" placeholder="Enter password" id="pwd"
                                        name="password">
                                    <div class="text-danger password-error"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cnfrmpwd">Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="Enter password"
                                        id="confirmPwd" name="confirm_password">
                                    <div class="text-danger confirm-password-error"></div>
                                    <div class="text-success confirm-password-match"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" placeholder="Enter first name"
                                        id="firstName" name="firstname">
                                    <div class="text-danger firstname-error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Enter last name" id="lastName"
                                        name="lastname">
                                    <div class="text-danger lastname-error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input type="text" class="form-control" placeholder="Enter contact" id="contact"
                                        name="contact">
                                    <div class="text-danger contact-error"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" placeholder="Enter country" id="country"
                                        name="country">
                                    <div class="text-danger country-error"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="education">Education</label>
                                    <input type="text" class="form-control" placeholder="Enter education" id="education"
                                        name="education">
                                    <div class="text-danger education-error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12 text-center" class="btn-back-to-login text-purple">
                            <a href="https://defear.csse-juw.com/admin/app/index.php" class="btn-purple-link">Already have an account? Login here</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-purple mx-auto" id="productRequestSubmit"
                                name="product_request_submit">Submit</button>
                            <button class="btn btn-purple"
                                name="back-to-homepage"><a href="https://defear.csse-juw.com/admin/">Back to Homepage</a></button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('.error').hide();
        $('.success').hide();
        var emailVal = passwordVal = false;
        var fnameVal = lnameVal = contactVal = countryVal = educationVal = false;
        $('#email').change(function() {
            var email_send = $('#email').val();
            $.ajax({
                url: 'check_user_exists.php',
                method: 'POST',
                data: {
                    email: email_send
                },
                success: function(response) {
                    console.log(response)
                    if (response == "1") {
                        $('.email-error').html('Email already exists');
                        emailVal = false;
                    } else if (response == "0") {
                        $('.email-available').html('Email available');
                        $('.email-error').html('');
                        emailVal = true;
                    }
                },
                error: function(response) {
                    $('.error').html("Error").show();

                }
            });
        });

        $('#confirmPwd').change(function() {
            var password = $('#pwd').val();
            var cnfrm_password = $('#confirmPwd').val();
            if (password != cnfrm_password) {
                $('.confirm-password-match').hide();
                $('.confirm-password-error').show();
                $('.confirm-password-error').html("Password doesn't match");
                passwordVal = false;
            } else {
                $('.confirm-password-error').hide();
                $('.confirm-password-match').show();
                $('.confirm-password-match').html("Password match");
                passwordVal = true;
            }
        });

        $('#productRequestSubmit').click(function(event) {

            var fname = $('#firstName').val();
            var lname = $('#lastName').val();
            var email = $('#email').val();
            var password = $('#pwd').val();
            var cnfrm_password = $('#confirmPwd').val();
            var contact = $('#contact').val();
            var country = $('#country').val();
            var education = $('#education').val();

            if (fname.length == 0) {
                $('.firstname-error').html("First name is required");
                fnameVal = false;
            } else {
                fnameVal = true;
            }
            if (lname.length == 0) {
                $('.lastname-error').html("Last name is required");
                lnameVal = false;
            } else {
                lnameVal = true;
            }
            if (email.length == 0) {
                $('.email-error').html("Email is required");
                emailVal = false;
            } else {
                emailVal = true;
            }
            if (password.length == 0) {
                $('.password-error').html("Password is required");
                passwordVal = false;
            } else {
                passwordVal = true;
            }
            if (cnfrm_password.length == 0) {
                $('.confirm-password-error').html("Please confirm password");
                passwordVal = false;
            } else {
                passwordVal = true;
            }
            if (contact.length == 0) {
                $('.contact-error').html("Contact is required");
                contactVal = false;
            } else {
                contactVal = true;
            }
            if (country.length == 0) {
                $('.country-error').html("Country is required");
                countryVal = false;
            } else {
                countryVal = true;
            }
            if (education.length == 0) {
                $('.education-error').html("Education is required");
                educationVal = false;
            } else {
                educationVal = true;
            }
            event.preventDefault();

            var validity = fnameVal && lnameVal && emailVal && passwordVal && contactVal &&
                countryVal && educationVal;
            if (!validity) {
                $('.error').html("Please fill the required fields");
                $('.error').show();
                event.preventDefault();
                return;
            } else {
                console.log("Here");
                $('.error').hide();
                $('.firstname-error').html("");
                $('.lastname-error').html("");
                $('.password-error').html("");
                $('.email-error').html("");
                $('.contact-error').html("");
                $('.country-error').html("");
                $('.education-error').html("");
                $('.confirm-password-error').html("H");
                var input = {
                    "fname": fname,
                    "lname": lname,
                    "email": email,
                    "contact": contact,
                    "country": country,
                    "password": password,
                    "education": education,
                    "action": "save_into_db"
                };
                input = JSON.stringify(input);
                $.ajax({
                    url: 'user_request_processor.php',
                    type: 'POST',
                    data: {
                        input: input
                    },
                    success: function(response) {
                        $('.success').html(response).show();
                        $('.error').hide();
                        $('#firstName').html("");
                        $('#lastName').html("");
                        $('#email').html("");
                        $('#pwd').html("");
                        $('#confirmPwd').html("");
                        $('#contact').html("");
                        $('#country').html("");
                        $('#education').html("");
                    },
                    error: function(response) {
                        $('.error').html("Error").show();
                        $('.success').hide();
                    }
                });
            }

        });
    });
    </script>
</body>

</html>