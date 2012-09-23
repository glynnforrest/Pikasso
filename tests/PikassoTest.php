<?php

namespace Pikasso;

use Pikasso\Adapters\Adapter;

require_once __DIR__ . '/bootstrap.php';

/**
 * PikassoTest
 * @author Glynn Forrest <me@glynnforrest.com>
 */
class PikassoTest extends \PHPUnit_Framework_TestCase {

	protected static $jpeg_file;

	public function __construct() {
		self::$jpeg_file = __DIR__ . '/jackie-chan.jpg';
	}

	public function testOpenReturnsAdapter() {
		$this->assertTrue(Pikasso::open(self::$jpeg_file) instanceof Adapter);
	}

	public function testOpenThrowsExceptionOnFakePath() {
		$this->setExpectedException('\\Pikasso\\PikassoException');
		Pikasso::open('dummy');
	}

}
