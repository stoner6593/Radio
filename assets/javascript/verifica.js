$(function () {
 
	$("#envia").on("click",function (e) {
		e.preventDefault();
		var user = $("#usuario").val(),
			pass = $("#clave").val(),
            empresa = $("#empresa option:selected").val();
		if (user == ''){			
			alertify.error("Completar Campo Usuario ");
			$("#usuario").focus();
			return false;
		}
		if(pass == ''){
			alertify.error("Completar Campo Clave ");
			$("#clave").focus();
			return false;
		}
		if(user.length < 8){
			alertify.error("Usuario debe tener más de 8 caracteres");
			$("#usuario").focus();
			return false;
		}	
		if(pass.length < 8){
			alertify.error("Clave debe tener más de 8 caracteres");
			$("#clave").focus();
			return false;
		}
		
		
		$.ajax({
			url:$("#formulario").attr('action'),
			type:'post',
			data:$("#formulario").serialize(),
			dataType:'json',
			beforeSend:function(){
               
				$('#formulario').find('input[type=submit]').attr('disabled', 'disabled');
				$('#formulario').find('input[type=submit]').attr('value', 'Procesando....!');
			},	
			success:function(rpta){
				console.log(rpta);
				if(rpta.respuesta=='ok'){
					alertify.success(rpta.msg);				
					$("#usuario").val('');
	    			$("#clave").val('');
	    			$("#usuario").focus();	
					
					window.location=base_url;
					$('#formulario').find('input[type=submit]').removeAttr('disabled');	
					$('#formulario').find('input[type=submit]').attr('value', 'Ingresar');
				}else{
					if(rpta.respuesta=='fail'){
						$("#usuario").val('');
	    				$("#clave").val('');
	    				$("#usuario").focus();										
						alertify.error(rpta.usuario+' '+ rpta.clave+' '+rpta.empresa);
						$('#formulario').find('input[type=submit]').attr('value', 'Ingresar');
						
					
					}else{
						if(rpta.respuesta=='fail2'){
							$("#usuario").val('');
	    					$("#clave").val('');
	    					$("#usuario").focus();
							$('#formulario').find('input[type=submit]').removeAttr('disabled');
							$('#formulario').find('input[type=submit]').attr('value', 'Ingresar');
							//window.location=base_url;
							alertify.error(rpta.msg);
						}else{
							if(rpta.respuesta=='fail3'){
								$("#usuario").val('');
	    						$("#clave").val('');
	    						$("#usuario").attr('disabled', 'disabled');
	    						$("#clave").attr('disabled', 'disabled');
	    						$('#formulario').find('input[type=submit]').attr('disabled', 'disabled');
	    						setTimeout(function(){$('#formulario').find('input[type=submit]').removeAttr('disabled');}, 70000);
	    						setTimeout(function(){$('#usuario').removeAttr('disabled');}, 70000);   
	    						setTimeout(function(){
	    							$('#clave').removeAttr('disabled');
	    							window.location=base_url;

	    						}, 70500); 
								$("#usuario").focus();
								$(".alerta1").fadeIn(900);
								setTimeout(function(){ $(".alerta1").fadeOut(2500);}, 6500);									
								setTimeout(function(){ $(".alerta2").fadeIn(3500);}, 1500);
								setTimeout(function(){ $(".alerta2").fadeOut(4500);}, 14500);	
								alertify.error(rpta.msg);
								$('#formulario').find('input[type=submit]').attr('value', 'Ingresar');
								
							
							}

						}


					}	
				}
				
			},
			error:function(rpta){	
				$("#procesa").hide();					
				alertify.error("Ocurrió un error durante el proceso..!");
				$('#formulario').find('input[type=submit]').attr('value', 'Ingresar');
				$('#formulario').find('input[type=submit]').removeAttr('disabled');
				console.log(rpta);

				
			}

		});
	});

 
    

})
