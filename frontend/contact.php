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
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="wines.php">Vinhos</a></li>
                                            <li><a class="active" href="contact.html">Sobre Nós</a></li>
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
                                    
                                        
                                        <a class="login">Bem-vindo '.$_SESSION['name'].'!</a>
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
    
        <!-- bradcam_area_start -->
        <div class="bradcam_area breadcam_bg overlay2">
                <h3>Sobre Nós</h3>
            </div>
            <!-- bradcam_area_end -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
            <div class="single-blog" id="aboutus">
                <p>A plataforma <b>Mother Wine</b> vem dar resposta a uma necessidade sentida por muitos portugueses que na altura de harmonizar comida com vinho, e vice-versa, se vêem perante a ausência de uma ferramenta que os aconselhe de forma rápida e eficaz. A <b>Mother Wine</b> é feita para aqueles momentos em que não sabemos que vinho abrir para combinar com uma carne de porco à Alentejana ou que prato confeccionar para acompanhar o branco da região do Douro que temos lá por casa há meses à espera de ser aberto. O nosso foco são os vinhos portugueses e os pratos tipicamente nacionais, se bem que não estamos desatentos às novas tendências gastronómicas dos portugueses.</p>
                <p><b>Mother Wine</b> tem como pai um açoriano que escolheu a cidade de Évora como sua segunda casa, e surge no âmbito do projecto final do Curso de Especialização Tecnológica - Técnico Especialista em Tecnologias e Programação de Sistemas de Informação, ministrado no Centro de Formação do IEFP - Évora entre 2018 e 2020. </p>
            </div>
    
    
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Fala com a mãe...</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Escreve aqui a tua mensagem...'" placeholder="Escreve aqui a tua mensagem..."></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Como te chamas filho(a)?'" placeholder="Como te chamas filho(a)?">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Aqui metes o teu e-mail...'" placeholder="Aqui metes o teu e-mail...">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Qual é o assunto da mensagem?'" placeholder="Qual é o assunto da mensagem?">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Enviar para a Mãe</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->
    
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
                                <li><a href="contact.html#contactForm">Fala connosco</a></li>
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
                                <input type="text" placeholder="Introduz o teu e-mail">
                                <button type="submit">Subscrever</button>
                            </form>
                            <p class="newsletter_text">Subscreve a nossa newsletter</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        <!-- form itself end-->
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
    
        <!--contact js-->
        <script src="js/contact.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/mail-script.js"></script>
    
        <script src="js/main.js"></script>
    </body>
    
    </html>