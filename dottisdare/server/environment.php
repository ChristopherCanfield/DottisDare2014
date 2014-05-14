<?php

/**
 * The server environment.
 */
class Environment 
{
	const LOCAL = 0;
	const SERVER = 1;

	public static function get()
	{
		return Environment::LOCAL;
	}
}
?>