<?php

abstract class DBAccess {
	
  protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}
}



