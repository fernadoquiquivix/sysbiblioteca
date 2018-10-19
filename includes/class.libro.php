<?php
require_once ("config2.php");
require_once ("class.sqlconection.php");
Class libro extends SQLConection {
	public function __construct() {
		parent::__construct('libro');
		$this->fields = array (
			array("private","idlibro","''"),
			array("public","codigo","codigo"),
			array("public","titulo","titulo"),
			array("public","paginas","paginas"),
			array("public","descripcion","descripcion"),
			array("public","autor_idautor","autor_idautor"),
			array("public","categoria_idcategoria","categoria_idcategoria"),
			array("public","editorial_ideditorial","editorial_ideditorial"),
			array("public","ejemplares","ejemplares"),
			array("public","disponibles","disponibles"),
			array("public","ubicacion_idubicacion","ubicacion_idubicacion")
		);
	}
}
?>
