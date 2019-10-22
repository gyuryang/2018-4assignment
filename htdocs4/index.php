<?php 
	session_start(); // session start

	require "lib.php"; // requrie library
	require "web.php"; // requrie web link 

	if(!src\Core\DB::fetch("SELECT * FROM users",[]))
		src\Core\DB::exec("INSERT INTO users SET id='admin', pw='1234',nickname='Master',username='관리자'",[]);
	
	src\Core\Route::init(); // router init