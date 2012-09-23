<?php

namespace Pikasso\Adapters;

/**
 * GDAdapter
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class GDAdapter extends Adapter {

	protected $image;

	public function __construct($path) {
		$this->image = imagecreatefromjpeg($path);
	}

	public function getWidth() {
		return imagesx($this->image);
	}

	public function getHeight() {
		return imagesy($this->image);
	}


}
