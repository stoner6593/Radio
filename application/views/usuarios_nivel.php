
 <div class="row">           
    <form class="form-horizontal" data-parsley-validate="true" enctype="multipart/form-data" name="frm_niveles"  id="frm_niveles" method="post" role="form">                        
        <div class="row">
            <input align="right"  autocomplete="off" value="<?php echo $codusuario;?>" name="codUsuario" type="hidden" id="codUsuario">
            <div class="col-md-4" >    
               <?=form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash())?>             
                 <select name="empresa" id="empresa"  class="form-control input-md" placeholder="Empresa" required title="Empresa">
                    <optgroup label="Empresas">                               
                    <?php foreach($empresas as $res){?>
                        <option value="<?php echo $res['codEmpresa']?>" class="bg-blue"><?php echo $res['razonsocial']?></option>    
                    <?php }?>
                </select>
            </div>
            <div class="col-md-4">
                <select name="cbsucursal" id="cbsucursal"  class="form-control input-md" placeholder="Sucursal" required title="Sucursal">
                    <optgroup label="Sucursales">                            
                </select>      
            </div>
            <div class="col-md-4">
                <select name="cbalmacen" id="cbalmacen"  class="form-control input-md" placeholder="Sucursal" required title="Sucursal">
                    <optgroup label="Almacenes">                            
                </select>
            </div> 
        </div>
        <hr>
        <div class="row">
            <div class="col-md-11 " style="overflow-y:scroll;height:380px"  id="div_contenedor" >
                <table class="" border="0"  >
                <?php 
                $i=0;   $j=0;  
                 foreach ($menu_rol as $value ) {
                     $cod=$value['codMenu'];           
                     $submenu=$this->Niveles_model->Busca_submenu($cod);      // if($value['estmenu']=='AC'): $idmenu=$value['id_menu']; endif;
                                       
                 ?>      
                  <tr>
                    <td style="width:30px">
                        <label class="checkbox-inline">
                            <input name="menu[<?=$i?>]"  type="checkbox"  <?php if($value['estado']==1){?>checked="checked"<?php }?> value="<?=$value['codMenu']?>" class="px"> <i class="jstree-icon jstree-themeicon fa fa-folder text-primary fa-lg jstree-themeicon-custom" role="presentation"></i>
                        </label>
                    </td>   
                    <td title="<?=$value['titulo']?>" colspan="2"><b><?=$value['descripcion']?></b></td>  
                  </tr> 
                  <?php $i++; 
                   if($submenu):    
                      foreach ($submenu as $value ) {                                    
                   ?>      
                  <tr>
                    <td style="width:17px">&nbsp;</td>              
                    <td style="width:50px">
                        <label class="checkbox-inline">
                            <input name="submenua[<?=$j?>]"  type="checkbox"  <?php if($value['estado']==1){?>checked="checked"<?php }?> value="<?=$value['codSubmenu']?>" class="px"><i class="jstree-icon jstree-themeicon fa fa-folder text-success fa-lg jstree-themeicon-custom" role="presentation"></i>
                        </label>
                    </td>   
                    </td>
                    <td colspan="2">
                    <b><?=$value['descripcion']?></b>
                    </td>
                  </tr>  
                  <?php $j++; } endif;?>   
                  <?php }?>             
                                                       
                </table> 
            </div>
        </div>      
        <div class="row">
            <div class="col-md-4">                
                <button type="submit" id="nivel_usuario" class="btn btn-info" >
                <i id="lienvia" class="fa fa-save"></i> Guardar</button>
            </div>                                       
        </div>  
    </form>
</div>
<script type="text/javascript">
  CargaSucursales($("#empresa").val());
  $("#cbalmacen").val(<?php echo $this->session->userdata('codAlmacen');?>);
  $(function(){
    $("#cbalmacen").on('change',function(e){

        //e.preventDefault();
        var codAlmacen=$(this).val(),codUsuario=$("#codUsuario").val();
        
         $.ajax({
            type: 'get',
            url: base_url+'Niveles/Verifica_niveles',
            data: {"codUsuario":codUsuario,"codAlmacen":codAlmacen},            
                     
            beforeSend: function(){
                $("#lienvia").removeClass('fa fa-save');
                $("#lienvia").addClass('fa fa-spinner fa-spin');
                $("#nivel_usuario").attr('disabled','disabled');                   
                
            },
            success:function(data) {                
                            
                $("#div_contenedor").html(data);
                $("#lienvia").removeClass();
                $("#lienvia").addClass('fa fa-save');
                $('#frm_niveles').find('button[type=submit]').removeAttr('disabled');   
            },
            error:function(data){
                swal("Error", "Ocurrió un Error al Procesar Datos", "error");
                $('#frm_niveles').find('button[type=submit]').removeAttr('disabled');    
                console.log(data);
               
            }
        }); 
    })
  })
</script>