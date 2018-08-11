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
                Usuarios
                <a href="javascript:;" id="AgregarCliente" class="btn btn-success btn-xs m-r-5"  data-placement="right" title="Agregar Nuevo Usuario" ><i class="fa fa-plus"></i> Nuevo Usuario</a> 
                <a href="javascript:;" id="AgregarNiveles" class="btn btn-success btn-xs m-r-5"  data-placement="right" title="Agregar Niveles de Usuario" ><i class="fa fa-cogs"></i> Agregar Niveles</a>
            </div>    
        </div>
        <div class="panel-body">
            <div class="row ">                          
                <fieldset >
                    <legend><strong>Estado:</strong>                                                    
                        <select id="estado2" class="form-control">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                            
                    </legend>                    
                    <table id="example" class="display " cellspacing="0" width="100%"></table>            
                </fieldset>
            </div>
        </div>
    </div>


    <div id="modal-sizes-2" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info ">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">USUARIOS</h4>
                </div>
                <div class="modal-body" id="data_modi">
                    <div class="row">           
                        <form class="form-horizontal" data-parsley-validate="true" enctype="multipart/form-data" name="frm_usuario"  id="frm_usuario" method="post" role="form">
                            <fieldset>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label  for="medidas">DNI:</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input align="right" autocomplete="off"  required data-parsley-type="digits" tabindex="1" data-parsley-minlength="[8]" name="dni" type="text" class="form-control input-sm" id="dni"  placeholder="DNI" maxlength="8" autofocus>
                                        <input align="right"  autocomplete="off"  name="iduser" type="hidden" id="iduser">
                                        <p id="res"></p>
                                    </div> 
                                </div>
                                <div class="row ">
                                    <?=form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash())?>      
                                    <div class="col-sm-2">
                                        <label  for="descripcion">Nombres:</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" tabindex="2" data-type="alphanum" data-parsley-minlength="[3]" data-parsley-maxlength="[50]" required  autocomplete="off" class="form-control input-sm" id="nombres"
                                       placeholder="Nombres" style="width:100%" name="nombres" maxlength="50">
                                    </div>                                  
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-2">
                                        <label for="apellidos">Apellidos:</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" autocomplete="off" tabindex="3"  data-type="alphanum" data-parsley-minlength="[3]" data-parsley-maxlength="[50]" required  class="form-control input-sm" id="apellidos" 
                                        placeholder="Apellidos" style="width:100%" name="apellidos" maxlength="50">
                                    </div>                                                   
                                </div>
                                <div class="row ">
                                    <div class="col-sm-2">
                                        <label   for="dir">Direcci&oacute;n:</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" style="width:100%" autocomplete="off" data-type="alphanum" data-parsley-minlength="[5]" data-parsley-maxlength="[100]" tabindex="4"  name="direccion" class="form-control input-sm" id="direccion" 
                                        placeholder="Dirección" maxlength="100">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-sm-2">
                                        <label   for="dir">E-mail:</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" style="width:100%" autocomplete="off"  data-parsley-type="email" tabindex="5"  name="mail" class="form-control input-sm" id="mail" placeholder="E-mail" maxlength="80">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-sm-2">
                                        <label for="valor">Tel&eacute;fono:</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="telefono" autocomplete="off" tabindex="6"  name="telefono2" style="width:100%" 
                                        class="form-control input-sm" id="telefono"    placeholder="Telefono" maxlength="10">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="valor">Cel:</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="telefono" autocomplete="off" tabindex="6"  name="celular" style="width:100%" 
                                        class="form-control input-sm" id="celular"    placeholder="Celular" maxlength="9">
                                    </div>  
                                </div>
                                <div class="row ">                                      
                                    <div class="col-sm-2">
                                       <label  for="peso">F. Nac:</label>
                                    </div>
                                    <div class="col-md-4">                                        
                                        <input type="text" name="fecha" id="fecha" value="<?php echo date("d/m/Y"); ?>"  class="form-control" placeholder="Selecione fecha">
                                    </div>
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
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label for="nivel" >Nivel</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select class="form-control selectpicker" required data-size="10" name="nivel" id="nivel" data-live-search="true" data-style="btn-white">
                                            <optgroup label="Niveles">
                                                <?php if($niveles){ 
                                                      foreach ($niveles as $value ) {
                                                 ?>       
                                                    <option value="<?php echo $value['codNivel']; ?>"><?php echo $value['nivel']; ?></option>
                                                <?php         
                                                        }                                                 
                                                    }
                                                ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                    
                                
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label for="usuario">Usuario:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" autocomplete="off" tabindex="12" required name="usuario"  data-parsley-minlength="[8]"  class="form-control input-sm" id="usuario" 
                                            placeholder="Usuario" maxlength="50"><p id="res2"></p>
                                        
                                    </div>
                                </div>
                                <div class="row">   
                                    <div class="col-sm-2">
                                        <label for="clave1">Clave:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="password" autocomplete="off" tabindex="13"   required name="clave"  data-parsley-minlength="[8]"  class="form-control input-sm" id="clave" 
                                            placeholder="Contraseña" maxlength="50">
                                    </div>
                                </div>
                                <div class="row">   
                                    <div class="col-sm-2">
                                        <label for="clave1">Repita Clave:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="password" autocomplete="off" tabindex="14" required data-parsley-equalto="#clave"  data-parsley-minlength="[8]"  name="clave2"  class="form-control input-sm" id="clave2" 
                                            placeholder="Contraseña" maxlength="50">
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-6"><br>
                                <fieldset><legend>Foto</legend>
                                    <input id="src2" name="src2" type="file" class="file-loading" data-show-upload="false"  data-show-caption="false">
                                    <!--<input id="src3" name="src3" type="file"    class="file-loading" data-show-upload="false"  data-show-caption="false">-->
                                        
                                </fieldset>
                            </div>
                            </fieldset>
                            
                            <center>
                                <br>
                                <button type="submit" id="guardacliente" class="btn btn-info" >
                                <i id="lienvia" class="fa fa-save"></i> Guardar</button>
                                <button type="reset" data-dismiss="modal" class="btn btn-danger" >
                                <i class="fa  fa-times"></i> Cerrar</button><br>    
                                             
                            </center>   
                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div> 

    <div id="modal-sizes-3" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info ">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">NIVELES DE USUARIOS</h4>
                </div>
                <div class="modal-body" id="data_nivel">
                   
                </div>
            </div>
        </div>
    </div>                    
</div>
<!--<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/smoothness/jquery-ui.css"  />-->
<!--<link href="<?php echo base_url()?>assets/css/block.css?v3" rel="stylesheet"  />-->

<script type="text/javascript">
    
    $(function(){ 
        //$.blockUI({ message: '<h1><img src="'+ base_url+'assets/images/busy.gif" /> Just a moment...</h1>' });
        //$.blockUI({ css: { backgroundColor: '#f00', color: '#fff' } }); 

         var table,proceso=0,codUsuario=0,Estado; //0=Guardar 1=Modificar 
        $("#AgregarCliente, #AgregarNiveles").tooltip();

        Estado=$("#estado2").val();
        var DEFAULT_Z_INDEX = 10;
        $('#fecha')
            .datepicker()
            .on('show', function() {

                // Make sure that z-index is above any open modal.
                var $input= $(this);
                var modalZIndex = $input.closest('.modal').css('z-index');
                var zIndex = DEFAULT_Z_INDEX;
                if (modalZIndex) {
                    zIndex = parseInt(modalZIndex) + 1;
                }

                $('.datepicker').css("z-index", zIndex);
                
        });

        $("#AgregarCliente").on('click',function(e){
            e.preventDefault();
            proceso=0;
            $("#dni").removeAttr('readonly');
            $('#frm_usuario')[0].reset();
            $('#frm_usuario').parsley().reset();            
            $("#modal-sizes-2").modal('show');
            $("#dni").focus();
        })
       
       $("#AgregarNiveles").on('click',function(e){
            e.preventDefault();
            if(codUsuario!=0){
                var id=$(this).val();
              
                $.ajax({
                  url: base_url+'Niveles/Guarda_Nivelmenu_Usuario',
                  method: 'POST',
                  data: {"codUsuario":codUsuario,"token":"<?php echo $this->security->get_csrf_hash();?>"}, 
                  //dataType:'json'
                  beforeSend: function( ) {
                    Esperar();
                  }
                })
                
                .done(function(data){   
                    $("#data_nivel").html(data);
                    $("#modal-sizes-3").modal('show');
                    $.unblockUI();
                })
                .fail(function(data){
                 swal("Error", "Ocurrió un Error al Procesar Datos", "error");
                 $('#guarda_niveles').find('input[type=submit]').removeAttr('disabled');
                 $.unblockUI();
                 console.log(data);
                 
                })
                
            }else{
                alertify.error("Seleccione un Usuario");
            }

       })

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
            "sAjaxSource"   : "<?php echo base_url();?>Usuarios/Listar_usuarios/"+Estado,
            "aaSorting": [[ 0, 'asc' ]],
            "aoColumns": [
              
              { "sTitle": "ID"},
              { "sTitle": "Nombres y Apellidos"},
              { "sTitle": "DNI" },
              { "sTitle": "Direción" },
              { "sTitle": "Teléfono" },
              { "sTitle": "Correo"},
              { "sTitle": "Opción","sWidth": "70px" , "sClass": "center"}
              ]
        } );
        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');

        /*$('#example tbody').on('click', 'tr', function () {
            var codigo = $('td', this).eq(0).text();
     
            var nombre = $('td', this).eq(1).text();
            alert( 'Código del cliente '+codigo+' '+'Nombre '+nombre);
     
        } );*/
         $('#example tbody').on( 'click', 'tr', function () {
            var codusuario
            if ( $(this).hasClass('bg-blue-lighter') ) {
                $(this).removeClass('bg-blue-lighter'); 
                codUsuario=0;

            }
            else {
                codUsuario = $('td', this).eq(0).text();               
                table.$('tr.bg-blue-lighter').removeClass('bg-blue-lighter');
                $(this).addClass('bg-blue-lighter');

            }
        } );
        $('#example tbody ').on('click','#modifica_usuario',function(e){

            e.preventDefault();
            proceso=1;
            var cod=$(this).attr('data-id-usuario');   
            $.ajax({
                url:"<?php echo base_url()?>Usuarios/BuscarUsuario",
                type:"post",
                data:{"id":cod,"token":"<?php echo $this->security->get_csrf_hash();?>"},   
                dataType: 'json',
                beforeSend:function(){
                    $("input").removeClass('parsley-error');
                    $("input").removeClass('parsley-success');
                    $("ul").removeClass('filled');
                },
                success:function(data){                 
                  
                    var dt=data.datos; 
                    $('#frm_usuario').find('button[type=submit]').removeAttr('disabled');
                    $("#lienvia").removeClass();
                    $("#lienvia").addClass('fa fa-save');  
                    $("#dni").attr('readonly','readonly'); 
                    $("#clave").removeAttr("required");
                    $("#clave2").removeAttr("required");            
                    $("#dni").val(dt.dni);
                    $("#iduser").val(dt.codUsuario);
                    $("#nombres").val(dt.nombres);
                    $("#apellidos").val(dt.apellidos);
                    $("#direccion").val(dt.direccion);
                    $("#mail").val(dt.email);
                    $("#telefono").val(dt.per_telefono);
                    $("#clave").val('');
                    $("#clave2").val('');
                    if(dt.estado==1){
                        $("#estado").attr('checked','checked');
                        $("#estado").val(1)
                    }else{
                        $("#estado").removeAttr('checked','checked');
                        $("#estado").val(1);
                    }
                    console.log(dt.estado);
                    if(data.fecha_nac!=""){
                         $("#fecha").val(data.fecha_nac);
                    }                 
                   $("body #nivel").find('option[value="' + dt.codNivel + '"]').attr("selected", "selected");
                    $("#usuario").val(dt.usuario);                    
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
                    if(dt.foto=='' || dt.foto==null){
                        ff="<?php echo base_url()?>assets/images/subir_foto.PNG";
                    }else{
                        ff="<?php echo base_url();?>gallery/picture/"+dt.foto;
                    }
                    $("#frm_usuario").find('img').attr('src',ff);
                    
                    $("#modal-sizes-2").modal('show');
                 },
                 error:function(data){
                    swal("Error", "Whoops! Ocurrió un error durante el proceso..!", "error");               
                   
                                   
                      
                 }


            }); 
        
        })
        //Busca usuario por DNI
        $("#dni").on('keyup',function(e){
            var dni=$(this).val();            
            if(dni.length==8){
                $("#res").removeClass('text-danger');
                $("#res").html('<img src="<?php echo base_url()?>assets/images/load.gif">');
                $.ajax({
                    url:"<?php echo base_url()?>Usuarios/BuscaUsuarioDni",
                    type:"post",
                    data:{"dni":dni,"token":"<?php echo $this->security->get_csrf_hash();?>"},  
                    dataType: 'json',
                    success:function(data){
                        if(data.respuesta=='ok'){
                            $("#res").html('');
                            $("#res").removeClass('text-danger').addClass('text-success');
                            $("#res").html('<img src="<?php echo base_url()?>assets/images/accept.png"> '+data.msg);
                             $("#guardacliente").removeAttr("disabled");
                            $("#nombres").focus();  
                                
                        }else{
                            if(data.respuesta=='fail'){
                                $("#res").removeClass('text-success').addClass('text-danger');  
                                $("#res").html(data.msg);
                                $("#guardacliente").attr("disabled","disabled")
                                $("#dni").focus();                                
                             }
                        }  
                          
                     },
                     error:function(data){
                          alertify.error("Ocurrio un error en el proceso..!");
                          //console.log(data);
                          $("#res").html(''); 
                          if(data.status=="500"){
                              alertify.error("Inicie sesi&oacute;n..!");
                          }
                     }


                });
            }
        
        });//Fin busca usuario DNI

        //Busca usuarios por USUARIO
        $("#usuario").on('blur',function(e){
            e.preventDefault();
            var iduser=$("#iduser").val(),            
            user=$(this).val(),
            urlenviar="";
            if (proceso==0){

                urlenviar="<?php echo base_url()?>Usuarios/BusUsuarioUser";

            }else{
                urlenviar="<?php echo base_url()?>Usuarios/BusUsuario";
            }  
              
            $.ajax({
                url:urlenviar,
                type:"post",
                data:{"iduser":iduser,"user":user,"token":"<?php echo $this->security->get_csrf_hash();?>"},  
                dataType: 'json',
                success:function(data){
                    
                    if(data.respuesta=='ok'){
                        $("#res2").html('');
                        $("#clave").focus();
                        $('#frm_usuario').find('button[type=submit]').removeAttr('disabled');  
                    }else{
                        if(data.respuesta=='fail'){
                            $("#res2").addClass('text-danger'); 
                            $("#res2").html(data.msg);
                            $("#guardacliente").attr('disabled','disabled');    
                         }
                    }  
                      
                 },
                 error:function(data){
                    swal("Error", "Whoops! Ocurrió un error durante el proceso..!", "error");
                    $('#frm_usuario').find('button[type=submit]').removeAttr('disabled');                    
                    $("#res2").html('');
                  
                      
                 }


            });
        
         });
        
        $("#clave").on('blur',function(e){
            e.preventDefault();
            if(proceso==1){
                if($("#clave").val()!=""){
                     $("#clave2").attr('required','required'); 
                }else{
                    $("#clave2").removeAttr('required');
                }
            }
        })

        $("body").on("submit","#frm_usuario",function(e){
            e.preventDefault();
            
            //var url1=$("#frm_usuario").attr('action');           
            var url1="";
            if(proceso==0){
                url1="<?php echo  base_url()?>Usuarios/GuardarUsuario";    
            }else{
                url1="<?php echo  base_url()?>Usuarios/ModificaUsuario";
            }

            var formData = new FormData($('#frm_usuario')[0]);
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
                            $('#frm_usuario').find('button[type=submit]').removeAttr('disabled');                            
                            swal("Usuarios.!", data.success, "success");                            
                            $('#frm_usuario')[0].reset();
                            $("#res").html('');
                            $("#res").removeClass('text-success'); 
                            $("#modal-sizes-2").modal('hide'); 
                            setTimeout( function () { table.ajax.reload(); }, 1000 );                   
                            
                        }else{
                            if(typeof data.errors != "undefined"){
                                if(data.success==0){
                                    $("#lienvia").removeClass();
                                    $("#lienvia").addClass('fa fa-save');
                                    $('#frm_usuario').find('button[type=submit]').removeAttr('disabled');  
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
                        
                    }
                },
                error:function(data){
                    alertify.error('Whoops! Ocurrió un error durante el proceso..!.');
                   
                }
            }); 
                    
            
         });

        $("body").on("submit","#frm_niveles",function(e){
            e.preventDefault();
           $('#frm_niveles').find('input[type=submit]').attr('disabled', 'disabled');
            $.ajax({
                  url: base_url+"Niveles/Actualiza_menu",
                  method: $(this).attr('method'),
                  data: $(this).serialize(),
                  dataType:'json'
            })
            .done(function(data){       
                if(data.success=='ok'){
                    $('#frm_niveles').find('input[type=submit]').removeAttr('disabled');
                
                    swal({
                        title: "¿Desea aplicar cambios para este Nivel?",
                        type: "warning",
                        showCancelButton: true,             
                        confirmButtonText: "Aplicar Cambios.",
                        cancelButtonText: "Aplicar Luego.",
                        closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm) {
                            location.reload();
                            $("#modal-sizes-3").modal('hide');
                        } else {
                            $("#modal-sizes-3").modal('hide');
                        }
                    });
                }else{
                      if(data.success=='fail'){           
                            alertify.error(data.msg);
                            $('#frm_niveles').find('input[type=submit]').removeAttr('disabled');
                      }
                }
                
            })
            .fail(function(data){

                swal("Usuarios", "Whoops! Ocurrió un Error al Guardar Niveles", "error");
                $('#frm_niveles').find('input[type=submit]').removeAttr('disabled');
                 console.log(data);
            })
          
        });
        $("#estado2").on('change',function(e){
            e.preventDefault();
            Estado=$("#estado2").val();            
            table.ajax.url("<?php echo base_url();?>Usuarios/Listar_usuarios/"+Estado ).load();

        })
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



