<?php

namespace Pikasso\Adapters;

use Pikasso\Adapters\GDAdapter;

require_once __DIR__ . '/../bootstrap.php';

/**
 * GDAdapterTest
 * @author Glynn Forrest <me@glynnforrest.com>
 */
class GDAdapterTest extends \PHPUnit_Framework_TestCase {

	public function testGetWidth() {
		$adapter = new GDAdapter(TEST_JPEG_FILE);
		$this->assertEquals(600, $adapter->getWidth());
	}

	public function testGetHeight() {
		$adapter = new GDAdapter(TEST_JPEG_FILE);
		$this->assertEquals(450, $adapter->getHeight());
	}

}