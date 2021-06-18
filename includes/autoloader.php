<?php

spl_autoload_register("AutoLoader");

function AutoLoader($className) {
	$path = "classes/";
	$extention = ".class.php";
	$fullpath = $path . $className . $extention;

	require_once $fullpath;
}