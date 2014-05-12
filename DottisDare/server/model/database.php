<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/server/model/environment.php');



/**
 * Represents the restaurant's database.
 * Used to connect to the database
 */
class Database 
{
	private $db = null;
		
	public function __construct() 
	{
	}
	
	/**
	 * connects to the database
	 * @param PersonType $personType a PersonType constant
	 * @return true if successful, or false if not 
	 */
	public function connect($personType)
	{
		$environment = Environment::get();
		if ($environment === Environment::local)
		{
			$dsn = 'mysql:host=localhost;dbname=restaurant';
		}
		else if ($environment === Environment::godaddy) 
		{
			$dsn = 'mysql:host=restaurant3vR8kL.db.9906660.hostedresource.com;dbname=restaurant3vR8kL';
		}
		//enable when using locahost; disable when using godaddy account
	    
		$username = $this->getUserID($personType);
		$password = $this->getPassword($personType);
		$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
			
		try {
			$this->db = new PDO($dsn, $username, $password, $options);
			return $this->db;
		} catch (PDOException $e) {
			//TODO (cdc-2012-11-11): handle this error more effectively
			return null;
		}
	}
	
	/**
	 * returns the connected database, or throws an exception if the db is not connected
	 * @return the connected database, if successful
	 */
	public function get()
	{
		if (is_null($this->db)) {
			throw new Exception('The db object is not connected. Call connect before using the db object.');
		} else {
			return $this->db;
		}
	}
	
	/**
	 * identifies whether the database object is connected to the databse 
	 * @return true if the database is connected, or false if not
	 */
	public function isConnected()
	{
		return !is_null($this->db);
	}
	
	public function getTroopData()
	{
		throw new Exception('Not yet implemented');	
	}
}


?>