<?php
require('environment.php');


/**
 * The connection to the database.
 */
class Database 
{
	private static $db = null;
		
	private function __construct() 
	{
	}
	
	/**
	 * Connects to the database.
	 * @return true if successful, or false if not.
	 */
	private static function connect()
	{
		$environment = Environment::get();
		if ($environment === Environment::LOCAL)
		{
			$dsn = 'mysql:host=localhost;dbname=dottisdare';
		}
		else if ($environment === Environment::SERVER) 
		{
			$dsn = 'mysql:host=localhost;dbname=qgtlbkzc_dottisdare';
		}
		
		$username = 'qgtlbkzc_troop';
		$password = 'sIeRFCj97ttkbGS';
		$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		
		try {
			self::$db = new PDO($dsn, $username, $password, $options);
			return true;
		} catch (PDOException $e) {
			return false;
		}
	}
	
	/**
	 * Identifies whether the database object is connected to the database.
	 * @return true if the database is connected, or false if not.
	 */
	private static function isConnected()
	{
		return !is_null(self::$db);
	}
	
	/**
	 * Gets the troop name from the database, based on the provided troop id.
	 * @param $troopId the troop id number.
	 * @return the name of the troop, or null if no troop with the specified id exists.
	 */
	public static function getTroopName($troopId)
	{
		if (empty($troopId))
		{
			return null;
		}
		
		if (!self::isConnected())
		{
			if (!self::connect())
			{
				throw new Exception('Unable to connect to database');
			}
		}

		$db = self::$db;
		
		$sql = 'select Troop.name' 
			. ' from Troop'
			. ' where Troop.troopId = :troopId;';
		
		$query = $db->prepare($sql);
		$query->bindValue(':troopId', $troopId, PDO::PARAM_STR);

		$query->execute();
		
		$result = $query->fetch();
		if (!is_null($result))
		{
			$name = $result['name'];
		}
		else
		{
			$name = null;
		}
		$query->closeCursor();
		
		return $name;
	}
	
	/**
	 * Sets the clue's timeline order number.
	 * @param $troopId the troop's id.
	 * @param $clueId the clue's numeric id.
	 * @param $timelineNumber the clue's order in the timeline.
	 */
	public static function setClueTimelineOrder($troopId, $clueId, $timelineNumber)
	{
		if (!self::isConnected())
		{
			if (!self::connect())
			{
				throw new Exception('Unable to connect to database');
			}
		}
		
		$db = self::$db;
			
		$sql = 'update Timeline set timelineNumber = :timelineNumber ' .
				'where troopId = :troopId and clueId = :clueId;';

		$query = $db->prepare($sql);
		$query->bindValue(':timelineNumber', $timelineNumber, PDO::PARAM_INT);
		$query->bindValue(':troopId', $troopId, PDO::PARAM_STR);
		$query->bindValue(':clueId', $clueId, PDO::PARAM_INT);
		
		$query->execute();
		$query->closeCursor();
	}
}

?>