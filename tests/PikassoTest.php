<?php

namespace Pikasso;

use Pikasso\Adapters\Adapter;

require_once __DIR__ . '/bootstrap.php';

/**
 * PikassoTest
 * @author Glynn Forrest <me@glynnforrest.com>
 */
class PikassoTest extends \PHPUnit_Framework_TestCase {

	public function testOpenReturnsAdapter() {
		$this->assertTrue(Pikasso::open(TEST_JPEG_FILE) instanceof Adapter);
	}

	public function testOpenThrowsExceptionOnFakePath() {
		$this->setExpectedException('\\Pikasso\\PikassoException');
		Pikasso::open('dummy');
	}

}
