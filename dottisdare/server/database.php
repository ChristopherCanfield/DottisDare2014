<?php
require_once('environment.php');

class Clue
{
	private $clueId;
	private $clueDescription;
	private $location;
	
	public function __construct($id, $description, $location)
	{
		$this->clueId = $id;
		$this->clueDescription = $description;
		$this->location = $location;
	}
	
	public function getId()
	{
		return $this->clueId;
	}
	
	public function getDescription()
	{
		return $this->clueDescription;
	}
	
	public function getLocation()
	{
		return $this->location;
	}
}


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
			return true;
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
		// Note: Update to correct password when moving to production.
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
	
	public static function clueExists($troopId, $clueId)
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
		$result = $query->fetch(PDO::FETCH_NUM);
		if (!is_null($result))
		{
			$exists = ($result[0] > 0);
		}
		else
		{
			$exists = false;
		}
		$query->closeCursor();
		
		return $exists;
	}

	/**
	 * Returns the number of clues.
	 * @param $troopId the troop's id.
	 * @return the count of the number of clues.
	 */
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
		
		$result = $query->fetch(PDO::FETCH_NUM);
		return $result[0];
	}
	
	/**
	 * Returns all clues, including those that haven't yet been found.
	 * @return a map of all clues for the specified troop. key: clue id; value: Clue object.
	 */
	public static function getAllClues()
	{
		return self::getClues(null);	
	}
	
	/**
	 * Gets all clues for the specified troop id. The clues are returned in the timeline order set
	 * by the team.
	 * @param $troopId the id of the troop to return the clues for, or null to return all clues.
	 * @return a map of all clues for the specified troop. key: clue id; value: Clue object.
	 */
	public static function getClues($troopId)
	{		
		if (!self::connect())
		{
			throw new Exception('Unable to connect to database');
		}
		$db = self::$db;
		
		$sql = 'SELECT Clue.id, Clue.description, Clue.location
				FROM Clue';
		if (!empty($troopId))
		{
			$sql .= ' inner join Timeline
						ON Clue.id = Timeline.clueId 
						where Timeline.troopId = :troopId 
						ORDER BY Timeline.timelineNumber ASC';
		} 
		
		$query = $db->prepare($sql);
		if (!empty($troopId))
		{
			$query->bindValue(':troopId', $troopId, PDO::PARAM_STR);
		}

		$query->execute();
		
		$clues = array();
		$result = $query->fetch();
		while ($result != null) 
		{
			$clueId = $result['id'];
			$description = $result['description'];
			$location = $result['location'];
				
			$clue = new Clue($clueId, $description, $location);
			$clues[$clueId] = $clue;
			
			$result = $query->fetch();
		}
		$query->closeCursor();
		
		return $clues;
	}
	
	/**
	 * Gets a clue's description.
	 * @param $clueId the clue's id.
	 * @return the clue's description.
	 */
	public static function getClueDescription($clueId)
	{
		if (!self::connect())
		{
			throw new Exception('Unable to connect to database');
		}
		$db = self::$db;
		
		$sql = 'select Clue.description' 
			. ' from Clue'
			. ' where Clue.id = :clueId;';
		
		$query = $db->prepare($sql);
		$query->bindValue(':clueId', $clueId, PDO::PARAM_INT);
		$query->execute();
		
		$result = $query->fetch();
		$description = null;
		if (!is_null($result))
		{
			$description = $result['description'];
		}
		$query->closeCursor();
		
		return $description;
	}
	
	/**
	 * Sets whether the troop has submitted its timeline.
	 * @param $troopId the troop's id.
	 * @param $submitted true if the troop has submitted its timeline, or false if not.
	 */
	public static function setTimelineSubmitted($troopId, $submitted)
	{
		if (!self::connect())
		{
			throw new Exception('Unable to connect to database');
		}
		$db = self::$db;

		$sql = 'update Troop ' .
				' set submitted=:submitted' .
				' where troopId=:troopId;';
		
		$query = $db->prepare($sql);
		$query->bindValue(':troopId', $troopId, PDO::PARAM_STR);
		$query->bindValue(':submitted', $submitted, PDO::PARAM_BOOL);
		
		$query->execute();
	}
	
	/**
	 * Gets whether the specified troop submitted its timeline.
	 * @param $troopId the troop's id.
	 * @return whether the specified troop has submitted its timeline.
	 */
	public static function getTimelineSubmitted($troopId)
	{
		if (!self::connect())
		{
			throw new Exception('Unable to connect to database');
		}
		$db = self::$db;
		
		$sql = 'select Troop.submitted' 
			. ' from Troop'
			. ' where Troop.troopId = :troopId;';
		
		$query = $db->prepare($sql);
		$query->bindValue(':troopId', $troopId, PDO::PARAM_STR);
		$query->execute();
		
		$result = $query->fetch();
		$query->closeCursor();
		
		return $result;
	}
}

?>