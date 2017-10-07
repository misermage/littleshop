<?

class Items{
	public function getList() {
		
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM item
		ORDER BY id DESC";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$i = 0;
		
		while ( $row = $st->fetch() ) {
			$nrow[$i]['id'] = $row['id'];
			$nrow[$i]['name'] = $row['name'];
			$nrow[$i]['img'] = $row['img'];
			$nrow[$i]['desc1'] = $row['desc1'];
			$nrow[$i]['desc2'] = $row['desc2'];
			$nrow[$i]['desc3'] = $row['desc3'];
			$nrow[$i]['price'] = $row['price'];
			$nrow[$i]['count'] = $row['count'];
			$nrow[$i]['short_desc'] = $row['short_desc'];
			$nrow[$i]['category_id'] = $row['category_id'];
			$i++;
		}
		
		$nrow['count'] = $i;
		return $nrow;
	}
	
	public function getCategoryList($id){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM category
		ORDER BY id";
		
		$st = $conn->prepare( $sql );
		$st ->execute();
		$i = 0;
		
		while ( $row = $st->fetch() ) {
			$nrow[$i]['id'] = $row['id'];
			$nrow[$i]['parent_id'] = $row['parent_id'];
			$nrow[$i]['name'] = $row['name'];
			$i++;
		}
		$nrow['count'] = $i;
		
		for($k=0;$k<$nrow['count'];$k++){
			if($nrow[$k]['id']==$id){
			$arr = '<a href="categories.php?edit='.$nrow[$k]['id'].'">'.$nrow[$k]['name'].'</a>';
			$parent = $nrow[$k]['parent_id'];
			}
		}
		while($parent!=0){
			for($k=0;$k<$nrow['count'];$k++){
			if($nrow[$k]['id']==$parent){
				$arr = '<a href="categories.php?edit='.$nrow[$k]['id'].'">'.$nrow[$k]['name'].'</a> >'.$arr;
				$parent = $nrow[$k]['parent_id'];
			}
			}
		}
		return $arr;
		
	}
	
	public function deleleById($id){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "DELETE FROM item WHERE id=".$id;
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		header("Location:items.php");
	}

	public function getById($id){ 
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$sql = "SELECT * FROM item		
		WHERE id = ".$id; 
	 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		$row = $st->fetch(); 
		 
		return $row; 
	} 
	
	public function editData($id){
		$name = $_POST['name']; 
		$price = $_POST['price']; 
		$count = $_POST['count']; 
		$short_desc = $_POST['short_desc']; 
		$desc1 = $_POST['desc1']; 
		$desc2 = $_POST['desc2']; 
		$desc3 = $_POST['desc3']; 
		$realname = $_POST['realname']; 
		$category_id = $_POST['category_id']; 
		
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$uploaddir = './itemsimg/'; 
		$uploadfile = $uploaddir . basename($_FILES['image']['name']); 
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile); 
		$image = DOMAIN.'/admin/itemsimg/'.$_FILES['image']['name']; 
		if($image!=DOMAIN.'/admin/itemsimg/'){ 
			
			$sql = "UPDATE `item` SET name = '".$name."',price = '".$price."',count='".$count."',short_desc='".$short_desc."',desc1='".$desc1."',desc2='".$desc2."',desc3='".$desc3."',category_id='".$category_id."', img='".$image."' WHERE id='".$id."'"; 
		}else{
			$sql = "UPDATE `item` SET name = '".$name."',price = '".$price."',count='".$count."',short_desc='".$short_desc."',desc1='".$desc1."',desc2='".$desc2."',desc3='".$desc3."',category_id='".$category_id."' WHERE id='".$id."'"; 
		} 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		header('Refresh:0'); 
	}
	
	public function getAllCategories(){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM category
		ORDER BY id";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$i = 0;
		
		while ( $row = $st->fetch() ) {
			$nrow[$i]['id'] = $row['id'];
			$nrow[$i]['parent_id'] = $row['parent_id'];
			$nrow[$i]['name'] = $row['name'];
			$i++;
		}
		
		$nrow['count'] = $i;
		return $nrow;
	}
	
	public function addItem(){
		$name = $_POST['name']; 
		$price = $_POST['price']; 
		$count = $_POST['count']; 
		$short_desc = $_POST['short_desc']; 
		$desc1 = $_POST['desc1']; 
		$desc2 = $_POST['desc2']; 
		$desc3 = $_POST['desc3']; 
		$realname = $_POST['realname']; 
		$category_id = $_POST['category_id']; 
		
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$uploaddir = './itemsimg/'; 
		$uploadfile = $uploaddir . basename($_FILES['image']['name']); 
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile); 
		$image = DOMAIN.'/admin/itemsimg/'.$_FILES['image']['name']; 
		$sql = "INSERT INTO item(name,price,count,short_desc,desc1,desc2,desc3,category_id,img) VALUES ('".$name."','".$price."','".$count."','".$short_desc."','".$desc1."','".$desc2."','".$desc3."','".$category_id."','".$image."')"; 
		 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		header('Location:items.php');  
	}
	
	public function deleteCategory($id){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "DELETE FROM category WHERE id=".$id;
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		header("Location:categories.php");
	}
	
	public function editCategory($id){
		$name = $_POST['name'];
		$parent_id = $_POST['parent_id'];
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "UPDATE category SET name = '".$name."',parent_id = '".$parent_id."' WHERE id='".$id."'";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		header("Location:categories.php");
	}
	
	public function getCatName($id){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$sql = "SELECT name FROM category		
		WHERE id = ".$id; 
	 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		$row = $st->fetch(); 
		 
		return $row['name']; 
	}
	
	public function addCategory(){
		$name = $_POST['name']; 
		$parent_id = $_POST['parent_id']; 
		
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		
		$sql = "INSERT INTO category(name,parent_id) VALUES ('".$name."','".$parent_id."')"; 
		 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		header('Refresh:categories.php'); 
	}
	
	public function getItemsCount(){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		
		$sql = "SELECT COUNT(*) FROM item"; 
		 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		$row = $st->fetch();
		return $row['COUNT(*)']; 
	}
	
	
	
	
}

?> 