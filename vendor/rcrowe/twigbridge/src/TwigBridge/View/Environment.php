<?php

/**
 * Brings Twig to Laravel 4.
 *
 * @author Rob Crowe <hello@vivalacrowe.com>
 * @license MIT
 */

namespace TwigBridge\View;

use Illuminate\View\Environment as BaseEnvironment;

/**
 * Overrides default environment object so that we can override view object.
 */
class Environment extends BaseEnvironment
{
	public $extraData = array();

	public function addGlobal($key,$value) {
			$this->extraData['Global'][$key] = $value;
	}

    /**
     * {@inheritdoc}
     */
    public function make($view, $data = array(), $mergeData = array())
    {
        $path = $this->finder->find($view);
        $data = array_merge($mergeData, $this->parseData($data));
        $data = array_merge($data,$this->extraData);
        return new View($this, $this->getEngineFromPath($path), $view, $path, $data);
    }
}
