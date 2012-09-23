<?php

namespace Pikasso\Adapters;

/**
 * Adapter
 * @author Glynn Forrest me@glynnforrest.com
 **/
abstract class Adapter {

	protected $filename;
	protected $info;
	protected $width;
	protected $height;

	public function __construct($filename) {
		$this->filename = $filename;
		$this->info = getimagesize($filename);
		$this->width = imagesx(imagecreatefromjpeg($filename));
	}

	/**
	 * @return int The width of the loaded image.
	 */
	public function getWidth() {
		return $this->width ?: $this->info[0];
	}

	/**
	 * @return int The height of the loaded image.
	 */
	public function getHeight() {
		return $this->height ?: $this->info[1];
	}

	/**
	 * Set the width of the image.
	 * This will not make any changes to the image until save() is called.
	 * @param type $width
	 * @return \Pikasso\Adapters\Adapter
	 */
	public function setWidth($width) {
		$this->width = $width;
		return $this;
	}

	/**
	 * Set the height of the image.
	 * This will not make any changes to the image until save() is called.
	 * @param type $height
	 * @return \Pikasso\Adapters\Adapter
	 */
	public function setHeight($height) {
		$this->height = $height;
		return $this;
	}

}
