 <?php 
if ( ! defined('BASEPATH')) exit('No se permite el acceso directo a las p&aacute;ginas de este sitio.');
	//header('Content-Type: text/plain');
	
	require_once(str_replace("\\", "/", APPPATH).'libraries/src/autoload'.EXT);
	
	
	/**
	 * 
	 */
	class Consultadocumento
	{
		
		function __construct()
		{
			# code...
			
	
		}

		public function BuscaDocumento($documento=null){
			$cliente = new \Sunat\Sunat(true,true);
			//$ruc = ( isset($documento))? $documento : false;
			//echo  $cliente->search( $ruc, true );

			
			if(strlen ($documento)==8 ){
				return ( $cliente->search( $documento ,true) );
			}else if(strlen ($documento)==11 ){
				return ( $cliente->search( $documento ,true) );
			}else{
				return json_encode(array(	"success" 	=> false,
										"msg" 		=> "No se ha encontrado resultados. Ingrese de forma manual"
									));
			}
		}
	}
	
?>