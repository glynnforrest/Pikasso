<?php

namespace Pikasso\Adapters;

require_once(__DIR__ . '/../../bootstrap.php');

use Pikasso\Adapters\GDAdapter;
use Pikasso\Pikasso;

/**
 * GDAdapterTest
 * @author Glynn Forrest <me@glynnforrest.com>
 */
class GDAdapterTest extends \PHPUnit_Framework_TestCase {

	public function testGetWidth() {
		$adapter = new GDAdapter(TEST_JPEG_FILE);
		$this->assertEquals(600, $adapter->getWidth());
		$adapter = new GDAdapter(TEST_PNG_FILE);
		$this->assertEquals(297, $adapter->getWidth());
	}

	public function testGetHeight() {
		$adapter = new GDAdapter(TEST_JPEG_FILE);
		$this->assertEquals(450, $adapter->getHeight());
		$adapter = new GDAdapter(TEST_PNG_FILE);
		$this->assertEquals(400, $adapter->getHeight());
	}

	public function testSetWidth() {
		$adapter = new GDAdapter(TEST_JPEG_FILE);
		//assert that method chaining is possible
		$this->assertTrue($adapter->setWidth(300) instanceof GDAdapter);
		$this->assertEquals(300, $adapter->getWidth());
		$adapter = new GDAdapter(TEST_PNG_FILE);
		$this->assertTrue($adapter->setWidth(100) instanceof GDAdapter);
		$this->assertEquals(100, $adapter->getWidth());
	}

	public function testSetHeight() {
		$adapter = new GDAdapter(TEST_JPEG_FILE);
		$this->assertTrue($adapter->setHeight(225) instanceof GDAdapter);
		$this->assertEquals(225, $adapter->getHeight());
		$adapter = new GDAdapter(TEST_PNG_FILE);
		$this->assertTrue($adapter->setHeight(200) instanceof GDAdapter);
		$this->assertEquals(200, $adapter->getHeight());
	}

	public function testSaveJpeg() {
		$adapter = new GDAdapter(TEST_JPEG_FILE);
		$adapter->setHeight(225)->setWidth(300);
		$small_file = TEST_JPEG_FILE . '.small';
		$adapter->save($small_file);
		$this->assertTrue(file_exists($small_file));
		$small_adapter = new GDAdapter($small_file);
		$this->assertEquals(300, $small_adapter->getWidth());
		$this->assertEquals(225, $small_adapter->getHeight());
		@unlink($small_file);
	}

	public function testSavePng() {
		$adapter = new GDAdapter(TEST_PNG_FILE);
		$adapter->setHeight(200)->setWidth(100);
		$small_file = TEST_PNG_FILE . '.small';
		$adapter->save($small_file);
		$this->assertTrue(file_exists($small_file));
		$small_adapter = new GDAdapter($small_file);
		$this->assertEquals(100, $small_adapter->getWidth());
		$this->assertEquals(200, $small_adapter->getHeight());
		@unlink($small_file);
	}


	public function testGetFormat() {
		$adapter = new GDAdapter(TEST_JPEG_FILE);
		$this->assertEquals(Pikasso::FORMAT_JPEG, $adapter->getFormat());
		$adapter = new GDAdapter(TEST_PNG_FILE);
		$this->assertEquals(Pikasso::FORMAT_PNG, $adapter->getFormat());
	}

	public function testSetFormat() {
		$adapter = new GDAdapter(TEST_JPEG_FILE);
		$this->assertTrue($adapter->setFormat(Pikasso::FORMAT_PNG) instanceof GDAdapter);
		$this->assertEquals(Pikasso::FORMAT_PNG, $adapter->getFormat());
		$adapter = new GDAdapter(TEST_PNG_FILE);
		$this->assertTrue($adapter->setFormat(Pikasso::FORMAT_JPEG) instanceof GDAdapter);
		$this->assertEquals(Pikasso::FORMAT_JPEG, $adapter->getFormat());
	}

}