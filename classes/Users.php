<?
include("./admin/config.php");
class Users{ 
 
	public function getUserDataById($userid){ 
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$sql = "SELECT * FROM user		
		WHERE id = ".$userid; 
	 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		$row = $st->fetch(); 
		 
		return $row; 
	} 
	public function changeData($id){ 
		$numb = $_POST['numb']; 
		$addr = $_POST['addr']; 
		$realname = $_POST['realname']; 
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		if(isset($_FILES['image'])){ 
			$uploaddir = './avatar/'; 
			$uploadfile = $uploaddir . basename($_FILES['image']['name']); 
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile); 
			$image = DOMAIN.'/avatar/'.$_FILES['image']['name']; 
			$sql = "UPDATE user SET number = '".$numb."',realname = '".$realname."',addr1='".$addr."', avatar='".$image."' WHERE id='".$id."'"; 
		}else{ 
			$sql = "UPDATE user SET number = '".$numb."',realname = '".$realname."',addr1='".$addr."' WHERE id='".$id."'"; 
		} 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		header('Refresh:0'); 
	} 
	private function generateCode($length=6) { 
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789"; 
	$code = ""; 
	$clen = strlen($chars) - 1;   
	 
	while (strlen($code) < $length) { 
			$code .= $chars[mt_rand(0,$clen)];   
	}	 
	return $code; 
     
	}
	public function check(){		 
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		 
		if(isset($_COOKIE['id'])){ 
		$sql = "SELECT id, username, password, hash FROM `user` WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1"; 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		$userdata = $st->fetch(); 
	 
		if(($userdata['hash'] !== $_COOKIE['hash']) or ($userdata['id'] !== $_COOKIE['id']) or ( $_COOKIE['hash']=='' ) or ($_COOKIE['id'] == '')){ 
			return 'unloginned'; 
		} 
		else{ 
			return 'loginned'; 
		} 
		}else{ 
			return 'unloginned'; 
		} 
	} 
	public function login(){ 
		$username = $_POST['usname']; 
		$password = $_POST['password']; 
		 
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$sql = "SELECT id, password FROM `user` WHERE username='".$username."' LIMIT 1"; 
		$st = $conn->prepare( $sql ); 
		$st->execute(); 
		$data = $st->fetch(); 
		if($data['password'] == md5($password)){ 
			 
			$hash = md5($this->generateCode(10)); 
			$sql1 = "UPDATE `user` SET hash='".$hash."' WHERE username='".$username."'"; 
			$st1 = $conn->prepare( $sql1 ); 
			$st1->execute(); 
			
			setcookie("id", $data['id'], time()+60*60*24*30); 
			setcookie("hash", $hash, time()+60*60*24*30); 
			
			header("Location: index.php"); exit(); 
			
		} 
		else{ 
			echo 'Wrong password!'; 	
		}
	} 
	public function logout(){ 
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$sql = "UPDATE `user` SET hash='' WHERE id='".$_COOKIE['id']."'"; 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 

		header('Location:index.php'); 
	} 
	public function register(){ 
		$username = $_POST['username']; 
		$password = $_POST['pass']; 
		$mail = $_POST['mail']; 
				
		$hash = md5($this->generateCode(10)); 
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$sql = "INSERT INTO user(username,password,hash,email) VALUES ('".$username."','".md5($password)."','".$hash."','".$mail."')"; 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		setcookie("id", $data['id'], time()+60*60*24*30); 
		setcookie("hash", $hash, time()+60*60*24*30); 
		header("Location: index.php"); exit(); 
		
	} 
	
	public function addMail(){
		$mail = $_POST['mailss'];
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$sql = "INSERT INTO mails(mail) VALUES ('".$mail."')"; 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		
	}
} 


?>