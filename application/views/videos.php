
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
               V&iacute;deos
                <a href="javascript:;" id="AgregarVideo" class="btn btn-success btn-xs m-r-5"  data-placement="right" title="Agregar Nuevo Video" ><i class="fa fa-plus"></i> Nuevo V&iacute;deos</a>           
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

                <h4 class="modal-title">Publicar V&iacute;deos</h4>
            </div>
         
            <div class="modal-body" id="data_slider"> <!-- modal body -->
                 <form class="form-horizontal " data-parsley-validate="true" enctype="multipart/form-data" name="frm_video"  id="frm_video" method="post" role="form">
			        <fieldset><legend>Slider:</legend>
			            <div class="col-md-12">
			                <div class="row">
			                    <div class="col-sm-2">
			                        <label  for="despequenia">T&iacute;tutlo video:</label>                        
			                    </div>
			                    <div class="col-md-8 form-group">
			                      
			                        <textarea tabindex="1" data-type="alphanum"  data-parsley-maxlength="[50]"  autocomplete="off" class="form-control input-sm" id="despequenia"  placeholder="Título"  name="despequenia" maxlength="50" rows="5"></textarea>
			                        <input align="right"  autocomplete="off"  name="idvideo" type="hidden" id="idvideo">
			                       
			                    </div> 
			                </div>
			                <div class="row">
			                    <?=form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash())?>      
			                    <div class="col-sm-2">
			                        <label  for="descripcion">Descripci&oacute;n General: <strong class="text-danger">*</strong></label>
			                    </div>
			                    <div class="col-md-10 form-group">                     

			                       <textarea tabindex="2" data-type="alphanum" data-parsley-maxlength="[2000]" required  autocomplete="off" class="form-control input-sm" id="descripcion"  placeholder="Descripción"  name="descripcion" maxlength="2000"></textarea>
			                    </div>                                  
			                </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label  for="despequenia">URL V&iacute;deo:</label>                        
                                </div>
                                <div class="col-md-8 form-group">                                  
                                    <textarea tabindex="3" data-type="alphanum"  data-parsley-maxlength="[250]"  autocomplete="off" class="form-control input-sm" id="urlvideo"  placeholder="Pegar URL de Video"  name="urlvideo" maxlength="250" rows="5"></textarea>                                  
                                   
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="estado">Destacado:</label>
                                </div>
                                <div class="col-md-3">
                                    <div class="">
                                        <input type="checkbox" id="destacado" name="destacado" value="" checked="checked" value="1">
                                        <label for="destacado"></label>
                                    </div>
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
	 	$("#AgregarVideo").tooltip();       
        $('#descripcion').summernote({
          height: 150,   //set editable area's height
          codemirror: { // codemirror options
            theme: 'monokai'
          }, toolbar: [
               // ["style", ["style"]],
                ["font", ["bold", "clear"]], // "underline",
                ["fontname", ["fontname"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                //["table", ["table"]],
                //["insert", ["link", "picture", "video"]],
                //["view", ["fullscreen", "codeview", "help"]]
            ]

        });

       

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
            "sAjaxSource"   : "<?php echo base_url();?>Videos/Listar_videos/"+Estado ,
            "aaSorting": [[ 0, 'asc' ]],
            "aoColumns": [
              
              { "sTitle": "ID"},
              { "sTitle": "Des. Corta"},
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

        $('#AgregarVideo').on('click',function(e){
        	
        	e.preventDefault();
          
            $.unblockUI();
            $('#frm_video')[0].reset();
            $('#frm_video').parsley().reset();        
            $("#DemoModal2").modal('show');
            $.unblockUI(); 
       
        })

        $("#estado2").on('change',function(e){
            e.preventDefault();
            Estado=$("#estado2").val();            
            table.ajax.url("<?php echo base_url();?>Videos/Listar_videos/"+Estado ).load();

        });
        //$("#publicar_slider").on('click',function(e){
        $('#example tbody ').on('click','#publicar_video',function(e){	
            e.preventDefault();
            var dato=$(this).attr('data-id-video1'),url1="<?php echo base_url();?>Videos/Cambiar_estadovideo/"+dato+"/"+1 ;
            $.get(url1 , function(data, status){
		       //console.log(data);
		    });
            Estado=$("#estado2").val();            
            table.ajax.url("<?php echo base_url();?>Videos/Listar_videos/"+Estado ).load();

        });

         $('#example tbody ').on('click','#pendiente_video',function(e){	
            e.preventDefault();
            var dato=$(this).attr('data-id-video1'),url1="<?php echo base_url();?>Videos/Cambiar_estadovideo/"+dato+"/"+0 ;
            $.get(url1, function(data, status){
		       //console.log(data);
		    });
            Estado=$("#estado2").val();            
            table.ajax.url("<?php echo base_url();?>Videos/Listar_videos/"+Estado ).load();

        });


        $('#example tbody ').on('click','#modifica_video',function(e){

            e.preventDefault();
            proceso=1;
           var cod=$(this).attr('data-id-video');        
            $.ajax({
                url:"<?php echo base_url()?>Videos/CargaVideo",
                type:"post",
                data:{"idvideo":cod,"token":"<?php echo $this->security->get_csrf_hash();?>"},   
                //dataType: 'json',
                beforeSend:function(){
                   Esperar();
                },
                success:function(data){                 
                    $.unblockUI();
                    data = eval("("+data+")");  
                   
                    if(typeof data.success1 != "undefined"){                     
                        if(data.errors==0){  
                            //console.log(data.success1);
                            //$("#data_tipoprecio").html(data.success2);
                            $("#DemoModal2").modal('show'); 
                            $("#idvideo").val(data.success1.idvideos);
                            $("#despequenia").val(data.success1.des_corta);
                            $("#descripcion").val(data.success1.des_larga);
                            $('#descripcion').summernote('code', data.success1.des_larga);
                            $("#urlvideo").val(data.success1.url_video);
                            if(data.success1.estado==1){
                                $("#estado").attr('checked','checked');
                                $("#estado").val(1)
                            }else{
                                $("#estado").removeAttr('checked','checked');
                                $("#estado").val(1);
                            } 
                            if(data.success1.destacado==1){
                                $("#destacado").attr('checked','checked');
                                $("#destacado").val(1)
                            }else{
                                $("#destacado").removeAttr('checked','checked');
                                $("#destacado").val(1);
                            } 
                            
                   			
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

  	

  	  $("body").on("submit","#frm_video",function(e){
            e.preventDefault();
            
            //var url1=$("#frm_video").attr('action');           
            var url1="";
            if(proceso==0){
                url1="<?php echo  base_url()?>Videos/GuardarVideo";    
            }else{
                url1="<?php echo  base_url()?>Videos/ModificarVideo";
            }

            var formData = new FormData($('#frm_video')[0]);
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
                            $('#frm_video').find('button[type=submit]').removeAttr('disabled');                            
                            swal("Videos.!", data.success, "success");                            
                            $('#frm_video')[0].reset();
                            $("#res").html('');
                            $("#res").removeClass('text-success'); 
                            $("#DemoModal2").modal('hide'); 
                            setTimeout( function () { table.ajax.reload(); }, 1000 );                   
                            
                        }else{
                            if(typeof data.errors != "undefined"){
                                if(data.success==0){
                                    $("#lienvia").removeClass();
                                    $("#lienvia").addClass('fa fa-save');
                                    $('#frm_video').find('button[type=submit]').removeAttr('disabled');  
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