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
        <link href="<?php echo base_url(); ?>assets_user/css/bootstrap.css" rel='stylesheet' type='text/css' />
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
        <!-- start menu -->
        <link href="<?php echo base_url(); ?>assets_user/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets_user/js/megamenu.js"></script>
        <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
        <script src="<?php echo base_url(); ?>js/accounting.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets_user/js/menu_jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets_user/js/simpleCart.min.js"> </script>
    </head>
    <body>
        <!-- header_top -->
        <div class="top_bg">
            <div class="container">
                <div class="header_top">
                    <div class="top_right">
                        <ul>
                            <li><h2>AndroShop</h2></li>
                            <a><img src="images/Andro.png" /></a>
                        </ul>
                    </div>
                    <div class="top_left">
                        <h2><span></span> Call us : 032 2352 782</h2>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!-- header -->
        <div class="header_bg">
            <img src="images/Andro.png" />
            <div class="container">
                <div class="header">
                    <div class="head-t">
                        <div class="logo">
                            <a href="index.html"><img src="images/logo.png" class="img-responsive" alt=""/> </a>
                        </div>
                        <!-- start header_right -->
                        <div class="header_right">
                            <div class="rgt-bottom">
                                <div class="col-md-12">
                                    <div class="col-md-12">

                                        <?php
                                        if (!$login) {
                                            ?>
                                            <div class="col-md-3 col-md-offset-9">
                                                <a href="<?php BASE_URL ?>index.php/login"><button class="btn btn-success"><i class="fa fa-sign-in"></i> Login</button></a>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-md-6">
                                                <span><?php echo $userLogin['nama']; ?></span>
                                            </div>
                                            <div class="col-md-3 col-md-offset-3">
                                                <a href="<?php BASE_URL ?>index.php/login/getlogout"><button class="btn btn-danger"><i class="fa fa-sign-out"></i> Sign Out</button></a>
                                            </div>

                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="cart box_1 col-md-3">
                                    <a href="checkout.html">
                                        <h3> <span class="simpleCart_total">$0.00</span> (<span id="simpleCart_quantity" class="simpleCart_quantity">0</span> items)<img src="images/bag.png" alt=""></h3>
                                    </a>	
                                    <p><a href="javascript:;" class="simpleCart_empty">(empty card)</a></p>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="create_btn col-md-3">
                                    <a href="checkout.html">CHECKOUT</a>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="search">
                                <form>
                                    <input type="text" value="" placeholder="search...">
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