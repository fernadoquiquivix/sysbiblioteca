<?php
require_once ("config2.php");
require_once ("class.sqlconection.php");
Class lectores extends SQLConection {
	public function __construct() {
		parent::__construct('lectores');
		$this->fields = array (
			array("private","idlector","''"),
			array("public","carne","carne"),
			array("public","nombre","direccion"),
			array("public","telefono","telefono"),
			array("public","cargo","cargo"),
			array("public","sexo","sexo")			
		);
	}
}
?>