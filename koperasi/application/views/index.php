<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/icon.png">

    <title>Login E-Koperasi</title>

    <link href="<?php echo base_url(); ?>assets/css/style2.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet">

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- <!-- BEGIN SIDEBAR TOGGLER BUTTON -->

<div class="container">

     
    <?php echo form_open("auth/cek_login"); ?> 
    <div class="form-signin" action="auth/cek_login" method="post">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">E-Koperasi</h1>
<!--             <h3 class="sign-title">Malang Disaster Location Geographic Information System</h3>
 -->            <img src="<?php echo base_url()?>assets/images/login-logo.png" height="200px" width="200px"alt=""/>
            
        </div>
        <fieldset>
            <div class="login-wrap">
                 <input type="text" class="form-control" placeholder="Username" name="username_admin">
            <div class="clearfix"></div><br>
                <input type="password" class="form-control" placeholder="Password" name="password_admin">   
            <p>
            <button class="btn btn-lg btn-login btn-block" type="submit" style="font-size:24px">
                <i class="fa fa-sign-in"></i> Login
            </button>
            </p>

        </div>
    </fieldset>
    </div>
     <?php echo form_close(); ?> 
</div>

<!-- BEGIN SIDEBAR TOGGLER BUTTON -->


<script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
</body>
<!-- END BODY -->
</html>