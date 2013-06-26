<?php

namespace Pikasso;

require_once(__DIR__ . '/../bootstrap.php');

use Pikasso\Adapters\Adapter;

/**
 * PikassoTest
 * @author Glynn Forrest <me@glynnforrest.com>
 */
class PikassoTest extends \PHPUnit_Framework_TestCase {

	public function testOpenReturnsAdapter() {
		$this->assertTrue(Pikasso::open(TEST_JPEG_FILE) instanceof Adapter);
		$this->assertTrue(Pikasso::open(TEST_PNG_FILE) instanceof Adapter);
	}

	public function testOpenThrowsExceptionOnFakePath() {
		$this->setExpectedException('\\Pikasso\\PikassoException');
		Pikasso::open('dummy');
	}



}
