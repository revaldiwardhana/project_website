<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ghozali Trans - Sewa Carter Kendaraan Bus </title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="<?=base_url()?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img style="width:300px" class="align-content" src="<?=base_url()?>assets/images/bus.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form method="post" action="<?=base_url('login')?>">
                        <input type="hidden" name="goto_url" id="goto_url" value="<?= null != $this->session->flashdata('goto_url') ? $this->session->flashdata('goto_url') : '' ?>">
                        <div class="form-group">
                            <label>Username</label>
                            <input id="username" name="username" autofocus type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Belum punya akun ? <a href="<?=base_url('register')?>"> Daftar disini.</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="<?=base_url()?>assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="<?=base_url()?>assets/js/popper.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins.js"></script>
    <script src="<?=base_url()?>assets/js/main.js"></script>


</body>
</html>
