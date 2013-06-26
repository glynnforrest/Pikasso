<?php

namespace Pikasso\Adapters;

use Pikasso\Pikasso;

/**
 * GDAdapter
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class GDAdapter extends Adapter {

	public function save($filename = null, $format = null) {
		if(!$filename) {
			$filename = $this->filename;
		}
		//create a blank image with the given dimensions
		$new_image = imagecreatetruecolor($this->width, $this->height);
		//open the original image to resize from
		$image = $this->imageCreateFromFormat($this->filename);

		//if the image is a gif or png, allow for transparency
		if (($this->format == Pikasso::FORMAT_GIF) ||
			($this->format == Pikasso::FORMAT_PNG)) {
			imagealphablending($new_image, false);
			imagesavealpha($new_image, true);
			$transparent = imagecolorallocatealpha($new_image,
												   255, 255, 255, 127);
			imagefilledrectangle($new_image, 0, 0,
								 $this->width, $this->height,
								 $transparent);
		}

		//resample the original into the new image
		imagecopyresampled($new_image, $image, 0, 0, 0, 0,
						   //target width and height
						   $this->width, $this->height,
						   //original width and height
						   $this->info[0], $this->info[1]);

		//save new image to $filename, accounting for format
		return $this->imageSaveFormat($new_image, $filename);
	}

	protected function imageCreateFromFormat($filename) {
		switch ($this->format) {
		case Pikasso::FORMAT_JPEG:
			return imagecreatefromjpeg($filename);
		case Pikasso::FORMAT_PNG:
			return imagecreatefrompng($filename);
		default:
			throw new PikassoException(
				'Unsupported format given to GDAdapter::imageCreateFromFormat : '
				. $this->format);
		}
	}

	/**
	 * Save an image resource to $filename, using the appropriate
	 * function for the given format.
	 */
	protected function imageSaveFormat($resource, $filename) {
		switch ($this->format) {
		case Pikasso::FORMAT_JPEG:
			return imagejpeg($resource, $filename);
		case Pikasso::FORMAT_PNG:
			return imagepng($resource, $filename);
		default:
			throw new PikassoException(
				'Unsupported format given to GDAdapter::imageSaveFormat : '
				. $this->format);
		}
	}

}
