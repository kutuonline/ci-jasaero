<?php
    defined ('BASEPATH') OR exit ('No direct script access allowed');
?>

<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Reset Password | PT. JAS Aero Engineering</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/linearicons/style.css'); ?>">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/demo.css'); ?>">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/img/favicon.png'); ?>">
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">

                <div class="auth-box ">
                    <div class="left">
                        <div class="content">
                            <div class="header">
                                <div class="logo text-center"><img src="<?php echo base_url('assets/img/logo-jasaero.png'); ?>" alt="logo JAS Aero"></div>
                                <p class="lead">Reset password </p>
                            </div>
                            <form class="form-auth-small" action="#" method="post">
                                <h5>Hello <span><?php echo $name; ?></span>, please type your new password.</h5>   
                                
                                <?php echo form_open('forgotpass/reset_password/token/'.$token); ?>  
                                <p>   
                                    <input type="password" name="password" class="form-control" placeholder="Your new password" value="<?php echo set_value('pass_encrypt'); ?>" required> 
                                </p>   
                                <p> <?php echo form_error('password'); ?> </p>   
   
                                <p>   
                                    <input type="password" name="passconf" class="form-control" placeholder="Confirm your password" value="<?php echo set_value('pass_encrypt'); ?>" required>   
                                </p>   
                                <p> <?php echo form_error('passconf'); ?> </p>   
                                
                                <p>   
                                    <button type="submit" class="btn btn-info btn-lg btn-block" name="btnSubmit" value="Reset">RESET</button> 
                                </p>  

                                <div class="form-group clearfix">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="right">
                        <div class="overlay"></div>
                        <div class="content text">
                            <h1 class="heading">JAS Aero Engineering</h1>
                            <p>by CAS Destination</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
</body>
</html>

