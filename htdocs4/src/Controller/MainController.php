<?php 
	namespace src\Controller;
	/**
	 * MainController
	 */
	use src\Core\DB;
	class MainController
	{
		public function main (){
			view("main", []);
		}
	}