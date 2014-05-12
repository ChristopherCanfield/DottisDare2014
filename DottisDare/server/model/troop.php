<?php
    class TroopInfo
	{
		private $troopId;
		private $lastAccessed;
		private $name;
		
		public function __construct($troopId, $lastAccessed, $name)
		{
			$this->troopId = $troopId;
			$this->lastAccessed = $lastAccessed;
			$this->name = $name;
		}
		
		public function troopId()
		{
			return $this->troopId;
		}
		
		public function lastAccessed()
		{
			return $this->lastAccessed;
		}
		
		public function name()
		{
			return $this->name;
		}
	}
?>