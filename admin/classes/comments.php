<?

class Comments{
	
	public function getAllComments(){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM comments
		ORDER BY id DESC";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$i = 0;
		
		while ( $row = $st->fetch() ) {
			$nrow[$i]['id'] = $row['id'];
			$nrow[$i]['text'] = $row['text'];
			$nrow[$i]['item_id'] = $row['item_id'];
			$nrow[$i]['datetime'] = $row['datetime'];
			$nrow[$i]['user_id'] = $row['user_id'];
			$i++;
		}
		
		$nrow['count'] = $i;
		return $nrow;
	}
	
	public function deleteComment($id){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "DELETE FROM comments WHERE id=".$id;
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		header("Location:comments.php");
	}
	
	public function editComment($id){
		$text = $_POST['text'];
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "UPDATE comments SET text = '".$text."' WHERE id='".$id."'";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		header("Location:comments.php");
	}
	
	public function getCommentsCount(){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		
		$sql = "SELECT COUNT(*) FROM comments"; 
		 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		$row = $st->fetch();
		return $row['COUNT(*)']; 
	}
	
}

?>