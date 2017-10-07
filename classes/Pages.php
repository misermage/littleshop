<?

class Pages{
	
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
	
	public function getPages() {
		
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT pages.* FROM pages
		INNER JOIN menus ON pages.menuid=menus.mid
		ORDER BY id DESC";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$i = 0;
		
		while ( $row = $st->fetch() ) {
			$nrow[$i]['id'] = $row['id'];
			$nrow[$i]['name'] = $row['name'];
			$nrow[$i]['menuid'] = $row['menuid'];
			$i++;
		}
		
		$nrow['count'] = $i;
		return $nrow;
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
	
}

?>