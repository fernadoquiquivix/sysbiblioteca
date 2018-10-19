<?php
require_once ("config2.php");
require_once ("class.sqlconection.php");
Class usuarios extends SQLConection {
	public function __construct() {
		parent::__construct('usuarios');
		$this->fields = array (
			array("private","id_usuario","''"),
			array("public","nombre","nombre"),
			array("public","apellido","apellido"),
			array("public","email","email"),
			array("public","password","password"),
			array("public","fechaCaptura","fechaCaptura"),
			array("public","tipousuario","tipousuario")

			
		);
	}
}
?>
