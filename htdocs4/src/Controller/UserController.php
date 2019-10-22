<?php 
	namespace src\Controller;
	/**
	 * User Controller
	 */
	use src\Core\DB;
	class UserController
	{
		public function login (){
			view("user/login", []);
		}
		public function join (){
			//$user= DB::fetchAll("SELECT * FROM users", []);
			//view("user/join", ["user"=> $user]);
			view("user/join", []);
		}
		public function login_process (){
			$id= $_POST['id'];
			$pw= $_POST['pw'];
			// login action ~~~~
			$row= DB::fetch("SELECT * FROM users WHERE id LIKE ? AND pw= ?", [$id, $pw]);
			if($row){
				$_SESSION['user']= $row;
				move("/", "로그인 성공");
			}
			move("/", "로그인 실패");
		}
		public function join_process (){
			$id= $_POST['id'];
			$pw= $_POST['pw'];
			$nickname= $_POST['nickname'];
			$username= $_POST['username'];
			// $img = $_FILES['img'];
			$intro = $_POST['intro'];
			
			if(!preg_match("/^([a-zA-Z0-9]+)@([a-zA-Z]+)(\.[a-zA-Z]+)*(\.[a-zA-Z]{2,3})$/", $id)){
				back("아이디는 이메일형식으로 입력해주세요.");
			}else if(!preg_match("/^(?=.*[a-zA-Z])(?=.*[0-9])([a-zA-Z0-9]{5,})$/", $pw)){
				back("비밀번호는 영문조합 5글자이상입니다.");
			}else if(!preg_match("/^([a-zA-Zㅏ-ㅣㄱ-ㅎ가-힣]+)$/u", $username)){
				back("이름은 한글영문으로 입력해주세요.");
			}else if(!preg_match("/^([a-zA-Zㄱ-ㅎ가-힣ㅏ-ㅣ0-9]{1,6})$/u", $nickname) || preg_match("/^([0-9]+)$/", $nickname)){
				back("닉네임은 한글영문숫자로 6글자이하, 단 숫자로만 입력 불가");
			}else{
				DB::exec("INSERT INTO users SET id=?,pw=?,username=?,nickname=?,intro=?",[$id,$pw,$username,$nickname,$intro]);
				move("/","회원가입 완료");
			}
			back("아이디 중복");
		}
		public function logout(){
			session_unset();
			move("/","로그아웃 완료");
		}
	}

