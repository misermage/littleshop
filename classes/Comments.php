<?
include("./admin/config.php");
class Comments{
	public function getCommentsByItemID($id){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM comments
		INNER JOIN user ON comments.user_id=user.id
		WHERE item_id = ".$id." 
		ORDER BY comments.id DESC";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$i = 0;
		
		while ( $row = $st->fetch() ) {
			$nrow[$i]['id'] = $row['id'];
			$nrow[$i]['text'] = $row['text'];
			$nrow[$i]['item_id'] = $row['item_id'];
			$nrow[$i]['datetime'] = $row['datetime'];
			$nrow[$i]['username'] = $row['username'];  
			$nrow[$i]['avatar'] = $row['avatar'];   
			$i++;
		}
		
		$nrow['count'] = $i;
		return $nrow;
	}
	public function sendComm($item_id,$user_id){
		$comm = $_POST['comment'];		
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "INSERT INTO `comments` (`text`,`item_id`,`datetime`,`user_id`)
		VALUES ('".$comm."','".$item_id."','".date("Y-m-d H:i:s")."','".$user_id."')";
		$st = $conn->prepare( $sql );
		$st ->execute();  
		header('Refresh:0'); 
	}
	
}

?>