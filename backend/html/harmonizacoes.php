<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://kit.fontawesome.com/1149ead1c1.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Mother Wine - Painel de Gestão</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- DataTable CSS-->	
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- Modal CSS-->
    <link href="css/style_modal.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="profile.php">
                        <!-- Logo icon image, you can use font-icon also --><b>
                            <!--This is dark logo icon--><img src="../plugins/images/admin-logo.png" alt="home"
                                class="dark-logo" />
                            <!--This is light logo icon--><img src="../plugins/images/admin-logo-dark.png" alt="home"
                                class="light-logo" />
                        </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                            <!--This is dark logo text--><img src="../plugins/images/admin-text.png" alt="home"
                                class="dark-logo" />
                            <!--This is light logo text--><img src="../plugins/images/admin-text-dark.png" alt="home"
                                class="light-logo" />
                        </span> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg"
                            href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                    </li>
                    <?php 
                        session_start();
                        echo'
                    <li>
                        <a class="profile-pic" href="profile.php"> <img src="../plugins/images/users/common_user.png" alt="user-img"
                        width="36" class="img-circle">
                        <input type="hidden" id="sessionid_" value='.$_SESSION['id'].'>
                        <b class="hidden-xs">Olá, '.$_SESSION['name'].'</b></a>
                    </li>';
                    ?>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span
                            class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="profile.php" class="waves-effect"><i class="fa fa-user fa-fw2"
                                aria-hidden="true"></i>Perfil</a>
                    </li>
                    <li>
                        <a href="receitas.php" class="waves-effect"><i class="fas fa-utensils fa-fw2"
                                aria-hidden="true"></i>Receitas</a>
                    </li>
                    <li>
                        <a href="vinhos.php" class="waves-effect"><i class="fas fa-wine-bottle fa-fw2"
                                aria-hidden="true"></i>Vinhos</a>
                    </li>
                    <li>
                        <a href="harmonizacoes.php" class="waves-effect"><i class="fas fa-handshake fa-fw2"
                                aria-hidden="true"></i>Harmonizações</a>
                    </li>
                    <li>
                        <hr>
                        <a href="Login_V3/logout_bo.php" class="waves-effect"><i class="fas fa-sign-out-alt fa-fw2"
                                aria-hidden="true"></i>Sair</a>
                    </li>
                </ul>
                
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Gestão de Harmonizações</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                
                        <ol class="breadcrumb">
                            <li>Painel de Gestão</li>
                            <li class="active">Harmonizações</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="col-md-12 col-xs-12">
                    <div class="white-box">
                        <form class="form-horizontal form-material">
                            <div class="form-group">
                                <label class="col-md-12">Receita</label>
                                <div class="col-md-6">
                                <select name="recipe" id="recipe" style="width:100%;" required>
                                            <option value="0">Escolha uma receita</option>   
                                            <?php include 'get_select_options_recipe.php'; ?>
                                    </select>                                     
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-12">Vinho</label>
                                <div class="col-md-6">
                                <select name="wine" id="wine" style="width:100%;" required>
                                            <option value="0">Escolha um vinho</option>   
                                            <?php include 'get_select_options_wine.php'; ?>
                                    </select>                                     
                                </div>
                            </div>
                            
                                                     
                            
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" id="regHarm" onclick='sendData()'>Registar Harmonização</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>              
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="table-responsive">
                                <table id="pairings" class="display" style="width:100%">
                                        <thead>
                                            <tr><th class="pairing_id">ID</th>
                                                <th>Nome da Receita</th> 
                                                <th>Nome do Vinho</th> 
                                                <th>Acção</th>                                                                                               
                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                            <?php include 'harmonizacoes2.php'?>                                                                                                                                    
                                        </tbody>
                                        <tfoot>
                                           
                                        </tfoot>
                                    </table>                                                                                                 
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy; Motherwine.pt</footer>
            <div id="myModal3" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header">
                            		
                            <h4 class="modal-title">Harmonização eliminada com sucesso!</h4>	
                        </div>
                        
                        <div class="modal-footer">
                            <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>      
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTable JavaScript -->
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <!-- Receitas.jS -->
    <script type="text/javascript" src="harmonizacoes.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script>
	function sendData(){
      var select = document.getElementById('recipe');     
      var recipe = select[select.selectedIndex].value;      
      var select2 = document.getElementById('wine');
      var wine = select2[select2.selectedIndex].value;   
      var op = 2;         
      var xmlHttp = new XMLHttpRequest();

        var url = "harmonizacoes2.php?op="+op+"&recipe="+recipe+"&wine="+wine;

        xmlHttp.open("GET", url, true);

        xmlHttp.send();
        

        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)

        {
            var result = xmlHttp.responseText;

            loadlist();

        }

	}
	function loadList(){
		if (window.XMLHttpRequest) {
	        // code for IE7+, Firefox, Chrome, Opera, Safari
	        xmlhttp2 = new XMLHttpRequest();
	    } else {
	        // code for IE6, IE5
	        xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
	    }
	    xmlhttp2.onreadystatechange = function() {
	        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
	        	var info = JSON.parse(xmlhttp2.responseText)
	            document.getElementById('tab').innerHTML = info['msg'];
	        }
	    };
	    xmlhttp2.open("GET","harmonizacoes2.php?op=1",true);
	    xmlhttp2.send();
	}
	function remPairing(id){
		if (window.XMLHttpRequest) {
	        // code for IE7+, Firefox, Chrome, Opera, Safari
	        xmlhttp3 = new XMLHttpRequest();
	    } else {
	        // code for IE6, IE5
	        xmlhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
	    }
	    xmlhttp3.onreadystatechange = function() {
	        if (xmlhttp3.readyState == 4 && xmlhttp3.status == 200) {
	        	var info = JSON.parse(xmlhttp3.responseText)
	            if(parseInt(info['val']) == 1){
	              	alert(info['msg']);
	              	loadList()
	          	}else{
	              	alert(info['msg']);
	          	}
	        }
	    };
	    xmlhttp3.open("GET","harmonizacoes2.php?op=3&id="+id,true);
	    xmlhttp3.send();
	}
	document.addEventListener("DOMContentLoaded", function(event) {
		loadList();
	});
</script>
</body>

</html>