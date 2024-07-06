<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=quirquin_uruz",
			            "quirquin_quirquin",
			            "sis1inf2CEC3");

		$link->exec("set names utf8");

		return $link;

	}

}