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
	 * Php has around 17 IMAGETYPE_ constants.
	 * Not all of these are supported by Pikasso. The types that are
	 * supported are defined here.
	 */
	const FORMAT_GIF = IMAGETYPE_GIF;
	const FORMAT_JPEG = IMAGETYPE_JPEG;
	const FORMAT_PNG = IMAGETYPE_PNG;

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
		if(!file_exists($path)) {
			throw new PikassoException("Unable to open image $path");
		}
		return new GDAdapter($path);
	}
}
