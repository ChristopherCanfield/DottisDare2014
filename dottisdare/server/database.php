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
		if (self::isConnected())
		{
			return;
		}
		
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
		
		if (!self::connect())
		{
			throw new Exception('Unable to connect to database');
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
		if (!self::connect())
		{
			throw new Exception('Unable to connect to database');
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
	
	/**
	 * Adds a clue for the specified troop.
	 * @param $troopId the troop to add the clue to.
	 * @param $clueId the id of the clue to add.
	 */
	public static function addClue($troopId, $clueId)
	{
		if (!self::connect())
		{
			throw new Exception('Unable to connect to database');
		}
		$db = self::$db;
		
		if (self::clueExists($troopId, $clueId))
		{
			// Clue already exists for this troop, so don't re-add it.
			return;
		}
		
		$clueCount = self::getClueCount($troopId);
		
		$sql = 'insert into Timeline ' .
				' (clueId, troopId, timelineNumber)' .
				' values (:clueId, :troopId, :timelineNumber);';
		
		$query = $db->prepare($sql);
		$query->bindValue(':troopId', $troopId, PDO::PARAM_STR);
		$query->bindValue(':clueId', $clueId, PDO::PARAM_INT);
		$query->bindValue(':timelineNumber', $clueCount);
		
		$query->execute();
	}
	
	private static function clueExists($troopId, $clueId)
	{
		if (!self::connect())
		{
			throw new Exception('Unable to connect to database');
		}
		$db = self::$db;
		
		$sql = 'select count(*) from Timeline ' .
				' where clueId = :clueId and troopId = :troopId;';
		
		$query = $db->prepare($sql);
		$query->bindValue(':troopId', $troopId, PDO::PARAM_STR);
		$query->bindValue(':clueId', $clueId, PDO::PARAM_INT);
		
		$query->execute();
		$result = $query->fetch();
		if (!is_null($result))
		{
			$exists = ($result['count'] > 0);
		}
		else
		{
			$exists = false;
		}
		$query->closeCursor();
		
		return $exists;
	}

	private static function getClueCount($troopId)
	{
		if (!self::connect())
		{
			throw new Exception('Unable to connect to database');
		}
		$db = self::$db;
		
		$sql = 'select count(*) from Timeline;';
		
		$query = $db->prepare($sql);
		$query->execute();
		
		$result = $query->fetch();
		return $result;
	}
	
	/**
	 * Gets all clues for the specified troop id.
	 * @param $troopId the id of the troop to return the clues for.
	 * @return a map of all clues for the specified troop. key: clue id; value: timeline number.
	 */
	public static function getClues($troopId)
	{
		if (empty($troopId))
		{
			return null;
		}
		
		if (!self::connect())
		{
			throw new Exception('Unable to connect to database');
		}
		$db = self::$db;
		
		$sql = 'select Timeline.clueId, Timeline.timelineNumber' 
			. ' from Timeline'
			. ' where Timeline.troopId = :troopId;';
		
		$query = $db->prepare($sql);
		$query->bindValue(':troopId', $troopId, PDO::PARAM_STR);

		$query->execute();
		
		$clues = array();
		$result = $query->fetch();
		while ($result != null) 
		{
			$clues[$result['clueId']] = $result['timelineNumber'];
			$result = $query->fetch();
		}
		$query->closeCursor();
		
		return $clues;
	}
}

?>