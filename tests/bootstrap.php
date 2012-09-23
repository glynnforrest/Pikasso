<?php

function autoload($class) {
	$class = ltrim($class, '\\');
	$class = str_replace('Pikasso\\', 'src/', $class);
	require __DIR__ . '/../' .
			str_replace('\\', '/', $class) . '.php';
}

spl_autoload_register('autoload');

define('TEST_JPEG_FILE', __DIR__ . '/jackie-chan.jpg');