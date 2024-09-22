<<<<<<< HEAD
=======

>>>>>>> a9f8fd371ca751c2682a437ab4c643c6a47e2560
<?php
include("dashmin_panel\php\query.php");
// include("php\query.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="images/logo.png" type="image/gif" sizes="16x16">
    <title>Decor Vista - Interior Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Archi is best selling interior design website template with responsive stunning design">
    <meta name="keywords" content="architecture,building,business,bootstrap,creative,exterior design,furniture design,gallery,garden design,house,interior design,landscape design,multipurpose,onepage,portfolio,studio">
    <meta name="author" content="">

    <!-- CSS Files
    ================================================== -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap" />
    <link href="css/plugins.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/color.css" rel="stylesheet" type="text/css">

    <!-- custom background -->
    <link rel="stylesheet" href="css/bg.css" type="text/css">

    <!-- color scheme -->
	<link rel="stylesheet" href="css/colors/yellow.css" type="text/css" id="colors">
    
    <!-- revolution slider -->
    <link rel="stylesheet" href="rs-plugin/css/settings.css" type="text/css">
    <link rel="stylesheet" href="css/rev-settings.css" type="text/css">
</head>

<body id="homepage">

    <div id="wrapper">

        <!-- header begin -->
        <header class="header-custom">
            
			<div class="container">
                <div class="row align-items-center">
					
					<div class="col-lg-3 col-md-12">
                        <!-- logo begin -->
                        <div id="logo">
                            <a href="index.php">
                                <img class="logo" src="images/logo.svg"  alt="">
                            </a>
                        </div>
                        <!-- logo close -->
						
						<!-- small button begin -->
						<span id="menu-btn"></span>
						<!-- small button close -->
					</div>
					
					<div class="col-lg-9 sm-hide">
						<div class="row">
							
							<!-- <div class="col-md-3">
                                        <div class="info-box s2">
                                            <i class="icon_clock_alt"></i>
                                            <div class="info-box_text">
                                                <div class="info-box_title"><span class="id-color">Monday - Friday</span></div>
                                                <div class="info-box_subtite">09:00 - 18:00</div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="col-md-4">
                                        <div class="info-box s2">
                                            <i class="icon_mail_alt"></i>
                                            <div class="info-box_text">
                                                <div class="info-box_title"><span class="id-color">Email Us</span></div>
                                                <div class="info-box_subtite">info@decorvista.com</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="info-box s2">
                                            <i class="icon_headphones"></i>
                                            <div class="info-box_text">
                                                <div class="info-box_title"><span class="id-color">Call Us</span></div>
                                                <div class="info-box_subtite">+923 023 929649</div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <span class="md-flex-col col-extra">
                                            <a href="renovation-form.html" class="btn-on-header btn-line">Get Quote</a>
                                        </span>
                                    </div>
							
						</div>
					</div>
					
				</div>
			</div>

			<div class="menu-group">
				<div class="container">
					<div class="row">
						
						<div class="col-lg-12">
							
							<!-- mainmenu begin -->
							<nav class="md-flex">
									<ul id="mainmenu">
										<li><a href="index.php">Home<span></span></a>
										</li>
										<li><a href="about.php">About Us</a>
										</li>
										<li><a href="project.php">Gallery</a>
											
										</li>
										<li><a href="services.php">Services</a>
										</li>
										<li><a href="blog.php">Blog</a>
										<li><a href="shop.php">Shop</a>
										</li>
										<li><a href="contact.php">Contact</a>
										</li>
                                        <?php
                                            if (isset($_SESSION['user_id']) && $_SESSION['designerId'] == 3) {
                                            ?>
                                                <li><a href="user.php">Dashboard</a></li>
                                            <?php
                                            }
                                        ?>
                                         <?php
                                            // if (isset($_SESSION['designerId']) && $_SESSION['designerId'] == 2) {
                                            
                                                // <!-- <li><a href="#">Dashboard</a></li> -->
                                           
                                            // }
                                           
                                        ?>
										<!-- <a href="login.php"><button style="background-color:#FAB702; border:none; color:white; border-radius:10px; font-size:20px;padding:10px 20px; line-height:10px; display:inline; margin-top:-10px;">login</button></a>
										<a href="signup.php"><button style="background-color:#FAB702; border:none; color:white; border-radius:10px; font-size:20px;padding:10px 20px; line-height:10px; display:inline;">register</button></a> -->
                                        <!-- <span class="md-flex-col col-extra">
                                            <a href="renovation-form.html" class="btn-on-header btn-line">Get Quote</a>
                                        </span> -->
                                       
                                        <li><a href="login.php"><span style="font-size:">Login</span></a>
										</li>
									
									</ul>
							
								</nav>

							
							<!-- mainmenu close -->
							
						</div>
 
						
					</div>
				</div>
			</div>
			
        </header>
        <!-- header close -->