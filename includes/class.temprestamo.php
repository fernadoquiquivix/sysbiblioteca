<?php
require_once ("config2.php");
require_once ("class.sqlconection.php");
Class temprestamo extends SQLConection {
	public function __construct() {
		parent::__construct('temprestamo');
		$this->fields = array (
			array("private","idtemprestamo","''"),
			array("public","cantidad","cantidad"),
			array("public","idlibro","idlibro"),
				array("public","idusuario","idusuario")
			);
	}
}
?>