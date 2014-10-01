<?php

define("MAX_LOCATION", 300);

class location 
{	
	// this function is call when class is created
	function __construct ()
	{
		// load current location from session
	}
	
	// use .get_current_location_id() and retrieve data
	function get_location_name()
	{
		switch ( self::get_current_location_id() )
		{
			case 1:
				return "Hallway";
				break;
			case 2:
				return "Forest";
				break;
			case 3:
				return "Dungeon";
				break;				
			default:
				return "Default";
		}

	}
	
	// get the current location (from session)
	// returns integer > 0 when location is valid;
	// returns 0 when location is not valid;
	function get_current_location_id()
	{
		$newlocation = 0;
		
		// check if the session contains 'current_location',
		// else return 0
		if ( isset ( $_SESSION['current_location'] ) )
		{
			$session_location = $_SESSION['current_location'];
			
			// check if location is valid integer
			if ( is_int($session_location) ) 
			{
				// check if location is > 0 and < max 
				if( $session_location > 0 && $session_location < MAX_LOCATION )
				{
					// everything is ok; store the new location
					$newlocation = $session_location;
				}
			}
		}
		// if session was set, and current_location is an integer, and current_location > 0 and < max,
		// then $newlocation contains the new location. Otherwise, $newlocation = 0;
		return $newlocation;
	}

	function move_to_location($location)
	{
		$error = false;
		
		// check if given location is valid integer
		if ( is_int($location) ) 
		{
			// check if location is > 0 and < max 
			if( false == ( $location > 0 && $location < MAX_LOCATION ) )
			{
				$error = true;
			}
		}
		else
		{ 
			$error = true;
		}	
		
		// no errors? then set location in session. else: die.
		if ($error == false)
		{			
			// check if we are already on this location
			if ( isset($_SESSION['current_location']) )
			{
				if ($_SESSION['current_location'] != $location )
				{
					// set new location in session
					$_SESSION['current_location'] = $location;	
				}
				else
				{
					// nothing to do, current and new location are the same
				}
			}
			else
			{ 
				// no current location, just set it
				$_SESSION['current_location'] = $location;
			}
		}

	}

	function render_html()
	{	
		$html = "";
		
		$html .= "<h1>" . self::get_location_name() . "</h1>";
	
		return $html;
	}

}

?>