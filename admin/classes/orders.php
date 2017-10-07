<?

include("./config.php");

class Orders{
	public function getList() {
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM `order`
		INNER JOIN `statuses` ON order.status = statuses.sid
		ORDER BY id DESC";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$i = 0;
		
		while ( $row = $st->fetch() ) {
			$nrow[$i]['id'] = $row['id'];
			$nrow[$i]['user_id'] = $row['user_id'];
			$nrow[$i]['dateq'] = $row['dateq'];
			$nrow[$i]['status'] = $row['status'];
			$nrow[$i]['suma'] = $row['suma'];
			$nrow[$i]['comm'] = $row['comm'];
			$nrow[$i]['name'] = $row['name'];
			$i++;
		}
		
		$nrow['count'] = $i;
		return $nrow;
	}
	
	public function getUsername($id){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$sql = "SELECT username FROM user		
		WHERE id = ".$id; 
	 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		$row = $st->fetch(); 
		 
		return $row['username'];
	}
	
	public function getItemsByOrderId($id){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT order_items.*,item.name,item.img,item.price FROM `order_items`
		INNER JOIN `item` ON order_items.item_id = item.id
		WHERE order_id='".$id."'
		ORDER BY order_items.id DESC";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$i = 0;
		
		while ( $row = $st->fetch() ) {
			$nrow[$i]['id'] = $row['id'];
			$nrow[$i]['order_id'] = $row['order_id'];
			$nrow[$i]['item_id'] = $row['item_id'];
			$nrow[$i]['count'] = $row['count'];
			$nrow[$i]['name'] = $row['name'];
			$nrow[$i]['img'] = $row['img'];
			$nrow[$i]['price'] = $row['price'];
			$i++;
		}
		
		$nrow['count'] = $i;
		return $nrow;
	}
	
	public function editOrderItem($id){
		$item_id = $_POST['item_id'];
		$count = $_POST['count'];
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "UPDATE order_items SET item_id = '".$item_id."',count = '".$count."' WHERE id='".$id."'";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$this->findPrice($_GET['id']);
		header("Location:orderdetails.php?id=".$_GET['id']);
	}
	
	public function findPrice($id){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT SUM(item.price*order_items.count) FROM order_items
		INNER JOIN item ON order_items.item_id = item.id
		WHERE order_id='".$id."'";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$row = $st->fetch(); 
		$row['SUM(item.price*order_items.count)'] = $row['SUM(item.price*order_items.count)']+35;
		$sql1 = "UPDATE `order` SET suma=".$row['SUM(item.price*order_items.count)']." WHERE id='".$id."'";
		$st = $conn->prepare( $sql1 );
		$st ->execute();
	}
	
	public function deleteItem($id){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "DELETE FROM order_items WHERE id=".$id;
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$this->findPrice($_GET['id']);
		header("Location:orderdetails.php?id=".$_GET['id']);
	}
	
	public function addOrderItem($id){
		$item_id = $_POST['item_id'];
		$count = $_POST['count'];
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "INSERT INTO order_items(order_id,item_id,count) VALUES ('".$id."','".$item_id."','".$count."')"; 
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$this->findPrice($_GET['id']);
		header("Location:orderdetails.php?id=".$_GET['id']);
	}
	
	public function getOrderDetails($id){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM `order`
		INNER JOIN `statuses` ON order.status = statuses.sid
		LEFT JOIN `user` ON order.user_id = user.id		
		WHERE order.id=".$id."
		ORDER BY order.id DESC";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		
		$row = $st->fetch();
		
		return $row;
	}
	
	public function getAllStatuses(){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM `statuses`
		ORDER BY sid DESC";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$i = 0;
		
		while ( $row = $st->fetch() ) {
			$nrow[$i]['sid'] = $row['sid'];
			$nrow[$i]['name'] = $row['name'];
			$i++;
		}
		
		$nrow['count'] = $i;
		return $nrow;
	}
	
	public function changeStatus($id){
		echo $status = $_POST['status'];
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$sql = "UPDATE `order` SET status=".$status." WHERE id='".$id."'";
		$st = $conn->prepare( $sql );
		$st ->execute();
		header("Refresh:0");
	}
	
	public function getOrdersCount(){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		
		$sql = "SELECT COUNT(*) FROM `order`"; 
		 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		$row = $st->fetch();
		return $row['COUNT(*)'];
	}
	
	public function getNewOrders(){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM `order`
		INNER JOIN `statuses` ON order.status = statuses.sid
		WHERE order.status =3 OR order.status=2
		ORDER BY id DESC";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$i = 0;
		
		while ( $row = $st->fetch() ) {
			$nrow[$i]['id'] = $row['id'];
			$nrow[$i]['user_id'] = $row['user_id'];
			$nrow[$i]['dateq'] = $row['dateq'];
			$nrow[$i]['status'] = $row['status'];
			$nrow[$i]['suma'] = $row['suma'];
			$nrow[$i]['comm'] = $row['comm'];
			$nrow[$i]['name'] = $row['name'];
			$i++;
		}
		
		$nrow['count'] = $i;
		return $nrow;
	}
	
	public function getItemsFraph($month){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$start = "2017-".$month."-01";
		$end = "2017-".$month."-30";
		$sql = "SELECT COUNT(*) FROM `order` WHERE DATE(dateq) BETWEEN '".$start."' AND '".$end."'"; 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		$row = $st->fetch();
		return $row['COUNT(*)']; 
	}
}


?>