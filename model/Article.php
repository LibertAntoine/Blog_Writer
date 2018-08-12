<?php

class Article extends BlogContent {

	protected $title,
  $updateDate;

  public function getTitle() 
  {
 	  return $this->title;
 	}


  public function setTitle($title) 
  {
 	  if (is_string($title) && strlen($title) < 240) 
    {
 		   $this->title = $title;
 	  }
  }

  public function getUpdateDate() 
  {
 	  return $this->updateDate;
  }

  public function setUpdateDate($updateDate) 
  {
    if (is_string($updateDate)) 
    {
      $this->updateDate = $updateDate;
    }
  }


}
