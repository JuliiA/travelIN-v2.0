<?php 
class formato_fecha{
////////////////////////////////////////////////////
//Convierte fecha de mysql a normal
////////////////////////////////////////////////////
	function cambiaf_a_normal($date){
	# ================================================== ========
	# ==== Recibe una fecha con formato aaaa-mm-dd hh:mm:ss ====
	# ==== Devuelve una fecha con formato dd-mm-aa ====
	# ================================================== ========
	
	$year=substr($date,0,4);
	$month=substr($date,5,2);
	$day=substr($date,8,2);
	$date=$day."-".$month."-".$year;
	return ($date);
	}

//////////////////////////////////////////////////// 
//Convierte fecha de normal a mysql
////////////////////////////////////////////////////

	function cambiaf_a_mysql($date){
	# ================================================== ========
	# ==== Recibe una fecha con formato dd-mm-aa ====
	# ==== Devuelve una fecha con formato aaaa-mm-dd hh:mm:ss ====
	# ================================================== ========
	
	$day=substr($date,0,2);
	$month=substr($date,3,2);
	$year=substr($date,6,4);
	$date=$year."-".$month."-".$day;
	return ($date);
	}
}
?>
