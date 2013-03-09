<?php

namespace Pikasso\Adapters;

use Pikasso\Pikasso;

/**
 * Adapter
 * @author Glynn Forrest me@glynnforrest.com
 **/
abstract class Adapter {

	protected $filename;
	protected $info;
	protected $width;
	protected $height;
	protected $format;

	public function __construct($filename) {
		$this->filename = $filename;
		$this->info = getimagesize($filename);
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
	 * @param int $width
	 * @return \Pikasso\Adapters\Adapter
	 */
	public function setWidth($width) {
		$this->width = $width;
		return $this;
	}

	/**
	 * Set the height of the image.
	 * This will not make any changes to the image until save() is called.
	 * @param int $height
	 * @return \Pikasso\Adapters\Adapter
	 */
	public function setHeight($height) {
		$this->height = $height;
		return $this;
	}

	/**
	 * Get the current image format.
	 * If the format has been modified, the original format will not be returned.
	 * @return int Pikasso format constant
	 */
	public function getFormat() {
		return Pikasso::FORMAT_JPEG;
	}

	/**
	 * Set the format for the current image.
	 * This will not make any changes to the image until save() is called.
	 *
	 */
	public function setFormat($format) {
		$this->format = $format;
	}


	/**
	 * Save the image.
	 * @param string $filename Filename to save the image as.
	 * If no filename is supplied, the original file will be overwritten.
	 * @param int $format The format used to save the image.
	 * If no type is supplied, the original image format will be used.
	 * Formats are defined in \Pikasso\Pikasso.
	 */
	abstract public function save($filename = null, $format = null);

}
