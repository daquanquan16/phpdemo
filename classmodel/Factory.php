<?php
interface order{
	public function createOrder();
}

class orderA implements order {
	public function createOrder(){
		echo 'class:'.__METHOD__."function:".__FUNCTION__;
	}
}
class orderB implements order {
	public function createOrder(){
		echo 'class:'.__METHOD__."function:".__FUNCTION__;
	}
}

class Factory {
	public static function createObject($classFlag){
		
		switch ($classFlag){
			case "A":
				return  new orderA();
			case "B":
				return  new orderB();
		    default:
		    	return false;
		}
	}
	
}


/* $f=Factory::createObject("A");
print_r($f);
$f->createOrder();
 */
?>