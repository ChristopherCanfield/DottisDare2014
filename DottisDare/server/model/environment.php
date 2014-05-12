<?php

/**
 * The server environment.
 * Set this in /model/session.php
 */
class Environment 
{
	const LOCAL = 0;
	const SERVER = 1;
	const DEFAULT_SETTING = Environment::local;
	
	public static function set($value)
	{
		if ($value == Environment::LOCAL || $value == Environment::SERVER)
		{
			$GLOBALS['runtime_environment'] = $value; 			
		}
		else
		{
			throw new Exception('Invalid value provided to Environment::set');
		}
	}
	
	Public static function get()
	{
		if (isset($GLOBALS['runtime_environment']))
		{
			return $GLOBALS['runtime_environment'];
		}
		else
		{
			$GLOBALS['runtime_environment'] = Environment::DEFAULT_SETTING;
			return $GLOBALS['runtime_environment'];
		}
	}
}
?>