<?php

/**
 * The server environment.
 * Set this in /model/session.php
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