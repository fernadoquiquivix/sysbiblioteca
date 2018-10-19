<?php
require_once ("config2.php");
require_once ("class.sqlconection.php");
Class salidas extends SQLConection {
	public function __construct() {
		parent::__construct('salidas');
		$this->fields = array (
			array("private","id","''"),
			array("public","Nosalida","Nosalida"),
			array("public","fecha","fecha"),
			array("public","Empleado_id","Empleado_id")
			
		);
	}
}
?>