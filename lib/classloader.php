<?php

// include class file for session, create session object, start session
require '.\lib\session.class.php';
$session = new session();

// include class file for location
require '.\lib\location.class.php';
$location = new location();

// include class file for debug footer
require '.\lib\debug.class.php';
$debug = new debug();

// include class file for html
require '.\lib\html.class.php';
$html = new html();

// include class file for html
require '.\lib\player.class.php';
$player = new player();

include '.\lib\templatepower.class.php';

?>