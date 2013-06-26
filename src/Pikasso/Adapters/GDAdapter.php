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
		//create a blank image with the given dimensions
		$new_image = imagecreatetruecolor($this->width, $this->height);
		//open the original image to resize from
		$image = imagecreatefromjpeg($this->filename);
		//resample the original into the new image
		imagecopyresampled($new_image, $image, 0, 0, 0, 0,
						   //target width and height
						   $this->width, $this->height,
						   //original width and height
						   $this->info[0], $this->info[1]);
		//save new image to $filename
		return imagejpeg($new_image, $filename);
	}
}
