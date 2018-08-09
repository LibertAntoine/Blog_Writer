<?php

abstract class BlogContent {

	protected $id, 
	$userId,  
	$content,
	$creationDate,
	$updateDate;


  	public function __construct(array $data)
  	{
   		 $this->hydrate($data);
  	}

	public function hydrate(array $data)
  	{
    	foreach ($data as $key => $value)
    	{
     	 	$method = 'set'.ucfirst($key);
      		if (method_exists($this, $method))
      		{
        		$this->$method($value);
      		}
      	}
    }

 	public function getId() 
 	{
 		return $this->id;
 	}

	public function getUserId()
	{
 		return $this->userId;
 	}


  	public function getContent() 
  	{
 		return $this->content;
	}

  	public function getCreationDate() 
  	{
 		return $this->content;
 	}

	public function setId($Id) 
	{
 		$Id = (int) $Id;
 		if ($Id > 0) 
 		{
 			$this->id = $Id;
 		}
	}

 	public function setUserId($userId) 
 	{
 		$userId = (int) $userId;
 		if ($userId > 0) 
 		{
 			$this->userId = $userId;
 		}
 	}

  	public function setContent($content) 
  	{
  		if (is_string($content)) 
  		{
 			$this->content = $content;
 		}
 	}
}


