<?php

class player 
{
	function hit($points)
	{
		if (isset($_SESSION['player_hp']))
		{
			$_SESSION['player_hp'] -= intval($points);
		}
		else
		{
			$_SESSION['player_hp'] = - intval($points); 
		}
	}

}