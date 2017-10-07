<?

class Users{
	public function getAllUsers() {
		
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM user
		ORDER BY id DESC";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$i = 0;
		
		while ( $row = $st->fetch() ) {
			$nrow[$i]['id'] = $row['id'];
			$nrow[$i]['username'] = $row['username'];
			$nrow[$i]['realname'] = $row['realname'];
			$nrow[$i]['addr1'] = $row['addr1'];
			$nrow[$i]['email'] = $row['email'];
			$nrow[$i]['number'] = $row['number'];
			$nrow[$i]['avatar'] = $row['avatar'];
			$i++;
		}
		
		$nrow['count'] = $i;
		return $nrow;
	}
	
	public function getUsersCount(){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		
		$sql = "SELECT COUNT(*) FROM user"; 
		 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		$row = $st->fetch();
		return $row['COUNT(*)']; 
	}
}




?>