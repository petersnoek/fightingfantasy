<?php

// load all classes, i $session, $location, $debug and $html
require '.\lib\classloader.php';

// start session, using my own session class
$session->start();

$errormsg = "";
$statusupdate = "";

// what action was given in url  (ex: http://webserver/location/8 )
if ( isset ( $_GET['action'] ) ) {
	$params = explode("/", $_GET['action']);
	
	// depending on the given action, take the right action
	// supported commands are:
	// localhost/location/1
	// localhost/session/destroy
	switch ($params[0])
	{
		case "flee":
			$player->hit(5);
			break;
		case "location":
			if ( isset($params[1]) )
			{
				$location->move_to_location(intval($params[1]));
			}
			else
			{
				$errormsg .= 'location: missing location id.' ;
			}
			break;
		case "session":
			if ( isset($params[1]))
			{
				if ( $params[1] == "destroy" )
				{
					$session->destroy();
					$errormsg .=  'session destroyed';
				}
			}
			else
			{
				$errormsg .=  'session: missing session command';
			}
			break;
		default:
			$errormsg .= "unknown command: \"" . $_GET['action'] . "\"";
	}
}
else
{
	// nothing passed as url (ex: http://webserver/) so go to homepage
	$errormsg .= "no command given.";
}


//make a new TemplatePower object
$tpl = new TemplatePower( "./html/default-page.tpl.html" );

//let TemplatePower do its thing, parsing etc.
$tpl->prepare();

//assign a value to {pagetitle}
$tpl->assign( "pagetitle", $location->location_name() );
$tpl->assign("debug", $debug->render_debug() );

//create a new "error" block
if ( strlen(trim($errormsg))>0 )
{
	$tpl->newBlock("error");
	$tpl->assign("errormsg", $errormsg );
}

//create a new "status" block
if ( strlen(trim($statusupdate))>0 )
{
	$tpl->newBlock("status");
	$tpl->assign("statusupdate", $statusupdate );
}

//create a new "stats" block
$tpl->newBlock("stats");
$tpl->assign("health", 10 );
$tpl->assign("stamina", 10 );
$tpl->assign("xp", 0 );

//create a couple of "inventory" rows
$tpl->newBlock("inventory");
$tpl->assign("item", "torch" );
$tpl->assign("count", 3 );
$tpl->newBlock("inventory");
$tpl->assign("item", "sword" );
$tpl->assign("count", 1 );
$tpl->newBlock("inventory");
$tpl->assign("item", "gold" );
$tpl->assign("count", 1 );

//create "location" block
$tpl->newBlock("location");
$tpl->assign("l_name", $location->location_name() );
$tpl->assign("l_description", "Heel uitgebreid verhaal." );


//print the result
$tpl->printToScreen();

?>