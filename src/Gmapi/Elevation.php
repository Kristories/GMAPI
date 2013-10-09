<?php

namespace Gmapi;

class Elevation {

	/**
	 * Request Parameters
	 * 
	 * @var array
	 */
	protected $_params = array();

	/**
	 * Required parameters
	 * 
	 * @var array
	 */
	protected $_required = array('sensor');

	/**
	 * Protocol
	 * 
	 * @var string
	 */
	protected $_protocol = 'http';

	/**
	 * __set() is run when writing data to inaccessible properties.
	 * 
	 * @param string $name 
	 * @param string $value
	 */
	public function __set($name, $value)
    {
    	$this->_params[$name] = $value;
    }

    /**
     * Set protocol
     * 
     * @param  string $value
     * @return void       
     */
    public function protocol($value = 'http')
    {
    	$value 				= ($value == 'https') ? 'https' : 'http';
    	$this->_protocol 	= $value;
    	return $this;
    }

    /**
     * Running 
     * 
     * @return array|boolean
     */
	public function run()
	{
		$this->_check_required();

		$this->_params['sensor'] 	= $this->_params['sensor'] ? 'true' : 'false';
		$url 						= $this->_protocol . '://maps.googleapis.com/maps/api/elevation/json?';
		$params 					= http_build_query($this->_params);
		$content 					= file_get_contents($url.$params);
		$content 					= json_decode($content);

		return ($content->status == 'OK') ? $content : FALSE;
	}

	/**
	 * Check required parameters
	 */
	public function _check_required()
	{
		$r = array();

		if(!isset($this->_params['locations']) AND !isset($this->_params['path']))
		{
			$r[] = 'locations';
		}
		
		if(isset($this->_params['path']))
		{
			if(!isset($this->_params['samples']))
			{
				$r[] = 'samples';
			}
		}
		
		$this->_required = array_merge($this->_required, $r);

		foreach ($this->_required as $value)
		{
			if(!isset($this->_params[$value]))
			{
				die('Required parameter : ' . $value);
			}
		}
	}
}