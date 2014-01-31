<?php

	/****************************************/
	/* Portal Web de SAIDER         	*/
	/* Desarrollado por IT Labs 	 	*/
	/* www.it-labs.com.ve			*/
	/* info@it-labs.com.ve			*/
	/* Julio de 2013			*/
	/****************************************/
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//            

 /*
    //inclusion de archivos necesarios
    require_once $path.'db/db.php';

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//    // Crear la instancia y conectar a la BD

    // Crear la instancia y conectar a la BD
    $conec = new itl_db();
    $conec->itl_dbConexion(); 
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//    // Crear la instancia y conectar a la BD

    // Consulta de las preferencias
    $sche = "";
    $tabla = "scrg_pref";
    $campos = "*";
    $criterio = "id = 1";
    $orden = "";
    $clausula = "";
    $debug = DEBUG;
    $edit_registro = $conec->itl_dbConsulta($sche, $tabla, $campos, $criterio, $orden, $clausula, $debug);
    $rs_datos = $conec->itl_dbFetchObjet($edit_registro);

*/
// Funcion para evitar la inyeccion SQL en los formularios de la pagina
    function NoSqlInjection(){
    // Modificamos las variables pasadas por URL 
    foreach( $_GET as $variable => $valor ){ 
        $_GET [ $variable ] = str_replace ( "'" , "'" , $_GET [ $variable ]); 
        } 
    // Modificamos las variables de formularios 
    foreach( $_POST as $variable => $valor ){ 
        $_POST [ $variable ] = str_replace ( "'" , "'" , $_POST [ $variable ]); 
        } 
    }


//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//            
      
        function InfoBox($infobox_titulo, $infobox_contenido) {
            $infobox = "<!-- inicio infobox --> \n"
                ."<section class=\"clear-both\"> \n"
                ."<div class=\"infobox\"> \n"
                ."<div class=\"infobox-inner\"> \n"
                ."<div class=\"with-button\"> \n"
                ."<h2>".$infobox_titulo."</h2> \n"    
                ."<p>".$infobox_contenido."</p> \n"
                ."</div> \n"
                ."</div> \n"
                ."</div> \n"
                ."</section> \n"
                ."<!-- end infobox --> \n";
        
            return $infobox;
        }

 	function InfoBox2($infobox_titulo, $infobox_contenido) {
            $infobox = "<!-- inicio infobox --> \n"
                ."<section class=\"clear-both\"> \n"
                ."<div class=\"infobox2\"> \n"
                ."<div class=\"with-button\"> \n"
                ."<h3>".$infobox_titulo."</h3> \n"    
                ."<p>".$infobox_contenido."</p> \n"
                ."</div> \n"
                ."</div> \n"
                ."</section> \n"
                ."<!-- end infobox --> \n";
        
            return $infobox;
        }

        
    function FechaActual($FechaStamp){ 
        $ano = date('Y',$FechaStamp);
        $mes = date('n',$FechaStamp);
        $dia = date('d',$FechaStamp);
        $diasemana = date('w',$FechaStamp);

        $diassemanaN = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
        $mesesN = array(1=>"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        return $diassemanaN[$diasemana].", $dia de ". $mesesN[$mes] ." de $ano";
        }


    function BarraTareas($path, $objetivo, $tipo_user, $panel_control, $insertar, $listar, $salir){
        echo "<nav class=\"title-form\"> \n"
            ."<div id=\"barnav\"> \n";
        
        if ($tipo_user == "admin"){
            $tu = "administrador";
        }
        if ($tipo_user == "user"){
            $tu = "usuario"; 
        }
        
        if ($tipo_user == "admin"){
                echo "<div id=\"barnav_admin\" class=\"tipo_user barnav_admin_".$_SESSION['adms_sexo']."\" >".$_SESSION['adms_nomb']." ".$_SESSION['adms_apll']."</div> \n";
            }       
        if ($tipo_user == "user"){
                echo "<div id=\"barnav_user\" class=\"tipo_user barnav_user_".$_SESSION['user_sexo']." \" >".$_SESSION['user_nomb']." ".$_SESSION['user_apll']."</div> \n";
            }  
        if ($panel_control == "on"){
            echo "<a id=\"barnav_panel\" href=\"".$path."admin/admin_panel_control.php\">Panel de control</a> \n";
        }
        if ($insertar == "on"){
            echo "<a id=\"barnav_new\" href=\"".$objetivo."?op=insertar\">Nuevo registro</a> \n";
        }
        if ($listar == "on"){
            echo "<a id=\"barnav_table\" href=\"".$objetivo."?op=listar\">Tabla de consulta</a> \n";
        }
        if ($salir == "on"){
            echo "<a id=\"barnav_logout\" href=\"".$path."logout.php\">Salir</a> \n";
        }
       
        echo "</div> \n"
            ."</nav> \n";
            }    

            
    function AyudaForm($ayuda){
            
        echo "<!-- begin sidebar --> \n"
            ."<div class=\"sidebar\"> \n"
            ."<div class=\"ayuda\"> \n"
            ."<h4>Ayuda</h4> \n"
            ."<ul> \n";
               
        foreach($ayuda as $elemento => $valor){
            
            echo "<li><strong>".$elemento."</strong> ".$valor."</li>";
        }        
           
        echo "<li><strong>(*)</strong> Indica que el campo es requerido en la base de datos</li> \n"
            ."</ul> \n"
            ."</ul> \n"
            ."</div> \n"  
            ."</div> \n"
            ."<!-- /sidebar --> \n";
        }   
        
       

   function Mensaje($mensaje, $operacion, $nombre_tabla){
        switch ($mensaje) {
/*
            case "info":
                $mensaje_formulario = "<div class=\"notification-box notification-box-info\"> \n"
                    ."<p><strong>Exito!</strong> El registro ha sido ".$operacion." al realizarse una operaci&oacute;n sobre la tabla denominada: \"".$nombre_tabla."\"</p> \n"
                    ."<a href=\"#\" class=\"notification-close notification-close-info\">x</a> \n"
                    ."</div> \n";

            break;
            
            case "success":
                $mensaje_formulario = "<div class=\"notification-box notification-box-success\"> \n"
                    ."<p><strong>Exito!</strong> El registro ha sido ".$operacion." al realizarse una operaci&oacute;n sobre la tabla denominada: \"".$nombre_tabla."\"</p> \n"
                    ."<a href=\"#\" class=\"notification-close notification-close-success\">x</a> \n"
                    ."</div> \n";

            break;

            case "error":
                $mensaje_formulario = "<div class=\"notification-box notification-box-error\"> \n"
                    ."<p><strong>Error!</strong> El registro no ha podido ser ".$operacion." al realizarse una operaci&oacute;n sobre la tabla denominada: \"".$nombre_tabla."\"</p> \n"
                    ."<a href=\"#\" class=\"notification-close notification-close-error\">x</a> \n"
                    ."</div> \n";
            break;

            case "warning":
                $mensaje_formulario = "<div class=\"notification-box notification-box-warning\"> \n"
                    ."<p><strong>Advertencia!</strong> El registro no ha podido ser ".$operacion." al realizarse una operaci&oacute;n sobre la tabla denominada: \"".$nombre_tabla."\". El registro ya Existe!</p> \n"	
                    ."<a href=\"#\" class=\"notification-close notification-close-warning\">x</a> \n"
                    ."</div> \n";
            break;
        
            case "debug":
                $mensaje_formulario = "<div class=\"notification-box notification-box-warning\"> \n"
                    ."<p><strong>Advertencia!</strong> El registro no ha podido ser ".$operacion." al realizarse una operaci&oacute;n sobre la tabla denominada: \"".$nombre_tabla."\". El registro ya Existe!</p> \n"	
                    ."<a href=\"#\" class=\"notification-close notification-close-warning\">x</a> \n"
                    ."</div> \n";
            break;

            case "error-login":
                $mensaje_formulario = "<div class=\"notification-box notification-box-error\"> \n"
                    ."<p><strong>Error!</strong> Los datos suministrados no son correctos. Si usted no es adminstrador de este sitio no deve encontrarse aqui</p> \n"
                    ."<a href=\"#\" class=\"notification-close notification-close-error\">x</a> \n"
                    ."</div> \n";
            break;
        
        */
            case "success":
                $mensaje_formulario = "<div class=\"notification success\"> \n"
                    ."<span></span> \n"
                    ."<div class=\"text\"> \n"
                    ."<p><strong>&iexcl;Exito!</strong> El registro a sido ".$operacion." satisfactoriamente en la tabla de ".$nombre_tabla." de la base de datos, </p> \n"
                    ."</div> \n"
                    ."</div> \n";
            break;
        
            case "warning":
                 $mensaje_formulario = "<div class=\"notification warning\"> \n"
                    ."<span></span>  \n"
                    ."<div class=\"text\"> \n"
                    ."<p><strong>Warning!</strong> El registro no a sido ".$operacion."  en la tabla de ".$nombre_tabla." de la base de datos, &iexcl;El registro ya existe! </p> \n"
                    ."</div> \n"
                    ."</div> \n";
            break;
         
            case "error":
                $mensaje_formulario = "<div class=\"notification error\"> \n"
                    ."<span></span> \n"
                    ."<div class=\"text\"> \n"
                    ."<p><strong>Error!</strong> El registro no a sido ".$operacion."  en la tabla de ".$nombre_tabla." de la base de datos.</p> \n"
                    ."</div> \n"
                    ."</div> \n";
            break;
        
            case "debug":
                 $mensaje_formulario = "<div class=\"notification debug\"> \n"
                    ."<span></span>  \n"
                    ."<div class=\"text\"> \n"
                    ."<p><strong>Debug!</strong> This is a warning notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla varius eros et risus suscipit vehicula.</p> \n"
                    ."</div> \n"
                    ."</div> \n";
            break;
        
            case "info":
                 $mensaje_formulario = "<div class=\"notification info\"> \n"
                    ."<span></span>  \n"
                    ."<div class=\"text\"> \n"
                    ."<p><strong>Info!</strong> This is a warning notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla varius eros et risus suscipit vehicula.</p> \n"
                    ."</div> \n"
                    ."</div> \n";
            break;
        
           
        
            case "tip":
                $mensaje_formulario = "<div class=\"notification tip\"> \n"
                    ."<span></span> \n"
                    ."<div class=\"text\"> \n"
                    ."<p><strong>Quick Tip!</strong> This is a quick tip notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla varius eros et risus suscipit vehicula.</p> \n"
                    ."</div> \n"
                    ."</div> \n";
            break;
                    
            case "secure":
                $mensaje_formulario = "<div class=\"notification secure\"> \n"
                    ."<span></span> \n"
                    ."<div class=\"text\"> \n"
                    ."<p><strong>Secure Area!</strong> This is a secure area notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla varius eros et risus suscipit vehicula.</p> \n"
                    ."</div> \n"        
                    ."</div> \n";
            break;
        
            case "message":    
                $mensaje_formulario = "<div class=\"notification message\"> \n"
                    ."<span></span> \n"
                    ."<div class=\"text\"> \n"
                    ."<p><strong>Message!</strong> This is a message notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla varius eros et risus suscipit vehicula.</p> \n"
                    ."</div> \n"
                    ."</div> \n";
            break;
        
            case "download":
                $mensaje_formulario = "<div class=\"notification download\"> \n"
                    ."<span></span> \n"
                    ."<div class=\"text\"> \n"
                    ."<p><strong>Download!</strong> This is a download notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla varius eros et risus suscipit vehicula.</p> \n"
                    ."</div> \n"
                    ."</div> \n";
            break;
        
            case "puchase":
                $mensaje_formulario = "<div class=\"notification purchase\"> \n"
                    ."<span></span> \n"
                    ."<div class=\"text\"> \n"
                    ."<p><strong>Purchase!</strong> This is a purchase notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla varius eros et risus suscipit vehicula.</p> \n"
                    ."</div> \n"
                    ."</div> \n";
            break;
        
            case "print":
                $mensaje_formulario = "<div class=\"notification print\"> \n"
                    ."<span></span> \n"
                    ."<div class=\"text\"> \n"
                    ."<p><strong>Print!</strong> This is a print notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla varius eros et risus suscipit vehicula.</p> \n"
                    ."</div> \n"
                    ."</div> \n";
            break;

                }

                return $mensaje_formulario;
            }
            
    function MensajeCambioPassword($mensaje_password){
        switch ($mensaje_password){
            
            case "error-password":
                $mensaje = "<div class=\"notification error\"> \n"
                    ."<span></span> \n"
                    ."<div class=\"text\"> \n"
                    ."<p><strong>&iexcl;Error!</strong> La contrase&ntilde;a no a podido cambiarse, verifique los datos de entrada e intente nuevamente</p> \n"
                    ."</div> \n"
                    ."</div> \n";
            break;
        
            case "success-password":
                $mensaje = "<div class=\"notification success\"> \n"
                    ."<span></span> \n"
                    ."<div class=\"text\"> \n"
                    ."<p><strong>&iexcl;Exito!</strong> La contrase&ntilde;a se ha cambiado satisfactoriamente, ya puede regresar al panel de control de usuario</p> \n"
                    ."</div> \n"
                    ."</div> \n";
            break;
        
            case "warning-password":
                 $mensaje= "<div class=\"notification warning\"> \n"
                    ."<span></span>  \n"
                    ."<div class=\"text\"> \n"
                    ."<p><strong>Alerta!</strong> Los datos suministrados no son validos, la contrase&ntilde;a no coincide, verifique los datos suministrados e intente nuevamente</p> \n"
                    ."</div> \n"
                    ."</div> \n";
            break;
        }
        return $mensaje;
    }        
            
            
    function MensajeLogin ($mensaje_login){
        switch ($mensaje_login){
            
            case "error-login":
                $mensaje = "<div class=\"notification error\"> \n"
                    ."<span></span> \n"
                    ."<div class=\"text\"> \n"
                    ."<p><strong>&iexcl;Error!</strong> Los datos que ha suministrado no son correctos. Por favor ingrese direcci&oacute;n de correo electr&oacute;nico y contrase&ntilde;a validas</p> \n"
                    ."</div> \n"
                    ."</div> \n";
            break;
        
            case "success-login":
                $mensaje = "<div class=\"notification success\"> \n"
                    ."<span></span> \n"
                    ."<div class=\"text\"> \n"
                    ."<p><strong>&iexcl;Exito!</strong> Ha logrado iniciar sesi&oacute;n</p> \n"
                    ."</div> \n"
                    ."</div> \n";
            break;
            }
            
            return $mensaje;
        }        
            
    function MensajeDBDebuger($funcion, $consulta){            
        $mensaje_debuger_db = "<div class=\"notification debug\"> \n"
            ."<span></span>  \n"
            ."<div class=\"text\"> \n"
            ."<p><strong>Debug de ".$funcion.":</strong>&nbsp;&nbsp;&nbsp;&nbsp;".$consulta."</p> \n"
            ."</div> \n"
            ."</div> \n";
        return $mensaje_debuger_db;
        }

    function MensajeDBError($operacion, $error){            
        $mensaje_debuger_db = "<div class=\"notification error\"> \n"
            ."<span></span>  \n"
            ."<div class=\"text\"> \n"
            ."<p>Ocurrieron errores al intentar ".$operacion." valores en la base de datos.
            analizar el mensaje enviado: <strong>$error</strong></p> \n"
            ."</div> \n"
            ."</div> \n";
        return $mensaje_debuger_db;
        } 
    
    function MensajeErrorCaptcha(){
        $mensaje_error_captcha = "<div class=\"notification error\"> \n"
            ."<span></span> \n"
            ."<div class=\"text\"> \n"
            ."<p><strong>Error!</strong> Has escrito mal el texto del captcha, por favor inetentalo de nuevo</p> \n"
            ."</div> \n"
            ."</div> \n";
        return $mensaje_error_captcha;
        }
                
                
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//            
    // Funcion de cabecera de los formularios de datos.
    // 
    // $op:         opcion del formulario. valores: "insertar | editar"
    // 
    // $legend:     titulo del fiedset. valores: alfanumericos
    // 
    // $id_form:    identificador del formulario. valores: alfanumericos
    // 
    // $name:       nombre del formulario (recomendable usar el mismo del identificador). valores: alfanumericos
    // 
    // $action:     accion del envio del formulario: ruta del archivo que ejecuta la accion. valores: alfanumericos
    // 
    // $method:     metodo para enviar los datos. 
    //              valores: "get" (Agrega a los datos del formulario a la URL: URL?name=value&name=valor).
    //                       "post" (Envia el form-data como una transacción HTTP POST).
    //                       
    // $enctype:    codificacion de la data del formulario, usado solamente para metodo POST. 
    //              valores: "application/x-www-form-urlencoded" -> Todos los caracteres se codifican antes de enviado (esta es la opción predeterminada).
    //                       "multipart/form-data" "text/plain"  -> Los caracteres no se codifican. Este valor es necesario si usted está usando las formas que tienen un control de carga de archivos.
    //                       "text/plain"                        -> Los espacios se convierten en símbolos "+", pero sin caracteres especiales se codifican.
    //                       
    // $autcomplete Especifica si el formulario debe tener activado autocompletar. valores: "on" "off".
    // 
    // $novalidate: Si este atributo está presente el formulario no se valida la entrada de formulario. valor: "novalidate".
    // 
    // $target:     Especifica el objetivo donde mostrar la respuesta que se recibe después de enviar el formulario
    //              valores: _blank (Abrir en una nueva ventana).
    //                       _self (Abrir en el mismo marco que se ha hecho clic).
    //                       _parent (Abrir en el conjunto de marcos padre).
    //                       _top (Abrir en el cuerpo completo de la ventana).
    //                       framename (Abrir en un marco llamado).
    //        
    // $mensaje_formulario:     mensaje enviado por el control de errores al intentar insertar o editar un registro en la base de datos
    //
    // $ncols:                  numero de columnas de espacio de contenido de una maximo de 4. valores: "one-half" (460px), "one-third" (300px), "one-fourth" (220px), two-thirds (620px), three-fourths (700px), login (480px y centrado)
    //        
    // $column-last             ultima columna, el formulario se alinea a la derecha valores "on" "off"        

    function FormHeader($op, $legend, $id_form, $name, $action, $method, $enctype, $autocomplete, $novalidate, $target, $mensaje_formulario, $ncols, $column_last){

        if ($column_last == "on") {
            $col_last = "column-last";
        }
        else {
            $col_last = "";
        }

        echo "<!-- begin form ".$op." datos --> \n"
            ."<section id=\"main\" class=\"".$ncols." ".$col_last."\"> \n"

            ."<fieldset class=\"form-fieldset\"> \n" 
            ."<legend>".$legend."</legend> \n"

            ."<form id=\"".$id_form." name=\"".$name."\" action=\"".$action."\" enctype=\"".$enctype."\" method=\"".$method."\" autocomplete=\"".$autocomplete."\" novalidate=\"".$novalidate."\" target=\"".$target."\" class=\"general\" data-validate=\"parsley\"> \n";   

        echo @$mensaje_formulario;  
        }            
 //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//            

    // Funcion de cierre de los formularios de incercion de datos
    //
    // $op:         opcion del formulario. valores: "insertar | editar"
    //     
    function FormFooter($op, $id){
        echo "<div class=\"form-btn-nav\"> \n"           
            ."<li><input class=\"button blue\" type=\"submit\" value=\"Enviar\" /></li> \n"
            ."<li><input class=\"button blue\" type=\"reset\" value=\"Borrar\" /></li> \n"
            ."</div> \n"

            ."<input type=\"hidden\" id=\"control\" name=\"control\" value=\"1\"> \n";
                 
            echo "<input type=\"hidden\" id=\"op\" name=\"op\" value=\"".$op."\"> \n"
                ."<input type=\"hidden\" id=\"id\" name=\"id\" value=\"".$id."\"> \n";           

         echo "</form> \n"

            ."</fieldset> \n"

            ."</section> \n"
            ."<!-- end form --> \n";
        }
        
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//            

    // Funcion para reemplazar caracteres especiales
    function ReemSpecialChars($texto){
        $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ', '\"', '€', 'ü', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'Ü', 'ç', 'Ç', '©', '°', 'º', '¿', '¡', '<', '>', '/', '*', '"');
        $repl = array('&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;', '&ntilde;', '&quot;', '&euro;', '&uuml;', '&Aacute;', '&Eacute;', '&Iacute;', '&Oacute;', '&Uacute;', '&Ntilde;', '&Uuml;', '&ccedil;', '&Ccedil;', '&copy;', '&deg;', '&ordm;', '&iquest;', '&iexcl;', '&lt;', '&gt;', '&#47;', '&#42;', '&quot;');
        $textohtml = str_replace ($find, $repl, $texto);
        return $textohtml;	
        }

    function DataTablesInicio($legend){
        echo "<fieldset class=\"form-fieldset\"> \n"
            ."<legend>".$legend."</legend> \n"
            ."<div id=\"contenedor_datatables\"> \n";
            }    

    function DataTablesFinal(){
        echo "</div> \n"
            ."</fieldset> \n";
            }
      
            
    //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//            
    function CreateThumb($name, $filename, $new_w, $new_h, $quality, $debug=false) {
	$results = "";
	$array = explode(".",strtolower($name));
	$system = end($array);
	$results = "file extension = $system <br>";
	if (preg_match("/jpg|jpeg/",$system)) $src_img = imagecreatefromjpeg($name);
	if (preg_match("/png/",$system)) $src_img = imagecreatefrompng($name);
	$old_x=imageSX($src_img);
	$old_y=imageSY($src_img);
 
	$results .= "image size = $old_x x $old_y <br>";
 
	if($old_x > $old_y) {
		$thumb_h = $new_h;
		$ratio = $new_h / $old_y;
		$thumb_w = ($old_x * $ratio);
	}
	if($old_x < $old_y) {
		$thumb_w = $new_w;
		$ratio = $new_w / $old_x;
		$thumb_h = ($old_y * $ratio);
	}
	if($old_x == $old_y) {
		$thumb_w = $new_w;
		$thumb_h = $new_h;
	}
	if($new_h < $thumb_h) {
		$yloc = round(($thumb_h - $new_h) / 2);
	} else {
		$yloc = 0;
	}
 
	$results .= "output size = $thumb_w x $thumb_h <br>
	y offset = $yloc <br>";
	$dst_img = ImageCreateTrueColor($new_w,$new_h);
	imagecopyresampled($dst_img,$src_img,0,0,0,$yloc,$thumb_w,$thumb_h,$old_x,$old_y); 
	if (preg_match("/png/",$system)) {
		imagepng($dst_img,$filename); 
	} else {
		imagejpeg($dst_img,$filename,$quality); 
	}
	imagedestroy($dst_img); 
	imagedestroy($src_img);
	if($debug) echo $results;
	return "Resized the image successfully!";
                }            
    
    // Constante que define la funcion javascript de la tabla general de consuta de datos    
    define("NivoSlider", "<script type=\"text/javascript\"> \n"
        ."$(window).load(function() { \n"
        ."$('#slider').nivoSlider({ \n"
            ."effect: 'random', // Specify sets like: 'fold,fade,sliceDown' \n"
            ."slices: 15, // For slice animations \n"
            ."boxCols: 8, // For box animations \n"
            ."boxRows: 4, // For box animations \n"
            ."animSpeed: 500, // Slide transition speed \n"
            ."pauseTime: 3000, // How long each slide will show \n"
            ."startSlide: 0, // Set starting Slide (0 index) \n"
            ."directionNav: false, // Next & Prev navigation \n"
            ."controlNav: true, // 1,2,3... navigation \n"
            ."controlNavThumbs: true, // Use thumbnails for Control Nav \n"
            ."pauseOnHover: true, // Stop animation while hovering \n"
            ."manualAdvance: false, // Force manual transitions \n"
            ."prevText: 'Prev', // Prev directionNav text \n"
            ."nextText: 'Next', // Next directionNav text \n"
            ."randomStart: false, // Start on a random slide \n"
            ."beforeChange: function(){}, // Triggers before a slide transition \n"
            ."afterChange: function(){}, // Triggers after a slide transition \n"
            ."slideshowEnd: function(){}, // Triggers after all slides have been shown \n"
            ."lastSlide: function(){}, // Triggers when last slide is shown \n"
            ."afterLoad: function(){} // Triggers when slider has loaded \n"
        ."}); \n"
    ."}); \n"
    ."</script> \n");
            
    
    // Establecemos que las paginas no puedan ser cacheadas
    function SessionNoCaching (){        
        header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }

        
    // Funcion para obtener la direccion ip de los clientes
    function GetClientIP() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'IP Desconocida';
            //echo $ipaddress;
        return $ipaddress;
        }
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//            
           
    function SessionValidateUsuario($path, $debug) {
        
        // inclusion de las funciones de bases de datos
        require_once $path."db/db.php";
        
        // Crear la instancia y conectar a la BD
        $conec = new itl_db();
        $conec->itl_dbConexion();
                         
        // Comprobacion del registro de la session del usuario
        $sche = "";
        $tabla = "sder_ssnu";
        $campos = "id, ssnu_usid, ssnu_tokn, ssnu_agnt, ssnu_dcip, ssnu_fchi";
        $criterio = "id = '".@$_SESSION['ssnu_id']."' AND  ssnu_tokn = '".@$_SESSION['tokn']."' AND  ssnu_agnt = '".@$_SESSION['user_agnt']."' AND ssnu_dcip = '".@$_SESSION['user_dcip']."'";
        $orden = "";
        $clausula = "";
        $registro = $conec->itl_dbConsulta($sche, $tabla, $campos, $criterio, $orden, $clausula, $debug);
        $rs_existe_registro = $conec->itl_dbNumRows($registro);	
        
        if ($rs_existe_registro == 1){
            $session_validate = "correcta";
            
            // Calculamos el tiempo transcurrido 
            $fecha_hora_inicio = $_SESSION['user_ufch']; 
            $ahora = date("Y-n-j H:i:s"); 
            $tiempo_transcurrido = (strtotime($ahora)-strtotime($fecha_hora_inicio));
                
                //comparacion del tiempo transcurrido 
                if($tiempo_transcurrido >= 2000) { 
                   // echo $tiempo_transcurrido;
                    session_unset();
                    session_destroy();
                    header("Location: ".$path."login_usuario.php");
                    //sino, actualizo la fecha de la sesión 
                    }
                else { 
                    $_SESSION['user_ufch'] = $ahora; 
                }
        }
        else{
            $session_validate = "incorrecta";
            session_unset();
            session_destroy();
            echo "<script type=\"text/javascript\">window.location=\"".$path."login_usuario.php\"</script> \n";
            
        }
        //echo $session_validate;
        return $session_validate;
        
        }
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//            
    
    function SessionValidateAdministrador($path, $debug) {
        
        // inclusion de las funciones de bases de datos
        require_once $path."db/db.php";
        
        // Crear la instancia y conectar a la BD
        $conec = new itl_db();
        $conec->itl_dbConexion();
                         
        // Comprobacion del registro de la session del usuario
        $sche = "";
        $tabla = "sder_ssna";
        $campos = "id, ssna_usid, ssna_tokn, ssna_agnt, ssna_dcip, ssna_fchi";
        $criterio = "id = '".@$_SESSION['ssna_id']."' AND  ssna_tokn = '".@$_SESSION['tokn']."' AND  ssna_agnt = '".@$_SESSION['adms_agnt']."' AND ssna_dcip = '".@$_SESSION['adms_dcip']."'";
        $orden = "";
        $clausula = "";
        $registro = $conec->itl_dbConsulta($sche, $tabla, $campos, $criterio, $orden, $clausula, $debug);
        $rs_existe_registro = $conec->itl_dbNumRows($registro);	
        
        if ($rs_existe_registro == 1){
            $session_validate = "correcta";
            
            // Calculamos el tiempo transcurrido 
            $fecha_hora_inicio = $_SESSION['adms_ufch']; 
            $ahora = date("Y-n-j H:i:s"); 
            $tiempo_transcurrido = (strtotime($ahora)-strtotime($fecha_hora_inicio));
                
                //comparacion del tiempo transcurrido 
                if($tiempo_transcurrido >= 2000) { 
                   // echo $tiempo_transcurrido;
                    session_unset();
                    session_destroy();
                    header("Location: ".$path."login_administrador.php");
                    //sino, actualizo la fecha de la sesión 
                    }
                else { 
                    $_SESSION['adms_ufch'] = $ahora; 
                }
        }
        else{
            $session_validate = "incorrecta";
            session_unset();
            session_destroy();
            echo "<script type=\"text/javascript\">window.location=\"".$path."login_administrador.php\"</script> \n";
            
        }
        //echo $session_validate;
        return $session_validate;
        
        }
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//            

        
    function logOut() {
        session_unset();
        session_destroy();
        session_start();
        session_regenerate_id(true);
        }    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//            
            
    
function itl_MailContact ($path, $nombre, $email, $asunto, $mensaje){
    
        // archivos necesarios
        require_once $path.'includes/mail/class.phpmailer.php';
        require_once $path.'includes/mail/class.smtp.php';
       
        // instanciamos la clase 
        $mail = new PHPMailer();
        $mail->IsSMTP();

        // configuracion del servidor de correo
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.live.com";
        //$mail->SMTPDebug = 2; 
        $mail->Port = 587;

        // configuracion de cuenta de correo 
        $mail->Username = "info@surcarga.com";
        $mail->Password = "Sur123Carga";

        // configuracion del mensaje de correo
        $mail->From = $email;
        $mail->FromName = $nombre;
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;
        
        $address = "info@surcarga.com";
        $mail->AddAddress ($address, "Sres Sur Carga");
        // envio del mensaje
        if(!$mail->Send()) {
            echo "Error: " . $mail->ErrorInfo;
            } 
        else {
            echo "";
            }
        }        
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//            
        
// Funcion que crea una lista desplegable a partir de los datos de una tabla de BD Postgresql
	function Lista($sche, $tabla, $criterio, $orden, $valor, $descripcion, $defecto) {
	
            $sche = "";
            
            // crear la instancia y conectar a la BD
            $conec = new itl_db();
            $conec->itl_dbConexion();

            //$s = "SELECT * FROM $sche.$tabla";
            $s = "SELECT * FROM $tabla";
            $s .= (!empty($criterio) ? " where $criterio" : "");
            $s .= (!empty($orden) ? " order by $orden" : "");
            //echo $s;
            $rs=$conec->itl_dbQuery($s);
            $nrows=$conec->itl_dbNumRows($rs);
            $vals=explode(',',$descripcion);
            if ($nrows>0){
                while ($row=$conec->itl_dbFetchArray($rs)){
                    echo "<option value=\"".trim($row[$valor])."\"".(trim($row[$valor])==$defecto? " SELECTED":"").">";
                    foreach ($vals as $des_row){
                        echo $row[$des_row]." ";
                        }
                    echo "</option>\n";
                }
            }else
                echo "<option value=''>No hay registros</option>";
            $conec->itl_dbFreeMemory();
            } 
            
            
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//            
            
            function FechaLarga($fecha){
            $agno = date("Y",strtotime($fecha)); //<-- year
            $mes = date("m",strtotime($fecha)); //<-- número de mes (01-12)
            $dia = date("d",strtotime($fecha)); //<-- Día del mes (1-31)
            $nombre_dia = date('l',strtotime($fecha));  //<-- Día de la semana(Lunes - Domingo)
            $nombre_mes = date('F',strtotime($fecha));	

            // Obtenemos y traducimos el nombre del día
            if ($nombre_dia=="Monday") $nombre_dia="Lunes";
            if ($nombre_dia=="Tuesday") $nombre_dia="Martes";
            if ($nombre_dia=="Wednesday") $nombre_dia="Mi&eacute;rcoles";
            if ($nombre_dia=="Thursday") $nombre_dia="Jueves";
            if ($nombre_dia=="Friday") $nombre_dia="Viernes";
            if ($nombre_dia=="Saturday") $nombre_dia="Sabado";
            if ($nombre_dia=="Sunday") $nombre_dia="Domingo";

            // Obtenemos y traducimos el nombre del mes
            if ($nombre_mes=="January") $nombre_mes="Enero";
            if ($nombre_mes=="February") $nombre_mes="Febrero";
            if ($nombre_mes=="March") $nombre_mes="Marzo";
            if ($nombre_mes=="April") $nombre_mes="Abril";
            if ($nombre_mes=="May") $nombre_mes="Mayo";
            if ($nombre_mes=="June") $nombre_mes="Junio";
            if ($nombre_mes=="July") $nombre_mes="Julio";
            if ($nombre_mes=="August") $nombre_mes="Agosto";
            if ($nombre_mes=="September") $nombre_mes="Septiembre";
            if ($nombre_mes=="October") $nombre_mes="Octubre";
            if ($nombre_mes=="November") $nombre_mes="Noviembre";
            if ($nombre_mes=="December") $nombre_mes="Diciembre";

            // obtenemos la fecha completa
            $fechan = $nombre_dia." ".$dia." de ".$nombre_mes." de ".$agno.".";
            return $fechan;
            }
        
    
  ?>