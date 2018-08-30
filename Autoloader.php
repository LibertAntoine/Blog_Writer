    
<?php 

class Autoloader
{
	
	function __construct()
	{
		$this->autoload();
	}

	public function autoload() {
		spl_autoload_register(function ($class_name) {
        		include  str_replace("\\", "/", $class_name) . '.php';
    	});
	}

}



    