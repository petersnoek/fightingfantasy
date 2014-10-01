<?php

class html 
{

	function render_start_html($view_bag)
	{
		$title = ( isset($view_bag['page_title']) ? $view_bag['page_title'] : "Page");
		$html = "";
		
		$html .= "<!doctype html>" . "\n";
		$html .= "<html>" . "\n";
		$html .= "<head>" . "\n";
		$html .= "	<title>" . $title . "</title>" . "\n";
		$html .= "	<link href='css/style.css' rel='stylesheet' type='text/css'>" . "\n";
		$html .= "</head>" . "\n";

		$html .= "<body>" . "\n";	
		
		if ( isset($view_bag['errormsg']) && strlen(trim($view_bag['errormsg']))>0 )
		{
			$html .= "<div class='error' style='padding: 5px; color:black; font-family:arial; font-size: bigger; border: 1px solid red; background-color: pink;'>(error) " . $view_bag['errormsg'] . "</div>"; 
		}
		
		
		if ( isset($view_bag['statusupdate']) && strlen(trim($view_bag['statusupdate']))>0 )
		{
			$html .= "<div class='statusupdate' style='padding: 5px; color:black; font-family:arial; font-size: bigger; border: 1px solid green; background-color: lightgreen;'>(statusupdate) " . $view_bag['statusupdate'] . "</div>"; 
		}
		
		return $html;
	}
	
	function render_end_html()
	{
		$html = "";
		
		$html .= "</body>" . "\n";
		$html .= "</html>" . "\n";
		
		return $html;	
	}
}