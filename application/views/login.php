<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v3.0/admin/apple/login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Oct 2017 21:49:27 GMT -->
<head>
	<meta charset="utf-8" />
	<title>Radio TV Corazones</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="<?php echo base_url();?>assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets/css/animate.min.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets/css/style.min.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	<!--Alertify-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/javascript/alertify/themes/alertify.core.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/javascript/alertify/themes/alertify.default.css" id="toggleCSS" />
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo base_url();?>assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
    <script type="text/javascript">
		var base_url="<?php echo base_url();?>";
	</script>
</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<div class="login-cover">
	    <div class="login-cover-image"><img src="<?php echo base_url();?>radio/images/fondo_radio.jpg" data-id="login-cover-image" alt="" /></div>
	    <div class="login-cover-bg"></div> <!--Le da un toquede difumidano-->
	</div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated fadeIn">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                   <img src="<?php echo base_url();?>radio/images/LOGO-CORAZONES.png" alt="logo" width="45" height="30" class="alignnone size-full wp-image-2190"> Radio TV Corazones
                    <small></small>
                </div>
                <div class="icon">
                    <i class="ion-ios-locked"></i>
                </div>
            </div>
            <!-- end brand -->
            <div class="login-content">
                <form action="<?php echo base_url()?>login/verifica" method="POST" id="formulario" data-parsley-validate="true" name="formulario" class="margin-bottom-0"> 
                    <div class="form-group m-b-20">
                        <?=form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash())?> 
                        <input type="text" class="form-control input-md" minlength="8" maxlength="50" placeholder="Usuario" name="usuario" id="usuario" data-parsley-required="true" data-parsley-type="alphanum" />
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" class="form-control input-md" minlength="8" maxlength="50" placeholder="Contraseña" name="clave" id="clave" data-parsley-required="true"  data-parsley-type="alphanum"/>
                    </div>
                                  
                    <div class="login-buttons">
                        <!--<button type="submit" class="btn btn-primary btn-block btn-md" id="envia" name="envia">INGRESAR</button>-->
                        <input type="submit" class="btn btn-primary btn-block btn-md" id="envia" name="envia" value="INGRESAR">
                    </div>
                    <div class="m-t-20">
                       <div class="alerta1 alert alert-danger alert-dark" style="display:none;" >
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Whooops...!</strong> Su Usuario fue bloqueado por intentos fallidos, intente en un minuto por favor..!
                        </div>
                        <div class="alerta2 alert alert-danger alert-dark" style="display:none;" >
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    Por nuestra seguridad su IP: <strong><?php echo $this->input->ip_address();?></strong>
                                    fue registrada en nuestra Base de Datos	
                        </div>
                    </div>
                </form>                
            </div>
        </div>
        <!-- end login -->
        
        <ul class="login-bg-list clearfix">
            <li class="active"><a href="#" data-click="change-bg"><img src="<?php echo base_url();?>assets/img/login-bg/bg-1.jpg" alt="" /></a></li>
            <li><a href="#" data-click="change-bg"><img src="<?php echo base_url();?>assets/img/login-bg/bg-2.jpg" alt="" /></a></li>
            <li><a href="#" data-click="change-bg"><img src="<?php echo base_url();?>assets/img/login-bg/bg-3.jpg" alt="" /></a></li>
            <li><a href="#" data-click="change-bg"><img src="<?php echo base_url();?>assets/img/login-bg/bg-4.jpg" alt="" /></a></li>
            <li><a href="#" data-click="change-bg"><img src="<?php echo base_url();?>assets/img/login-bg/bg-5.jpg" alt="" /></a></li>
            <li><a href="#" data-click="change-bg"><img src="<?php echo base_url();?>assets/img/login-bg/bg-6.jpg" alt="" /></a></li>
        </ul>
        
        <!-- begin theme-panel -->
       
        <!-- end theme-panel -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo base_url();?>assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="<?php echo base_url();?>assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="<?php echo base_url();?>assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?php echo base_url();?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url();?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php echo base_url();?>assets/js/login-v2.demo.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/apps.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/parsley/dist/parsley.js"></script>
    <script src="<?php echo base_url();?>assets/javascript/alertify/lib/alertify.min.js"></script>
    <script src="<?php echo base_url();?>assets/javascript/verifica.js"></script>
    <script src="<?php echo base_url();?>assets/javascript/funciones.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
			LoginV2.init();

		});
	</script>

</body>


</html>
