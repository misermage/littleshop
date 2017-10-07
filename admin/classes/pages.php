<?

class Pages{
	public function getList() {
		
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT pages.*,menus.mname FROM pages
		INNER JOIN menus ON pages.menuid=menus.mid
		ORDER BY id DESC";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$i = 0;
		
		while ( $row = $st->fetch() ) {
			$nrow[$i]['id'] = $row['id'];
			$nrow[$i]['name'] = $row['name'];
			$nrow[$i]['menuid'] = $row['menuid'];
			$nrow[$i]['mname'] = $row['mname'];
			$nrow[$i]['datetime'] = $row['datetime'];
			$i++;
		}
		
		$nrow['count'] = $i;
		return $nrow;
	}
	
	public function delelePageById($id){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "DELETE FROM pages WHERE id=".$id;
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		header("Location:pages.php");
	}
	
	public function getPageById($id){ 
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$sql = "SELECT * FROM pages		
		WHERE id = ".$id; 
	 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		$row = $st->fetch(); 
		 
		return $row; 
	} 
	
	public function editPage($id){
		$name = $_POST['name']; 
		$content = $_POST['content']; 
		$menuid = $_POST['menuid']; 
		 
		
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		 
		$sql = "UPDATE pages SET name = '".$name."',content = '".$content."',menuid = '".$menuid."' WHERE id='".$id."'"; 
		
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		header('Refresh:0'); 
	}
	
	public function getAllMenus(){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM menus
		ORDER BY mid";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$i = 0;
		
		while ( $row = $st->fetch() ) {
			$nrow[$i]['mid'] = $row['mid'];
			$nrow[$i]['mname'] = $row['mname'];
			$i++;
		}
		
		$nrow['count'] = $i;
		return $nrow;
	}
	
	public function editMenus(){
		$menu1 = $_POST['menu1']; 
		$menu2 = $_POST['menu2']; 
		$menu3 = $_POST['menu3']; 
		 
		
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		 
		$sql = "UPDATE menus SET mname = '".$menu1."' WHERE mid='1'"; 
		$sql1 = "UPDATE menus SET mname = '".$menu2."' WHERE mid='2'"; 
		$sql2 = "UPDATE menus SET mname = '".$menu3."' WHERE mid='3'"; 
		
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		$st = $conn->prepare( $sql1 ); 
		$st ->execute(); 
		$st = $conn->prepare( $sql2 ); 
		$st ->execute(); 
		header('Refresh:0'); 
	}
	
	public function addPage(){
		$name = $_POST['name']; 
		$content = $_POST['content']; 
		$menuid = $_POST['menuid']; 
		
		
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$sql = "INSERT INTO pages(name,content,menuid,datetime) VALUES ('".$name."','".$content."','".$menuid."','".date("Y-m-d H:i:s")."')"; 
		 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		header('Location:pages.php'); 
	}
}

?>