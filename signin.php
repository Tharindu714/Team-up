<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Teamup</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">


    <link rel="icon" href="resources/teamup.png" />


</head>

<body style="background-color: #22C414;">

    <div class="col-12 p-5 main" style="margin-top: 75px;">
        <div class="row">
            <div class="row align-content-center">
                <!-- content -->
                <div class="col-12 p-3">
                    <div class="row">
                        <div class="col-6 d-none d-lg-block background"></div>
                        <div class="col-12 col-lg-6">
                            <div class="row g-2">
                                <div class="col-12">
                                    <h3 class="title2 fw-bold text-light text-uppercase">Sign In to Chat - TeamUp</h3>
                                    <div class="col-12 d-none" id="msgdiv2">
                                        <div class="alert alert-danger" role="alert" id="alertdiv2">
                                            <i class="bi bi-x-octagon-fill fs-5" id="msg2">
                                            </i>
                                        </div>
                                    </div>
                                </div>

                                <?php

                                $email = "";
                                $password = "";

                                if (isset($_COOKIE["email"])) {
                                    $email = $_COOKIE["email"];
                                }

                                if (isset($_COOKIE["password"])) {
                                    $password = $_COOKIE["password"];
                                }

                                ?>

                                <div class="col-12">
                                    <label class="form-label text-light">Email</label>
                                    <input type="email" class="form-control" id="email2"
                                        value="<?php echo $email; ?>" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label text-light">Password</label>
                                    <input type="password" class="form-control" id="password2"
                                        value="<?php echo $password; ?>" />
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberme">
                                        <label class="form-check-label text-light">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-12 d-grid">
                                    <button class="btn btn-outline-success" onclick="emailsignIn();">Join Chat</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- content -->
            </div>
        </div>
    </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>