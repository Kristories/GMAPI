# Google Maps API Web Services

### Directions API

The Google Directions API is a service that calculates directions between locations using an HTTP request. You can search for directions for several modes of transportation, include transit, driving, walking or cycling. Directions may specify origins, destinations and waypoints either as text strings (e.g. "Chicago, IL" or "Darwin, NT, Australia") or as latitude/longitude coordinates. The Directions API can return multi-part directions using a series of waypoints.

	use Gmapi\Timelines;

	$timelines              = new Timelines();
	
	// Parameters
	$timelines->sensor      = FALSE;
	$timelines->origin      = 'Jakarta';
	$timelines->destination = 'Bekasi';
	
	// Protocol
	$timelines->protocol('https'); // Or http
	
	// Run
	$run                    = $timelines->run();

---

### Distance Matrix

The Google Distance Matrix API is a service that provides travel distance and time for a matrix of origins and destinations. The information returned is based on the recommended route between start and end points, as calculated by the Google Maps API, and consists of rows containing duration and distance values for each pair.

	use Gmapi\DistanceMatrix;

	$dm 					= new DistanceMatrix();
	
	// Parameters
	$dm->sensor				= FALSE;
	$dm->origins 			= 'Jakarta|Bekasi';
	$dm->destinations 		= 'Yogyakarta';
	
	// Protocol
	$dm->protocol('https'); // Or http
	
	// Run
	$run 					= $dm->run();

---

### Elevation

The Elevation API provides elevation data for all locations on the surface of the earth, including depth locations on the ocean floor (which return negative values). In those cases where Google does not possess exact elevation measurements at the precise location you request, the service will interpolate and return an averaged value using the four nearest locations.

	use Gmapi\Elevation;

	$elevation 				= new Elevation();
	
	// Parameters
	$elevation->sensor 		= FALSE;
	$elevation->locations 	= '-6.211544,106.845172|-6.233333,107.000000';
	
	// Protocol
	$elevation->protocol('https'); // Or http
	
	// Run
	$run 					= $elevation->run();
	
---

### Geocoding

Geocoding is the process of converting addresses (like "1600 Amphitheatre Parkway, Mountain View, CA") into geographic coordinates (like latitude `37.423021` and longitude `-122.083739`), which you can use to place markers or position the map.

	use Gmapi\Geocoding;

	$geocoding 				= new Geocoding();
	
	// Parameters
	$geocoding->sensor 		= FALSE;
	$geocoding->address		= 'Jakarta';
	
	// Protocol
	$geocoding->protocol('https'); // Or http
	
	// Run
	$run					= $geocoding->run();

---

### Time Zone

The Time Zone API provides time offset data for locations on the surface of the earth. Requesting the time zone information for a specific Latitude/Longitude pair will return the name of that time zone, the time offset from UTC, and the Daylight Savings offset.

	use Gmapi\TimeZone;

	$timezone 				= new TimeZone();
	
	// Parameters
	$timezone->sensor 		= FALSE;
	$timezone->location		= '-6.211544,106.845172';
	$timezone->timestamp 	= time();
	
	// Run
	$run 					= $timezone->run();
