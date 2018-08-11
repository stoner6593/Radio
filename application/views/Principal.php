
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v3.0/admin/apple/page_with_top_menu.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Oct 2017 21:49:24 GMT -->
<head>
	<meta charset="utf-8" />
	<title>Radio TV Corazones</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="<?php echo base_url()?>assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?php echo base_url()?>assets/jquery-ui/jquery-ui.theme.css" rel="stylesheet" />
	<link href="<?php echo base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?php echo base_url()?>assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
	<link href="<?php echo base_url()?>assets/css/animate.min.css" rel="stylesheet" />
	<link href="<?php echo base_url()?>assets/css/style.min.css" rel="stylesheet" />
	<link href="<?php echo base_url()?>assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo base_url()?>assets/css/theme/default.css" rel="stylesheet" id="theme" />
    <link href="<?php echo base_url()?>assets/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url()?>assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />	
	<link href="<?php echo base_url()?>assets/plugins/parsley/src/parsley.css" rel="stylesheet" />
	<link href="<?php echo base_url()?>assets/css/fileinput.min.css" rel="stylesheet" />
	<link href="<?php echo base_url()?>assets/chosen/chosen.min.css" rel="stylesheet" />
	<link href="<?php echo base_url()?>assets/plugins/summernote/summernote.css" rel="stylesheet" />


	<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
	
	<!-- ================== END BASE CSS STYLE ================== -->
	<!--Alertify-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/javascript/alertify/themes/alertify.core.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/javascript/alertify/themes/alertify.default.css" id="toggleCSS" />
    <script src="<?php echo base_url()?>assets/plugins/jquery/jquery-1.9.1.min.js"></script>

	 <script type="text/javascript">
		var base_url="<?php echo base_url();?>";
	</script>
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-without-sidebar page-header-fixed page-with-top-menu">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="<?PHP echo base_url();?>" class="navbar-brand"><!--<span class="navbar-logo"><i class="ion-ios-cloud"></i></span>--> <b>Radio TV Corazones</b> </a>
					<button type="button" class="navbar-toggle" data-click="top-menu-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					
				
					
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<?php
							if(($this->session->userdata('foto')!='')):
								$foto=base_url().'gallery/picture/thumb/'.$this->session->userdata('foto');
								
							else:
								$foto=base_url()."assets/img/user-13.jpg";
							endif;
							
						?>
							<span class="user-image online">								
								<img src="<?php echo $foto; ?>" alt="" />
							</span>
							<span class="hidden-xs"><?php echo $this->session->userdata('usuario');?></span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
						
							<li class="divider"></li>
							<li  onclick="salir()" ><a href="javascript:;" >Log Out</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->
		
		<!-- begin #top-menu -->
		<div id="top-menu" class="top-menu">
            <!-- begin top-menu nav -->
			<ul class="nav">
				<li class="has-sub active">
					<a href="javascript:;">
						<b class="caret pull-right"></b>
						<i class="ion-ios-pulse-strong"></i>
						<span>Dashboard</span>
					</a>
					<ul class="sub-menu">
						<li><a href="index.html">Dashboard v1</a></li>
						<li><a href="index_v2.html">Dashboard v2</a></li>
					</ul>
				</li>				
			
				<?php 
					if(isset($menu)):
						foreach ($menu as  $value): 
							$cod=$value['codMenu']; 	

							$submenu=$this->Menu_model->ver_submenu($cod);
				?>
				<li class="has-sub">
					<a href="<?php echo base_url().$value['link'];?>">
						<?php if($submenu):?>
						<b class="caret pull-right"></b>
						<?php endif;?>	

						<i class="<?php echo $value['imagen'];?>"></i>
						<span><?php echo $value['descripcion'];?></span>
					</a>
					<?php 		if($submenu):?> 
						<ul class="sub-menu">
							<?php foreach ($submenu as $res) :?>
								<li title='<?php echo $res['titulo'];?>'><a href="<?php echo base_url().$res['link'];?>"><?php echo $res['descripcion'];?></a></li>								
							<?php endforeach; ?>														
						</ul>
					<?php endif; ?>	
				</li>
				<?php 
						endforeach;
					endif;
				?>
                <li class="menu-control menu-control-left">
                    <a href="#" data-click="prev-menu"><i class="fa fa-angle-left"></i></a>
                </li>
                <li class="menu-control menu-control-right">
                    <a href="#" data-click="next-menu"><i class="fa fa-angle-right"></i></a>
                </li>
            </ul>
            <!-- end top-menu nav -->
        </div>
		<!-- end #top-menu -->
		
		<!-- begin #content -->
		<div id="content" class="content ">
			<div class="masonry" style="display:none">		
				<!-- begin col-3 -->				
				<div class="grid-item col-md-3 col-sm-6" >
					<div class="widget widget-stats bg-gradient-blue">
						<div class="stats-icon"><i class="ion-ios-world"></i></div>
						<div class="stats-info">
							<h4>VENTAS</h4>
							<p>3,291,922</p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				
				<!-- begin col-3 -->
				<div class="grid-item col-md-3 col-sm-6" >
					<div class="widget widget-stats bg-gradient-aqua">
						<div class="stats-icon"><i class="ion-ios-upload"></i></div>
						<div class="stats-info">
							<h4>COMPRAS</h4>
							<p>20.44%</p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="grid-item col-md-3 col-sm-6">
					<div class="widget widget-stats bg-gradient-purple">
						<div class="stats-icon"><i class="ion-ios-pie"></i></div>
						<div class="stats-info">
							<h4>PRODUCTOS</h4>
							<p>1,291,922</p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="grid-item col-md-3 col-sm-6 ">
					<div class="widget widget-stats bg-gradient-orange">
						<div class="stats-icon"><i class="ion-ios-clock"></i></div>
						<div class="stats-info">
							<h4>CLIENTES</h4>
							<p>00:12:23</p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				
			</div>



			<?php if (isset($contenido)) echo $contenido; ?>
			
          
       
		</div>
		<!-- end #content -->
		
        <!-- begin theme-panel -->
        <div class="theme-panel">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="ion-ios-cog"></i></a>
            <div class="theme-panel-content">
                <h5 class="m-t-0">Color Theme</h5>
                <ul class="theme-list clearfix">
                    <li class="active"><a href="javascript:;" class="bg-blue" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-green" data-theme="green" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Green">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
                </ul>
                <div class="divider"></div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Header Styling</div>
                    <div class="col-md-7">
                        <select name="header-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">inverse</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Header</div>
                    <div class="col-md-7">
                        <select name="header-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Styling</div>
                    <div class="col-md-7">
                        <select name="sidebar-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">grid</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Sidebar</div>
                    <div class="col-md-7">
                        <select name="sidebar-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Gradient</div>
                    <div class="col-md-7">
                        <select name="content-gradient" class="form-control input-sm">
                            <option value="1">disabled</option>
                            <option value="2">enabled</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12">
                        <a href="#" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage"><i class="ion-refresh m-r-3"></i> Reset Local Storage</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->

	
	<!-- ================== BEGIN BASE JS ================== -->
	
	<script src="<?php echo base_url()?>assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?php echo base_url()?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>    
    
    
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php echo base_url()?>assets/js/apps.min.js"></script>
	<script src="<?php echo base_url()?>assets/javascript/funciones.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/bootstrap-sweetalert/sweetalert.min.js"></script>
	<!--<script src="https://unpkg.com/sweetalert2@7.12.15/dist/sweetalert2.all.js"></script>-->
	<!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
	<script src="<?php echo base_url();?>assets/javascript/alertify/lib/alertify.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	<script src="<?php echo base_url()?>assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<!--<script src="<?php echo base_url()?>assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>-->
	<script src="<?php echo base_url()?>assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/table-manage-responsive.demo.min.js"></script>
	

	<!--<link rel="stylesheet" href="<?php echo base_url()?>assets/jquery-ui/jquery-ui.css" />-->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/jquery-ui/demo_table_jui.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/jquery-ui/demo_page.css"/>
	<link href="<?php echo base_url()?>assets/jquery-ui/dataTables.responsive.css" rel="stylesheet" type="text/css">

	<script src="<?php echo base_url()?>assets/plugins/parsley/dist/parsley.js"></script>
	<script src="<?php echo base_url()?>assets/javascript/fileinput.min.js"></script>
	<link href="<?php echo base_url()?>assets/css/jq.css" rel="stylesheet"  />
	<script src="<?php echo base_url();?>assets/javascript/jquery.blockUI.js"></script>	
	<script src="<?php echo base_url();?>assets/chosen/chosen.jquery.min.js"></script>

	<script src="<?php echo base_url();?>assets/javascript/masonry.pkgd.js"></script>
	<script src="<?php echo base_url();?>assets/plugins/summernote/summernote.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/form-summernote.demo.min.js"></script>
	<script>

		$(document).ready(function() {
			App.init();
			
			setTimeout(function(){
    			$(".masonry").css("display","block");
			    $('.masonry').masonry({
				      itemSelector: '.grid-item',
				      columnWidth: '.grid-item',
				      percentPosition: true,
				      gutter: 0,
				});
		      
		    }, 500);
			update_masonry();

		});
		function update_masonry(){
		   
		   $('.masonry').masonry();
		}
	</script>
    <script>
     
	
	function salir(){
		var datos={"datos":'salir'};             
		 $.ajax({
			url:'<?php echo base_url()?>Login/salir',
			type:'get',
			data:datos,
			dataType:'json',
			success:function(rpta){			
				alertify.log(rpta.Respuesta);         
				setTimeout(function(){ window.location='<?php echo base_url()?>'; }, 1000); 
			   
			 
			},
			error:function(rpta){ 
					
			  alertify.error("Ocurrió un error durante el proceso..!");
			  console.log(rpta);                  
			}

		});
	}    
  </script>


</body>


</html>
<!--<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">-->

<style type="text/css">

.grid-item:hover {
  cursor: pointer;
  -webkit-filter: grayscale(0%) blur(0);
}



.masonry { /* Masonry container */
    
}
.grid-item {
    /*display: inline-block;*/
    background: #fff;
    padding: 1em;
    margin: 0 0 1.5em;
   /*width: 100%;
	-webkit-transition:1s ease all;*/
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-shadow: 2px 2px 4px 0 #ccc;
}


@media only screen and (max-width: 320px) {
    .masonry {
        -moz-column-count: 1;
        -webkit-column-count: 1;
        column-count: 1;
    }
    .grid-item {
	    width: 100%;
	}
}

@media only screen and (min-width: 321px) and (max-width: 768px){
    .masonry {
        -moz-column-count: 2;
        -webkit-column-count: 2;
        column-count: 2;
    }
     .grid-item {
	    width: 100%;
	}
}
@media only screen and (min-width: 769px) and (max-width: 1200px){
    .masonry {
        -moz-column-count: 3;
        -webkit-column-count: 3;
        column-count: 3;
    }
     .grid-item {
	    width: 100%;
	}
}
@media only screen and (min-width: 1201px) {
    .masonry {
        -moz-column-count: 4;
        -webkit-column-count: 4;
        column-count: 4;
    }

}
</style>