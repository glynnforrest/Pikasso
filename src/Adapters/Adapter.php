<?php

namespace Pikasso\Adapters;

/**
 * Adapter
 * @author Glynn Forrest me@glynnforrest.com
 **/
abstract class Adapter {

	abstract public function __construct($path);

	abstract public function getWidth();

	abstract public function getHeight();
}
