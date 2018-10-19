<?php
require_once ("config2.php");
require_once ("class.sqlconection.php");
Class prestamo extends SQLConection {
	public function __construct() {
		parent::__construct('prestamo');
		$this->fields = array (
			array("private","idprestamo","''"),
			array("public","noprestamo","noprestamo"),
			array("public","fecha","fecha"),
			array("public","lectores_idlector","lectores_idlector"),
			array("public","usuarios_id_usuario","usuarios_id_usuario")
			
		);
	}
}
?>

	