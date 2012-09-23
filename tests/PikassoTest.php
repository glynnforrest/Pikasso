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
		$this->assertTrue(Pikasso::open('dummy') instanceof Adapter);
	}

}