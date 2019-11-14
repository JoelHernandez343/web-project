<?php
	/* Recupero todos los valores del arreglo POST
	=============================================== */
    	foreach($_POST as $nombre_campo => $valor){ 
			$asignacion = "\$".$nombre_campo."='".trim($valor)."';"; 
			eval($asignacion); 
    	}
	/* ============================================ */
?>