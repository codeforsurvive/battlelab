<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Gretong a Ecommerce Category Flat Bootstarp Responsive Website Template | Home :: w3layouts</title>
        <link href="<?php echo base_url(); ?>assets_admin/css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url(); ?>assets_admin/css/font-awesome.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary JavaScript plugins) -->
        <script type='text/javascript' src="<?php echo base_url(); ?>assets_user/js/jquery-1.11.1.min.js"></script>
        <!-- Custom Theme files -->
        <link href="<?php echo base_url(); ?>assets_user/css/style.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <!--//theme-style-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <link href='<?php echo base_url(); ?>assets_user/http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
        <link href='<?php echo base_url(); ?>assets_user/http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
        <link href="<?php echo base_url(); ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <!-- start menu -->
        <link href="<?php echo base_url(); ?>assets_user/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets_user/js/megamenu.js"></script>
        <script>$(document).ready(function() {
                $(".megamenu").megamenu();
            });</script>
        <script src="<?php echo base_url(); ?>js/accounting.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets_user/js/menu_jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets_user/js/simpleCart.min.js"></script>
    </head>
    <body>
        <script type="text/javascript">
            function doLogin() {
                var e = $("#email").val();
                var p = $("#password").val();

                $.ajax({
                    type: "post",
                    url: "<?php echo base_url(); ?>index.php/login/getLogin",
                    data: {email: e, password: p},
                    success: function(result) {
                        var json = JSON.parse(result);
                        if (json.status) {
                            if (json.role === 'admin') {
                                document.location.href = "<?php echo base_url() ?>index.php/home";
                            } else if (json.role === 'user') {
                                document.location.href = "<?php echo base_url() ?>index.php/ui_home";

                            } else {
                                $("#alertMessage").html(json.message);
                                $("#loginAlert").show();
                            }
                        } else {
                            $("#alertMessage").html(json.message);
                            $("#loginAlert").show();
                        }
                    },
                    error: function(err) {
                        alert(err);
                    }
                });
            }

            function doRegister() {
                var e = $("#email1").val();
                var p = $("#password1").val();
                var t = $("#phone").val();
                var n = $("#name").val();

                $.ajax({
                    type: "post",
                    url: "<?php echo base_url(); ?>index.php/login/simpan",
                    data: {email: e, password: p, nama: n, telp: t},
                    success: function(result) {
                        var json = JSON.parse(result);
                        $("#regAlertMsg").html(json.title);
                        $("#regAlertMessage").html(json.message);
                        $("#regAlert").show();
                    },
                    error: function(err) {
                        alert(err);
                    }
                });

            }

            function doLogout() {
                document.location.href = "<?php echo base_url(); ?>index.php/login/getLogout";
            }
        </script>
        <!-- header_top -->
        <div class="top_bg">
            <div class="container">
                <div class="header_top">
                    <div class="top_left">
                        <h2><span></span> Call us : 032 2352 782</h2>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!-- header -->
        <div class="header_bg">
            <div class="container">
                <div class="header">
                    <div class="head-t">
                        <div class="logo">
                            <img src="<?php echo base_url(); ?>assets_user/images/logoo.png" class="img-responsive" alt="" width="500px" >
                        </div>
                        <!-- start header_right -->
                        <div class="header_right">
                            <div class="rgt-bottom">
                                <div class="col-md-12">
                                    <div class="col-md-12 right">

                                        <?php
                                        if (!$login) {
                                            ?>
                                            <div class="col-md-offset-7">
                                                    <!-- <a class="col-md-3 col-md-offset-7" href="<?php echo $_SERVER['PHP_SELF'] ?>/login"><button class="btn btn-success"><i class="fa fa-sign-in"></i> Login</button></a> -->
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-sign-in"></i> Login</button> 
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#regModal"><i class="fa fa-user-plus"></i> Daftar</button> 
                                            </div>

                                        <?php } else { ?>
                                            <div class="btn-group right col-md-offset-8">
                                                <a class="btn btn-primary" href="#"><i class="fa fa-user fa-fw"></i> <?php echo $userLogin['nama']; ?></a>
                                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                                                    <span class="fa fa-caret-down"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" onclick="doLogout()"><i class="fa fa-sign-out fa-fw"></i> Sign Out</a></li>
                                                </ul>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>

                                    <!-- Modal Login-->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="form-box" role="document">
                                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>login/getLogin" id="loginForm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title header" id="myModalLabel">Sign In</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="alert alert-danger alert-dismissible" role="alert" id="loginAlert" style="display: none">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <strong>Login Failed!</strong> 
                                                            <span id="alertMessage"></span>
                                                        </div>
                                                        <div class="body bg-gray">
                                                            <div class="form-group">
                                                                <input type="email" id="email" name="email" class="form-control" placeholder="Email"  placehol autofocus required/>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" id="password" name="password" class="form-control" placeholder="Password"  placehol required/>
                                                            </div>  
                                                            <?php
                                                            $info = $this->session->flashdata('info');
                                                            if (!empty($info)) {
                                                                echo $info;
                                                            }
                                                            ?>   
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer footer">
                                                        <button type="button" class="btn bg-olive btn-block" onclick="doLogin()">Sign me in</button>  
                                                    </div>
                                                </div>
                                            </form>                                                          
                                        </div>
                                    </div>

                                    <!-- Modal Register -->
                                    <div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="myRegLabel">
                                        <div class="form-box" role="document">
                                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>login/simpan" id="sigupForm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title header" id="myRegLabel">Sign Up</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="alert alert-info alert-dismissible" role="alert" id="regAlert" style="display: none">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <strong id="regAlertMsg"></strong> 
                                                            <span id="regAlertMessage"></span>
                                                        </div>
                                                        <div class="body bg-gray">
                                                            <div class="form-group">
                                                                <input type="nama" id="name" name="nama" class="form-control" placeholder="Nama"  placehol required/>
                                                            </div> 
                                                            <div class="form-group">
                                                                <input type="telp" id="phone" name="telp" class="form-control" placeholder="Telepon"  placehol required/>
                                                            </div> 
                                                            <div class="form-group">
                                                                <input type="email" id="email1" name="email" class="form-control" placeholder="Email"  placehol autofocus required/>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" id="password1" name="password" class="form-control" placeholder="Password"  placehol required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer footer">
                                                        <button type="button" class="btn bg-olive btn-block" onclick="doRegister()">Register</button>  
                                                    </div>
                                                </div>
                                            </form>                                                          
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div style="height: 20px"></div>
                                    </div>
                                    <?php
                                    if (!$this->session->userdata('cart_item')) {
                                        $cart = array();
                                        $this->session->set_userdata('cart_item', $cart);
                                    }
                                    $cart = $this->session->userdata('cart_item');
                                    $cart_item = sizeof($cart);
                                    ?>
                                    <div class="clearfix"></div>
                                    <div class="create_btn col-md-4 col-md-offset-8">
                                        <button class="btn btn-default" data-toggle="modal" data-target="#cartModal"><i class="fa fa-shopping-cart fa-fw fa-2x"></i> <?php echo $cart_item; ?></button>
                                    </div>
                                    <!-- Modal Notif -->
                                    <div class="modal fade" id="notifModal" tabindex="-1" role="dialog" aria-labelledby="myNotifLabel">
                                        <div class="container container-fluid">
                                            <div class="modal-body">
                                                <div class="alert alert-warning alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <strong>Warning!</strong> Better check yourself, you're not looking too good.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Cart -->
                                    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="myRegLabel">
                                        <div class="container container-fluid bg-gray">
                                            <div class="modal-body">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Keranjang Belanja</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <?php $this->load->view('home-user/ui-cart'); ?>
                                                </div>
                                                <div class="modal-footer footer">
                                                    <button type="button" class="btn btn-success" onclick=""><i class="fa fa-thumbs-up fa-fw fa-lg"></i> Check Out</button>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"> </div>
                            </div>
                            <div class="search">
                                <form>
                                    <input type="text" value="" placeholder="search..."id="search">
                                    <input type="submit" value="">
                                </form>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <!-- start header menu -->
                    <?php $this->load->view('menu'); ?>
                </div>
            </div>
        </div>
        <section class="content">
            <?php $this->load->view($content); ?>
        </section><!-- /.content -->
        <div class="footer">
            <div class="container">
                <div class="col-md-3 cust">
                    <h4>CUSTOMER CARE</h4>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="buy.html">How To Buy</a></li>
                    <li><a href="#">Delivery</a></li>
                </div>
                <div class="col-md-2 abt">
                    <h4>ABOUT US</h4>
                    <li><a href="#">Our Stories</a></li>
                    <li><a href="#">Press</a></li>
                    <li><a href="#">Career</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </div>
                <div class="col-md-2 myac">
                    <h4>MY ACCOUNT</h4>
                    <li><a href="register.html">Register</a></li>
                    <li><a href="#">My Cart</a></li>
                    <li><a href="#">Order History</a></li>
                    <li><a href="buy.html">Payment</a></li>
                </div>
                <div class="col-md-5 our-st">
                    <div class="our-left">
                        <h4>OUR STORES</h4>
                    </div>
                    <div class="our-left1">
                        <div class="cr_btn">
                            <a href="#">SOLO</a>
                        </div>
                    </div>
                    <div class="our-left1">
                        <div class="cr_btn1">
                            <a href="#">BOGOR</a>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    <li><i class="add"> </i>Jl. Haji Muhidin, Blok G no.69</li>
                    <li><i class="phone"> </i>025-2839341</li>
                    <li><a href="mailto:info@example.com"><i class="mail"> </i>info@sitename.com </a></li>

                </div>
                <div class="clearfix"> </div>
                <p>Copyrights © 2015 Gretong. All rights reserved | Template by <a href="http://w3layouts.com/">W3layouts</a></p>
            </div>
        </div>
    </body>
</html>