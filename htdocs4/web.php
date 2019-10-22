<?php 
	use src\Core\Route;

	 // 모든 유저들이 갈수있는 경로
	Route::reg([
		['get', '/@MainController@main'],
		['get', '/:id@BlogController@myblog'],
		['get', '/:id/board/:midx/:page@BlogController@list'],
		// ['method_name', '/linkname@className@function_name']
	]);
	if(ss()){ // login한 유저들만 갈수있는 경로
		Route::reg([
			['get', '/user/logout@UserController@logout'],
			['get','/blog/myblog@BlogController@myblog'],
			['get','/blog/pre@BlogController@pre'],
			['get','/:id/write/:midx@BlogController@write'],
			['get','/:id/modify/:midx/:aidx@BlogController@modify'],
			['get','/:id/view/:midx/:aidx@BlogController@view'],
			['get','/:id/view_del/:midx/:aidx@BlogController@view_del'],
			['get','/:id/reply/:midx/:aidx@BlogController@reply'],
			['post','/blog/menu_action@BlogController@menu_action'],
			['post','/blog/board_action@BlogController@board_action'],
			['post','/pre/cre@BlogController@cre_action'],
			['post','/pre/del@BlogController@del_action'],
			['post','/blog/write_action@BlogController@write_action'],
			['post','/blog/modify_action@BlogController@modify_action'],
			['post','/blog/reply_action@BlogController@reply_action'],
			['post','/blog/coment_action@BlogController@coment_action'],
			['post','/blog/coment_del@BlogController@coment_del'],
			['post','/blog/coment_re@BlogController@coment_re'],
		]);
	}else{ // login안한 유저들만 갈수있는 경로
		Route::reg([
			['get', '/user/login@UserController@login'],
			['get', '/user/join@UserController@join'],
			['post', '/user/login_process@UserController@login_process'],
			['post', '/user/join_process@UserController@join_process'],
		]);
	}