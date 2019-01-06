<?php
//
/**接口：
 * 接口只能被继承(使用关键词 implements),不能示列话
 * 接口成员：只有常量和方法
 * 方法为抽象方法，没有方法体，自带abstract关键字，
 * 接口常量是不能被重写的
 * 接口可以被接口继承,并支持多继承
 * 子类继承接口必须实现接口里的所有抽象方法
 * 
 * 
 * @author tiny
 *
 */
interface InterfaceHuman {
	const Name="人";
	public function eat();
}
interface Animal extends InterfaceHuman{
	
}

class man implements InterfaceHuman{
	public function eat(){
		echo self::Name;
	}
}

?>