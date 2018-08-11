<?php

abstract class DBAccess {
	
  protected $db;

	public function __construct()
	{
		$db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
		$this->db = $db;
	}
}



