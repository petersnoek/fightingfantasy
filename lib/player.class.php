<?php

class player 
{
	function get_hp()
	{
		if (isset($_SESSION['player_hp']))
		{
			return $_SESSION['player_hp'];
		}
		else
		{
			return 0;
		}
	}

	function hit($points)
	{
		if (isset($_SESSION['player_hp']))
		{
			$_SESSION['player_hp'] -= intval($points);
		}
		else
		{
			$_SESSION['player_hp'] = -intval($points); 
		}
	}

	function heal($points)
	{
		if (isset($_SESSION['player_hp']))
		{
			$_SESSION['player_hp'] += intval($points);
		}
		else
		{
			$_SESSION['player_hp'] = intval($points); 
		}
	}
}