<?php 
    function myAutoload($className) {
	    $pathToFile = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
	    if (file_exists($pathToFile)) {
		    include "$pathToFile";
	    }
    }

    spl_autoload_register('myAutoload');
