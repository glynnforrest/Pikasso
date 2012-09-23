<?php

namespace Pikasso;

use Pikasso\Adapters\GDAdapter;
use Pikasso\PikassoException;

/**
 * Pikasso
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class Pikasso {

	/**
	 * Pikasso should not be instantiated directly.
	 * Instead call Pikasso::open()
	 */
	protected function __construct() {
	}

	/**
	 * Open an image file for editing.
	 * @param string $path Full path to the image file.
	 * @return \Pikasso\adapters\GDAdapter
	 */
	public static function open($path) {
		return new GDAdapter($path);
	}
}
