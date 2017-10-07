<?
include("./config.php");
class Admin{
	
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
		 
		if(isset($_COOKIE['idadmin'])){ 
		$sql = "SELECT id, username, password, hash FROM `admin` WHERE id = '".intval($_COOKIE['idadmin'])."' LIMIT 1"; 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		$userdata = $st->fetch(); 
	 
		if(($userdata['hash'] !== $_COOKIE['hashadmin']) or ($userdata['id'] !== $_COOKIE['idadmin']) or ( $_COOKIE['hashadmin']=='' ) or ($_COOKIE['idadmin'] == '')){ 
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
		$sql = "SELECT id, password FROM `admin` WHERE username='".$username."' LIMIT 1"; 
		$st = $conn->prepare( $sql ); 
		$st->execute(); 
		$data = $st->fetch(); 
		if($data['password'] == md5($password)){ 
			 
			$hash = md5($this->generateCode(10)); 
			$sql1 = "UPDATE `admin` SET hash='".$hash."' WHERE username='".$username."'"; 
			$st1 = $conn->prepare( $sql1 ); 
			$st1->execute(); 
			
			setcookie("idadmin", $data['id'], time()+60*60*24*30); 
			setcookie("hashadmin", $hash, time()+60*60*24*30); 
			
			header("Location: index.php"); exit(); 
			
		} 
		else{ 
			echo 'Wrong password!'; 	
		}
	} 
	public function logout(){ 
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$sql = "UPDATE `admin` SET hash='' WHERE id='".$_COOKIE['idadmin']."'"; 
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
		$sql = "INSERT INTO admin(username,password,hash) VALUES ('".$username."','".md5($password)."','".$hash."')"; 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		setcookie("idadmin", $data['id'], time()+60*60*24*30); 
		setcookie("hashadmin", $hash, time()+60*60*24*30); 
		header("Location: index.php"); exit(); 
		
	} 
}



?>