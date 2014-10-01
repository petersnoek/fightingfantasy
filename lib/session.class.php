<?php

class session 
{
	function destroy()
	{
		// is there a session?
		if (session_status() == PHP_SESSION_ACTIVE)
		{
			// remove all session variables
			$_SESSION = array();

			// if we used session cookie, then destroy that too
			if (ini_get("session.use_cookies")) {
				$params = session_get_cookie_params();
				setcookie(session_name(), '', time() - 42000,
					$params["path"], $params["domain"],
					$params["secure"], $params["httponly"]
				);
			}		
		
			// now destroy the session
			session_destroy();
		}
		else
		{
			// no session, nothing to do
		}
	}
	
	function start()
	{
		// is there a session?
		if (session_status() == PHP_SESSION_ACTIVE)
		{
			// a session exist, nothing to do
		}
		else
		{
			session_start();
		}
	}
}