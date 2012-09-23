<?php

function autoload($class) {
	echo $class;
	$class = ltrim($class, '\\');
	$class = str_replace('Pikasso\\', 'src/', $class);
	require __DIR__ . '/../' .
			str_replace('\\', '/', $class) . '.php';
}

spl_autoload_register('autoload');
