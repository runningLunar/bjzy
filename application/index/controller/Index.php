<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2017-09-25 14:31:07
 * @version $Id$
 */
	namespace app\index\controller;

	class Index extends \think\Controller{
		public function index(){
	    	return $this->fetch(); 
		}

		public function person(){
			return $this->fetch();
		}

		public function personlist(){
			return $this->fetch();
		}
	} 
?>
