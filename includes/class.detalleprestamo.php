<?php
require_once ("config2.php");
require_once ("class.sqlconection.php");
Class detalleprestamo extends SQLConection {
	public function __construct() {
		parent::__construct('detalleprestamo');
		$this->fields = array (
			array("private","iddetalleprestamo","''"),
			array("public","cantidadT","cantidadT"),
			array("public","libro_idlibro","libro_idlibro"),
			array("public","prestamo_idprestamo","prestamo_idprestamo")
			
		);
	}
}
?>
