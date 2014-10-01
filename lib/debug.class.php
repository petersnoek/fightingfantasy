<?php

class debug 
{
	function render_debug()
	{
		$html = "";
		
		$html .= '<div class="footer" style="float: left; padding: 5px; border: 1px solid silver; margin-top: 2em; font-family: tahoma; font-size: 8pt; color: gray;">';
	
		// display current session status
		$status = session_status();
		$statusmsg = "";
		switch ( $status ) {
			case PHP_SESSION_DISABLED:
				$statusmsg = "PHP_SESSION_DISABLED";
				break;
			case PHP_SESSION_NONE:
				$statusmsg = "PHP_SESSION_NONE";
				break;			
			case PHP_SESSION_ACTIVE:
				$statusmsg = "PHP_SESSION_ACTIVE";
				break;				
			default:
				$statusmsg = "(could not determine)";				
		}
		$html .=  'session status: ' . $statusmsg . '<br>';		
	
		
		// print $_GET
		$html .=  '<pre>$_GET[]<br>';
		ob_start();
		var_dump($_GET);
		$result = ob_get_clean();
		$html .=  $result.'</pre>';
		
		// print $_SESSION
		$html .=  '<pre>$_SESSION[]<br>';
		ob_start();
		var_dump($_SESSION);
		$result = ob_get_clean();
		$html .=  $result.'</pre>';
		

		$html .=  '<br><br><a href="/session/destroy">session_stop()</a><br>';	

		$html .=  '</div>';
		
		return $html;
	}
}