<?
include('./admin/config.php');

class Items{
	public function getList( $numRows ) {
		
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM item
		WHERE count > 0
		ORDER BY id DESC LIMIT ".$numRows;
	    
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
	public function getItemById($id){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM item
		WHERE id=".$id." LIMIT 1";
	    
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
			$nrow[$i]['category'] = $row['category'];
			$i++;
		}
		
		$nrow['count'] = $i;
		return $nrow;
	}
	public function addToCart($id){
		$tr = false;
		$count = $_COOKIE['cart_count'];
		for($i=1;$i<=$_COOKIE['cart_count'];$i++){
			$pieces = explode('.',$_COOKIE['cart'.$i]);
			if($pieces[0]==$id){
				$pieces[1] +=1;
				setcookie("cart".$i,$pieces[0].'.'.$pieces[1]);
				$tr = true;
			}
		}
		if(!$tr){
			$count +=1;
			setcookie("cart".$count,$id.'.1');
			setcookie("cart_count",$count);
		}
		header('Location: checkout.php');
	}
	
	public function getCartItemCount($str){
		$pieces = explode('.',$str);
		return $pieces[1];
	}
	
	public function getCartItemID($str){
		$pieces = explode('.',$str);
		return $pieces[0];
	}
	
	public function changeQty($str){
		$qty = $_POST['qty'];
		for($i=1;$i<=$_COOKIE['cart_count'];$i++){
			if($_COOKIE['cart'.$i] == $str){
				$pieces = explode('.',$str);
				setcookie("cart".$i,$pieces[0].'.'.$qty);
			}
		}
		header('Refresh:0'); 
	}
	
	public function deleteFromCart($str){
		for($i=1;$i<=$_COOKIE['cart_count'];$i++){
			if($_COOKIE['cart'.$i] == $str){
				setcookie('cart'.$i,$_COOKIE['cart'.$_COOKIE['cart_count']]);
				
				unset($_COOKIE['cart'.$_COOKIE['cart_count']]);
				setcookie('cart'.$_COOKIE['cart_count'], null, -1, '/');
				setcookie('cart_count',$_COOKIE['cart_count']-1);
				
			}
		}
		header('Location:checkout.php'); 
	}
	
	public function checkfor($id){
		$tr = 0;
		$count = $_COOKIE['cart_count'];
		for($i=1;$i<=$_COOKIE['cart_count'];$i++){
			$pieces = explode('.',$_COOKIE['cart'.$i]);
			if($pieces[0]==$id){
				$tr = 1;
			}
		}
		if(!$tr){
			return false;
		}else{
			return true;
		}
	}
	
	public function formOrder($id){
		$summ=35;
		$comm = $_POST['comm'];
		for($i=1;$i<=$_COOKIE['cart_count'];$i++){
			$pieces = explode('.',$_COOKIE['cart'.$i]);
			$suma+=$this->getPrice($pieces[0])*$pieces[1];
		}
		
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "INSERT INTO `order` (`user_id`,`dateq`,`status`,`suma`,`comm`)
		VALUES ('".$id."','".date("Y-m-d")."','3','".$suma."','".$comm."')";
	    $sql2 = "SELECT LAST_INSERT_ID()";
		$st = $conn->prepare( $sql );
		$st ->execute();
		$st = $conn->prepare( $sql2 );
		$st ->execute();
		$inf = $st ->fetch();
		$this->getFromCart($inf[0]);
		header('Refresh:0'); 
	}
	
	public function getFromCart($id){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		for($i=1;$i<=$_COOKIE['cart_count'];$i++){
				$pieces[$i] = explode('.',$_COOKIE['cart'.$i]);
				echo $_COOKIE['cart'.$i];
				$sql3 = "INSERT INTO `order_items` (`order_id`,`item_id`,`count`)
				VALUES ('".$id."','".$pieces[$i][0]."','".$pieces[$i][1]."')";
				$st = $conn->prepare( $sql3 );
				$st ->execute();
				unset($_COOKIE['cart'.$i]);
				setcookie('cart'.$i, null, -1, '/'); 
		}
		setcookie('cart_count','0');
	}
	
	public function getPrice($id){	
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT price FROM item
		WHERE id = ".$id."
		LIMIT 1";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$row = $st->fetch();
		
		return $row['price'];
	}
	
	public function getMyOrders($id){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM `order`
		LEFT JOIN statuses ON order.status = statuses.sid
		WHERE order.user_id='".$id."'
		ORDER BY order.id DESC";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$i = 0;
		
		while ( $row = $st->fetch() ) {
			$nrow[$i]['id'] = $row['id'];
			$nrow[$i]['dateq'] = $row['dateq'];
			$nrow[$i]['suma'] = $row['suma'];
			$nrow[$i]['name'] = $row['name'];
			$i++;
		}
		$nrow['count'] = $i;
		return $nrow;
	}
	
	public function getCategories($lvl){
		
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM `category`
		WHERE parent_id='".$lvl."'
		ORDER BY name";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$i = 0;
		
		while ( $row = $st->fetch() ) {
			$nrow[$i]['id'] = $row['id'];
			$nrow[$i]['name'] = $row['name'];
			$i++;
		}
		$nrow['count'] = $i;
		return $nrow;
	}
	
	public function getCategoryName($id){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT name FROM `category`
		WHERE id='".$id."'
		LIMIT 1";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$row = $st->fetch();
		
		return $row['name'];
	}
	
	public function getFromCategory( $cat,$page ) {
		
		$arr = $this->getAllChilds($cat);
		for($i=0;$i<count($arr);$i++){
			$xd .= " OR count > 0 AND category_id=".$arr[$i];
		}
		$start = $page*10;
		$end = $page*10+10;
		
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM item
		WHERE count > 0 AND category_id=".$cat." ".$xd."
		ORDER BY id DESC LIMIT ".$start.",".$end."";
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
		  
		$sql1 = "SELECT COUNT(*) FROM item
		WHERE count > 0 AND category_id=".$cat." ".$xd;
		$st = $conn->prepare( $sql1 );
		$st ->execute();
		$row1 = $st->fetch();
		$nrow['max_count'] = $row1['COUNT(*)'];
		$nrow['count'] = $i;
		return $nrow;
	}
	
	public function getAllChilds($cat){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		
		$sql = "SELECT * FROM category";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$id = array();
		$i=0;
		while ($row = $st->fetch()){
			$nrow[$i]['id'] = $row['id'];
			$nrow[$i]['parent_id'] = $row['parent_id'];
			$i++;
		}
		
		$id = $this->takeAllNeeded($cat,$nrow);
		return $id;
	}
	
	private function takeAllNeeded($cat,$row){
		$result = array();
		$result1 = array();
		for($i=0;$i<count($row);$i++){
			if($row[$i]['parent_id']==$cat){
				array_push ($result,$row[$i]['id']);
			}
		}
		//print_r($result);
		for($i=0;$i<count($result);$i++){
			$result1 = array_merge ($result1, $this->takeAllNeeded($result[$i],$row));
		}
		$result1 = array_merge($result1,$result);
		return $result1;
	}
	
	public function getSiteData(){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM siteinfo WHERE id=1";
	    
		$st = $conn->prepare( $sql );
		$st ->execute();
		$nrow = $st ->fetch();
		return $nrow;
	}
	
}
  
?>
