<?php 
	namespace src\Controller;

	use src\Core\DB;
	class BlogController{
		public function myblog($p){
			$arr = (object)["h"=>1];
			$arr->id = isset($p[1])? $p[1] : ss()->id;
			
			$arr->users = self::user($arr->id);
			$arr->menus = self::menus($arr->users->idx);
			
			view("blog/myblog",(array)$arr);
		}
		public function pre(){
			$arr = (object)[];
			$arr->users = DB::fetchAll("SELECT * FROM users ORDER BY idx DESC",[]);
			$arr->menu = DB::fetchAll("SELECT * FROM menu WHERE uidx=? ORDER BY idx DESC",[ss()->idx]);
			$arr->board = DB::fetchAll("SELECT * FROM board WHERE uidx=? ORDER BY idx DESC",[ss()->idx]);
			view("blog/pre",(array)$arr);
		}
		public function menu_action(){
			if(DB::fetch("SELECT * FROM menu WHERE name=?",[$_POST['menuname']]))
				back("메뉴 이름 중복");
			DB::exec("INSERT INTO menu SET name=?,uidx=?",[$_POST['menuname'],ss()->idx]);
			move("/blog/pre");
		}
		public function board_action(){
			if(!preg_match("/([a-zA-Z0-9]+)/", $_POST['name']))
				back("게시판 아이디는 영문과 숫자만 입력가능합니다.");
			if(DB::fetch("SELECT * FROM board WHERE name=?",[$_POST['name']]))
				back("게시판 이름 중복");
			DB::exec("INSERT INTO board SET name=?, uidx=?",[$_POST['name'],ss()->idx]);
			back();
		}
		public function cre_action(){
			DB::exec("UPDATE menu SET bidx=? WHERE idx=?",[$_POST['midx'],$_POST['idx']]);
		}
		public function del_action(){
			$table = $_POST['table'];
			DB::exec("DELETE FROM $table WHERE idx=?",[$_POST['idx']]);
		}
		public function view_del($p){
			$id = $p[1];
			$midx = $p[2];
			$aidx = $p[3];
			DB::exec("DELETE FROM article WHERE idx=?",[$aidx]);
			// $bidx = DB::fetch("SELECT * FROM menu WHERE idx=?",[$midx])->bidx;
			// DB::exec("UPDATE menu SET cnt=cnt-1 WHERE bidx=?",[$bidx]);
			move("/$id/board/$midx/1");
		}
		public function write($p){
			$arr = (object)["h"=>1];
			$arr->id = $p[1];
			$arr->midx = $p[2];

			$arr->users = self::user($arr->id);
			$arr->menus = self::menus($arr->users->idx);
			$arr->menu = self::menu($arr->users->idx, $arr->midx);
			$arr->bidx = $arr->menu->bidx;
			$arr->writer = ss()->id;

			view("blog/write", (array)$arr);
		}
		public function write_action(){
			$id = $_POST['id'];
			$midx = $_POST['midx'];
			DB::exec("INSERT INTO article SET title=?, writer=?, write_date = now(),content=?,gorder=1,depth=1,bidx=?",[$_POST['title'],$_POST['writer'],$_POST['content'],$_POST['bidx']]);
			// $cnt = DB::fetch("SELECT COUNT(*) as cnt FROM article WHERE bidx=?",[$_POST['bidx']])->cnt;
			$idx = DB::lastInsertId();
			// DB::exec("UPDATE menu SET cnt=? WHERE bidx=?",[$cnt,$_POST['bidx']]);
			DB::exec("UPDATE article SET gid=? WHERE idx=?",[$idx,$idx]);
			move("/$id/board/$midx/1");
		}
		public function modify($p){
			$arr = (object)["h"=>1];
			$arr->id = $p[1];
			$arr->midx = $p[2];
			$arr->aidx = $p[3];

			$arr->users = self::user($arr->id);
			$arr->menus = self::menus($arr->users->idx);
			$arr->writer = ss()->id;

			view("blog/modify", (array)$arr);
		}
		public function modify_action(){
			$id = $_POST['id'];
			$midx = $_POST['midx'];
			$aidx = $_POST['aidx'];

			DB::exec("UPDATE article SET title=?,content=? WHERE idx=?",[$_POST['title'],$_POST['content'],$aidx]);
			move("/$id/view/$midx/$aidx");
		}
		public function reply($p){
			$arr = (object)["h"=>1];
			$arr->id = $p[1];
			$arr->midx = $p[2];
			$arr->aidx = $p[3];

			$arr->users = self::user($arr->id);
			$arr->menus = self::menus($arr->users->idx);
			$arr->writer = ss()->id;
			view("blog/reply",(array)$arr);
		}
		public function reply_action(){
			$id = $_POST['id'];
			$midx = $_POST['midx'];
			$aidx = $_POST['aidx'];

			$parent = DB::fetch("SELECT * FROM article WHERE idx=?",[$aidx]);
			DB::exec("UPDATE article SET gorder=gorder+1 WHERE gid= ? AND gorder>?",[$parent->gid,$parent->gorder]);
			DB::exec("INSERT INTO article SET title=?, writer=?,write_date=now(),content=?,gid=?,gorder=?,depth=?,bidx=?",[$_POST['title'],$_POST['writer'],
				$_POST['content'],$parent->gid,$parent->gorder+1,$parent->depth+1,$parent->bidx]);
			$idx = DB::lastInsertId();
			move("/$id/view/$midx/$idx");
		}
		public function coment_action(){
			DB::exec("INSERT INTO coment SET content=?,uidx=?,aidx=?,write_date=now()",[$_POST['content'],ss()->idx,$_POST['aidx']]);
			back();
		}
		public function coment_del(){
			DB::exec("DELETE FROM coment WHERE idx=?",[$_POST['idx']]);
			back();
		}
		public function coment_re(){
			DB::exec("UPDATE coment SET content=? WHERE idx=?",[$_POST['content'],$_POST['idx']]);
			back();
		}
		public function list($p){
			$arr = (object)["h"=>1];
			$arr->id = $p[1];
			$arr->midx = $p[2];

			$arr->users = self::user($arr->id);
			$arr->menus = self::menus($arr->users->idx);
			$arr->menu = self::menu($arr->users->idx, $arr->midx);
			$arr->bidx = $arr->menu->bidx;
			
			$arr->page = $p[3];
			$arr->i = 10;
			$arr->j = 0;

			$arr->articles = DB::fetchAll("SELECT * FROM article WHERE bidx=? ORDER BY gid DESC, gorder ASC",[$arr->bidx]);
			view("blog/myblog", (array)$arr);
		}
		public function view($p){
			$arr = (object)["h"=>1];
			$arr->id = $p[1];
			$arr->midx = $p[2];
			$arr->aidx = $p[3];

			$arr->users = self::user($arr->id);
			$arr->menus = self::menus($arr->users->idx);
			$arr->menu = self::menu($arr->users->idx, $arr->midx);
			$arr->bidx = $arr->menu->bidx;
			$arr->writer = ss()->id;

			$arr->coment = DB::fetchAll("SELECT c.*,u.username,u.nickname FROM coment as c JOIN (SELECT * FROM users) as u ON c.uidx=u.idx AND c.aidx=? ORDER BY c.idx DESC ",[$arr->aidx]);
			$arr->article = DB::fetch("SELECT * FROM article WHERE idx=?",[$arr->aidx]);
			DB::exec("UPDATE article SET hit=hit+1 WHERE idx=?",[$arr->aidx]);
			view("blog/view", (array)$arr);
		}
		public function user($id){
			$row = DB::fetch("SELECT * FROM users WHERE id=?",[$id]);
			return $row;
		}
		public function menus($uidx){
			$row = DB::fetchAll("SELECT m.*, IFNULL(a.cnt,0) as cnt FROM menu as m LEFT JOIN (SELECT COUNT(*) as cnt , bidx FROM article GROUP BY bidx) as
			   a ON a.bidx = m.bidx WHERE m.uidx=?",[$uidx]);
			
			return $row;
		}
		public function menu($uidx, $idx){
			$menu = DB::fetch("SELECT * FROM menu WHERE uidx=? AND idx=?",[$uidx,$idx]);
			return $menu;
		}
	}
