<div class="row">
    <div class="panel panel-info" data-sortable-id="ui-widget-16">
        <div class="panel-heading">
            <div class="panel-heading-btn">

                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <div class="row">
               Slider
                <a href="javascript:;" id="AgregarSlider" class="btn btn-success btn-xs m-r-5"  data-placement="right" title="Agregar Nuevo Slider" ><i class="fa fa-plus"></i> Nuevo Slider</a>           
            </div>    
        </div>
        <div class="panel-body">
	      
            <div class="row  ">                          
                <fieldset >
                    <legend><strong>Estado:</strong>                                                    
                        
                        <select id="estado2" class="form-control">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>                        
                    </legend> 

                    <div class="row">
                    	<table id="example" class="display " cellspacing="0" width="100%"></table>            
                    </div>                      	
                </fieldset>
            </div>
        </div>
    </div>
</div>


 <!-- Launch Modal -->       
<!-- Modal Contents -->
<!--<div id="DemoModal2" class="modal fade " role="dialog" style="overflow-y: scroll;">--> <!-- class modal and fade -->
<div id="DemoModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">    
  
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
            <div class="modal-header"> <!-- modal header -->
            <button type="button" class="close" 
            data-dismiss="modal" aria-hidden="true">×</button>

                <h4 class="modal-title">Publicar Slider</h4>
            </div>
         
            <div class="modal-body" id="data_slider"> <!-- modal body -->
                 <form class="form-horizontal " data-parsley-validate="true" enctype="multipart/form-data" name="frm_slider"  id="frm_slider" method="post" role="form">
			        <fieldset><legend>Slider:</legend>
			            <div class="col-md-6">
			                <div class="row">
			                    <div class="col-sm-4">
			                        <label  for="despequenia">Des. Peque&ntilde;a:</label>                        
			                    </div>
			                    <div class="col-md-8 form-group">
			                      
			                        <textarea tabindex="1" data-type="alphanum"  data-parsley-maxlength="[50]"  autocomplete="off" class="form-control input-sm" id="despequenia"  placeholder="Des. Pequeña"  name="despequenia" maxlength="200" rows="5"></textarea>
			                        <input align="right"  autocomplete="off"  name="idslider" type="hidden" id="idslider">
			                       
			                    </div> 
			                </div>
			                <div class="row">
			                    <?=form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash())?>      
			                    <div class="col-sm-4">
			                        <label  for="descripcion">Descripci&oacute;n General: <strong class="text-danger">*</strong></label>
			                    </div>
			                    <div class="col-md-8 form-group">                     

			                       <textarea tabindex="2" data-type="alphanum" data-parsley-minlength="[3]" data-parsley-maxlength="[100]" required  autocomplete="off" class="form-control input-sm" id="descripcion"  placeholder="Descripción"  name="descripcion" maxlength="200" rows="10"></textarea>
			                    </div>                                  
			                </div>
			                <div class="row">
		                		<div class="col-sm-2">
	                                <label for="estado">Estado:</label>
	                            </div>
	                            <div class="col-md-3">
	                                <div class="">
	                                    <input type="checkbox" id="estado" name="estado" value="" checked="checked" value="1">
	                                    <label for="estado"></label>
	                                </div>
	                            </div>   
			                </div>
			            </div>
			         
			            <div class="col-md-6"><br>
			                <fieldset><legend>Foto</legend>
			                    <input id="src2"  name="src2" type="file" class="file-loading" data-show-upload="false"  data-show-caption="false">
			                    <!--<input id="src3" name="src3" type="file"    class="file-loading" data-show-upload="false"  data-show-caption="false">-->
			                        
			                </fieldset>
			            </div>   
			        </fieldset>		       
			      
			        <div class="row ">
			            <center>
			                <br>
			                <button type="submit" id="guardaslider" class="btn btn-info" >
			                <i id="lienvia" class="fa fa-save"></i> Guardar</button>
			                <button type="reset" data-dismiss="modal" class="btn btn-danger" >
			                <i class="fa  fa-times"></i> Cerrar</button><br>
			            </center>   
			        </div>
			    </form>
            </div>
     
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Not Now!</button>
                <button type="button" class="btn btn-primary">Download</button>
            </div>-->
                
         </div> <!-- / .modal-content -->
      
    </div> <!-- / .modal-dialog -->          
</div><!-- / .modal -->



<script type="text/javascript">
	$(function(){
	 	var table,proceso=0,Estado; //proceso 0=Guardar 1=Modificar 2=abre desde otra ventana
	 	$("#AgregarSlider").tooltip();       
        

       

        Estado=$("#estado2").val();

         table = $('#example').DataTable( {
            responsive: true,
            "bProcessing" : true,
            //serverSide: true,    
            "bScrollInfinite": true,
            "bScrollCollapse": true,                     
            "BAutoWidth"  : true,
            "bJQueryUI"   : true,     
            "paging": true,            
            "bDestroy": true,
            "bDeferRender": true,
            "sAjaxSource"   : "<?php echo base_url();?>Slider/Listar_slider/"+Estado ,
            "aaSorting": [[ 0, 'asc' ]],
            "aoColumns": [
              
              { "sTitle": "ID"},
              { "sTitle": "Des. Pequeña"},
              { "sTitle": "Descripción" },
              { "sTitle": "Publicado" },              
              { "sTitle": "Opción","sWidth": "70px" , "sClass": "center"},
              { "sTitle": "Publicado","sWidth": "70px" , "sClass": "center"}
              ]
              ,
            "columnDefs": [
                {
                    "targets": [ 3 ],
                    "visible": false,
                    "searchable": false
                }
            ]
        });
        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');

        $('#AgregarSlider').on('click',function(e){
        	
        	e.preventDefault();
          
            $.unblockUI();
            $('#frm_slider')[0].reset();
            $('#frm_slider').parsley().reset();        
            $("#DemoModal2").modal('show');
            $.unblockUI(); 
       
        })

        $("#estado2").on('change',function(e){
            e.preventDefault();
            Estado=$("#estado2").val();            
            table.ajax.url("<?php echo base_url();?>Slider/Listar_slider/"+Estado ).load();

        });
        //$("#publicar_slider").on('click',function(e){
        $('#example tbody ').on('click','#publicar_slider',function(e){	
            e.preventDefault();
            var dato=$(this).attr('data-id-slider1'),url1="<?php echo base_url();?>Slider/Cambiar_estadoslider/"+dato+"/"+1 ;
            $.get(url1 , function(data, status){
		        //console.log("Data: " + data + "\nStatus: " + status);
		        //console.log(dato);
		    });
            Estado=$("#estado2").val();            
            table.ajax.url("<?php echo base_url();?>Slider/Listar_slider/"+Estado ).load();

        });

         $('#example tbody ').on('click','#pendiente_slider',function(e){	
            e.preventDefault();
            var dato=$(this).attr('data-id-slider1'),url1="<?php echo base_url();?>Slider/Cambiar_estadoslider/"+dato+"/"+0 ;
            $.get(url1, function(data, status){
		        //console.log("Data: " + data + "\nStatus: " + status);
		        //console.log(url1);
		    });
            Estado=$("#estado2").val();            
            table.ajax.url("<?php echo base_url();?>Slider/Listar_slider/"+Estado ).load();

        });


        $('#example tbody ').on('click','#modifica_slider',function(e){

            e.preventDefault();
            proceso=1;
           var cod=$(this).attr('data-id-slider');        
            $.ajax({
                url:"<?php echo base_url()?>Slider/CargaSlider",
                type:"post",
                data:{"idslider":cod,"token":"<?php echo $this->security->get_csrf_hash();?>"},   
                //dataType: 'json',
                beforeSend:function(){
                   Esperar();
                },
                success:function(data){                 
                    $.unblockUI();
                    data = eval("("+data+")");  
                   
                    if(typeof data.success1 != "undefined"){                     
                        if(data.errors==0){  

                            //$("#data_tipoprecio").html(data.success2);
                            $("#DemoModal2").modal('show'); 
                            $("#idslider").val(data.success1.idslider);
                            $("#despequenia").val(data.success1.despequenia);
                            $("#descripcion").val(data.success1.des_grande);
                            if(data.success1.estado==1){
                                $("#estado").attr('checked','checked');
                                $("#estado").val(1)
                            }else{
                                $("#estado").removeAttr('checked','checked');
                                $("#estado").val(1);
                            } 
                            $("#src2").fileinput({
		                         initialPreview: [
		                            '<img src="<?php echo base_url()?>assets/images/subir_foto.PNG" id="carga_foto" class="file-preview-image">'
		                            
		                        ],
		                        overwriteInitial: true,
		                        maxFileCount: 1,
		                        allowedFileExtensions: ["jpg", "gif", "png", "jpeg"],
		                        showCaption: false,
		                        showRemove: false,
		                        showUpload: false
		                    });
		                    var ff='';
		                    if(data.success1.foto=='' || data.success1.foto==null){
		                        ff="<?php echo base_url()?>assets/images/subir_foto.PNG";
		                    }else{
		                        ff="<?php echo base_url();?>gallery/picture/slider/"+data.success1.foto;
		                    }
                   			$("#frm_slider").find('img').attr('src',ff);  
                   			
                        }else{
                            swal("Error", "Whoops! Ocurrió un error durante el proceso..!", "error");               
                            $.unblockUI();
                            console.log(data);  
                        }
                    }else{
                        swal("Error", "Whoops! Ocurrió un error durante el proceso..!", "error");               
                        $.unblockUI();
                        console.log(data);  
                    }
                    
                   

                 },
                 error:function(data){
                    swal("Error", "Whoops! Ocurrió un error durante el proceso..!", "error");               
                    $.unblockUI();
                             
                      
                 }


            }); 
        
        }) 

  	

  	  $("body").on("submit","#frm_slider",function(e){
            e.preventDefault();
            
            //var url1=$("#frm_slider").attr('action');           
            var url1="";
            if(proceso==0){
                url1="<?php echo  base_url()?>Slider/GuardarSlider";    
            }else{
                url1="<?php echo  base_url()?>Slider/ModificarSlider";
            }

            var formData = new FormData($('#frm_slider')[0]);
            $.ajax({
                type: 'post',
                url: url1,
                data: formData ,// $("#formpersonal").serialize(),
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,             
                beforeSend: function(){
                    $("#lienvia").removeClass('fa fa-save');
                    $("#lienvia").addClass('fa fa-spinner fa-spin');
                    $("#guardacliente").attr('disabled','disabled');                   
                    
                },
                success:function(data) {                
                                
                    data = eval("("+data+")");                      
                    
                    if(typeof data.success != "undefined"){                     
                        if(data.errors==0){                             
                            $("#lienvia").removeClass();
                            $("#lienvia").addClass('fa fa-save');
                            $('#frm_slider').find('button[type=submit]').removeAttr('disabled');                            
                            swal("Slider.!", data.success, "success");                            
                            $('#frm_slider')[0].reset();
                            $("#res").html('');
                            $("#res").removeClass('text-success'); 
                            $("#DemoModal2").modal('hide'); 
                            setTimeout( function () { table.ajax.reload(); }, 1000 );                   
                            
                        }else{
                            if(typeof data.errors != "undefined"){
                                if(data.success==0){
                                    $("#lienvia").removeClass();
                                    $("#lienvia").addClass('fa fa-save');
                                    $('#frm_slider').find('button[type=submit]').removeAttr('disabled');  
                                    var error_string = '';
                                    for(key in data.errors){
                                        error_string += data.errors[key]+"<br/>"
                                    }
                                    //alertify.alert( error_string );
                                    alertify.error( error_string );
                                }
                            }
                        }
                    }else{
                        alertify.error('Whoops! Ocurrió un error durante el proceso..!');
                        console.log(data);
                    }
                },
                error:function(data){
                    alertify.error('Whoops! Ocurrió un error durante el proceso..!.');
                    console.log(data);
                   
                }
            }); 
                    
            
         });

  	  	 $("#src2").fileinput({
            initialPreview: [
                '<img src="<?php echo base_url()?>assets/images/subir_foto.PNG" id="carga_foto" class="file-preview-image">'
                
            ],    
            maxFileCount: 1,
            showRemove: false,
            allowedFileExtensions: ["jpg", "gif", "png", "jpeg"]
        });	



	})
</script>