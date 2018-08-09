<?php

class Article extends BlogContent {

	protected $title;

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
 	  return $this->content;
  }
}
