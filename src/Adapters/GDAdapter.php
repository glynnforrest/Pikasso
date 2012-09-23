<?php

namespace Pikasso\Adapters;

/**
 * GDAdapter
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class GDAdapter extends Adapter {

	public function save($filename = null, $format = null) {
		if(!$filename) {
			$filename = $this->filename;
		}
		return imagejpeg(imagecreatefromjpeg($this->filename), $filename);
	}
}
