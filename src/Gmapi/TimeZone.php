<?php

namespace Gmapi;

class TimeZone {

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
	protected $_required = array('location', 'timestamp', 'sensor');

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
     * Running 
     * 
     * @return array|boolean
     */
	public function run()
	{
		$this->_check_required();

		$this->_params['sensor'] 	= $this->_params['sensor'] ? 'true' : 'false';
		$url 						= 'https://maps.googleapis.com/maps/api/timezone/json?';
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
		foreach ($this->_required as $value)
		{
			if(!isset($this->_params[$value]))
			{
				die('Required parameter : ' . $value);
			}
		}
	}
}