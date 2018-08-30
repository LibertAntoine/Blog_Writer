<?php

namespace Model;

abstract class DBAccess {
	
  protected $db;

	public function __construct()
	{
		$db = new \PDO('mysql:host=localhost;dbname=ingenusprb476', 'root', '');
		$this->db = $db;
	}
}



