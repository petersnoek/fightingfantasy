<?php

class stats 
{
	function render_html(&$player)
	{
		$html = "";
		
		$html .= "<div class='stats' style='padding: 5px; color:black; font-family:arial; font-size: bigger; border: 1px solid green; background-color: silver;'>" . "health: " . "</div>"; 
		
	
		return $html;
	}
}