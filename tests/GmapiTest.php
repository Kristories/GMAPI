<?php

use Gmapi\Timelines;
use Gmapi\DistanceMatrix;
use Gmapi\Elevation;
use Gmapi\Geocoding;
use Gmapi\TimeZone;

class GmapiTest extends \PHPUnit_Framework_TestCase {

	/***************** TIMELINES *****************/
	public function testTimelines()
	{
		$timelines              = new Timelines();

		// Parameters
		$timelines->sensor      = FALSE;
		$timelines->origin      = 'Jakarta';
		$timelines->destination = 'Bekasi';

		// Protocol
		$timelines->protocol('http'); // Or http

		// Run
		$run                    = $timelines->run();
		
		$this->assertTrue(($run->status == 'OK'));
	}

	/***************** DISTANCE MATRIX *****************/
	public function testDistanceMatrix()
	{
		$dm 				= new DistanceMatrix();

		// Parameters
		$dm->sensor 		= FALSE;
		$dm->origins 		= 'Jakarta|Bekasi';
		$dm->destinations 	= 'Yogyakarta';

		// Protocol
		$dm->protocol('http'); // Or http

		// Run
		$run 				= $dm->run();

		$this->assertTrue(($run->status == 'OK'));
	}
	/***************** ELEVATION *****************/
	public function testElevation()
	{
		$elevation 				= new Elevation();

		// Parameters
		$elevation->sensor 		= FALSE;
		$elevation->locations 	= '-6.211544,106.845172|-6.233333,107.000000';

		// Protocol
		$elevation->protocol('http'); // Or http

		// Run
		$run 					= $elevation->protocol('https')->run();

		$this->assertTrue(($run->status == 'OK'));
	}

	/***************** GEOCODING *****************/
	public function testGeocoding()
	{
		$geocoding 				= new Geocoding();

		// Parameters
		$geocoding->sensor 		= FALSE;
		$geocoding->address 	= 'Jakarta';

		// Protocol
		$geocoding->protocol('http'); // Or http

		// Run
		$run 					= $geocoding->protocol('https')->run();

		$this->assertTrue(($run->status == 'OK'));
	}

	/***************** TIMEZONE *****************/
	public function testTimeZone()
	{
		$timezone 				= new TimeZone();

		// Parameters
		$timezone->sensor 		= FALSE;
		$timezone->location 	= '-6.211544,106.845172';
		$timezone->timestamp 	= time();

		// Run
		$run 					= $timezone->run();

		$this->assertTrue(($run->status == 'OK'));
	}
}


