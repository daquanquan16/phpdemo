<?php
class SingleModel {
	public static $instance;
	private function __construct(){
		
	}
	public static function  getInstace(){
		if(!(self::$instance instanceof self)){
			self::$instance=new self();
		}
		return self::$instance;
	}
	public function test(){
		echo "test function";
	}
	private function __clone(){
		
	}
}
/* $single=SingleModel::getInstace();
print_r($single);
$single->test(); */
?>