<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mother Wine</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/background.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="dist/select2/css/select2.min.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="index.php">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="index.php">Home</a></li>
                                        <li><a href="wines.php">Vinhos</a></li>
                                        <li><a href="contact.php">Sobre Nós</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div> 
                        <?php 
                        session_start();
                        // If the user is not logged in redirect to the login page...
                        if (!isset($_SESSION['loggedin'])) {
                        echo'<div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-center">
                                <a href="#test-form" class="login popup-with-form">
                                    <i class="flaticon-user"></i>
                                    <span>Entrar</span>
                                </a>                                
                            </div>
                        </div>';}
                        else {
                            echo'<div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-center">                              
                                    <a class="login">Olá, '.$_SESSION['name'].'!</a>
                                    <form action="logout.php">
                                    <input type="submit" value="Sair" class="genric-btn primary small">
                                    </form>                    
                            </div>
                        </div>';   
                        } ?>                  
                    </div>                    
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->


    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider align-items-center justify-content-center slider_bg_1 overlay2" style="padding-top:100px">            
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-12">
                        <div class="slider_text text-center">
                            <h3>MOTHER WINE</h3>
                            <p>Comida e vinho? A mãe ajuda!</p>
                            <div>
                            <select name="state" id="search" class="js-example-placeholder-single" style="width:75%;">
                                        <option></option>     
                                        <?php include 'get_select_options_index.php';?>                                                                   
                            </select>                                
                            </div>
                        </div>
                    </div>
                    <!--carrossel-->
                    <div class="container-fluid" style="padding-top:20px">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner row w-100 mx-auto">                                                                         
                                <?php include 'index2.php'; ?>
                          </div>
                          <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                  </a>
                        </div>
                      </div>
                      <!--fim do carrossel-->
            </div>
        </div>
    
 </div>
    <!-- slider_area_end -->

    <!-- footer -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">                    
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                            <p class="footer_text doanar"> <a class="first" href="#">+351 968 525 319
                                </a> <br>
                                <a href="#">geral@motherwine.pt</a></p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-facebook-square"></i>
                                        </a>
                                    </li>
                                  
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                
                            </h3>
                            <ul>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"> </a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Navegação
                            </h3>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="wines.php">Vinhos</a></li>
                                <li><a href="contact.php#contactForm">Fala connosco</a></li>
                                <li><a href="contact.php">Sobre Nós</a></li>
                           </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Newsletter
                            </h3>
                            <form action="#" class="newsletter_form">
                                <input type="text" placeholder="O teu e-mail">
                                <button type="submit">Subscrever</button>
                            </form>
                            <p class="newsletter_text">Subscreve a nossa newsletter</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer -->
    <!-- link that opens popup -->

    <!-- form itself end-->
    <form action="authenticate.php" method="post" id="test-form" class="white-popup-block mfp-hide">
        <div class="popup_box ">
            <div class="popup_inner">
                <div class="logo text-center">
                    <a href="#">
                        <img src="img/form-logo.png" alt="">
                    </a>
                </div>
                <h3>Iniciar sessão</h3>
                <form>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <input type="text" name="username" id="username" placeholder="O teu nome de utilizador">
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="password" name="password" id="password" placeholder="Palavra-passe">
                        </div>
                        <div class="col-xl-12">
                            <input type="submit" value="Entrar" class="boxed_btn_green">
                        </div>
                    </div>
                </form>
                <p class="doen_have_acc">Não está registado? <a class="dont-hav-acc" href="#test-form2">Criar conta</a>
                </p>
            </div>
        </div>
    </form>
    <!-- form itself end -->
<!-- modal_sugg1--> 
<div id="myModal4" class="modal fade" style="z-index: 2000;">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>				
				<h4 class="modal-title">Obrigado filho(a)!</h4>	
			</div>
			<div class="modal-body">
				<p class="text-center">A tua sugestão vai ser analisada pela Congregação das Mães do Vinho!</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
			</div>
		</div>
	</div>
</div>    
<!-- modal_sugg1_end-->  
<!-- modal_sugg2--> 
<div id="myModal5" class="modal fade" style="z-index: 2000;">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">        
			<div class="modal-header">            
				<div class="icon-box">
					<i class="material-icons">&#xf040;</i>
				</div>				
				<h4 class="modal-title">Que receita queres sugerir filho(a)?</h4>	
			</div>		
            <div class="modal-body">
            <div class="col-xl-12">
                <input type="text" style="width: 100%;" placeholder="Nome da receita">
                </div>
			</div>

			<div class="modal-footer">
				<button class="btn btn-success btn-block" data-target="#myModal4" data-dismiss="modal">Submeter</button>
			</div>
		</div>
	</div>
</div>    
<!-- modal_sugg2_end-->   
<!-- form itself start-->
    <form id="test-form2" class="white-popup-block mfp-hide">
        <div class="popup_box ">
            <div class="popup_inner">
                <div class="logo text-center">
                    <a href="#">
                        <img src="img/form-logo.png" alt="">
                    </a>
                </div>
                <h3>Criar conta</h3>
                <form action="#">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <input type="email" placeholder="Introduz o teu e-mail">
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="username" placeholder="Escolhe o teu nome de utilizador">
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="password" placeholder="Palavra-passe">
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="Password" placeholder="Confirma a palavra-passe">
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" class="boxed_btn_green">Criar conta</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
    <!-- form itself end -->


    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>
    <script src="dist//select2/js/select2.min.js"></script>
    <script src="index.js"></script>

    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/main.js"></script>
</body>

</html>