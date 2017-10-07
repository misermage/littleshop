<?

class Siteinfo{
	
	public function getData(){ 
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$sql = "SELECT * FROM siteinfo		
		WHERE id = 1"; 
	 
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		$row = $st->fetch(); 
		 
		return $row; 
	} 
	
	public function editData(){
		$sitename = $_POST['sitename']; 
		$address = $_POST['address']; 
		$telephone = $_POST['telephone']; 
		$mail = $_POST['mail']; 
		$site = $_POST['site']; 
		$hours_of_work = $_POST['hours_of_work']; 
		$google_maps = $_POST['google_maps']; 
		$facebook = $_POST['facebook']; 
		$google = $_POST['google']; 
		$vk = $_POST['vk']; 
		$twitter = $_POST['twitter'];
		$youtube = $_POST['youtube']; 
		
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
		$uploaddir = './siteimg/'; 
		$uploadfile = $uploaddir . basename($_FILES['image']['name']); 
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile); 
		$image = DOMAIN.'/admin/siteimg/'.$_FILES['image']['name'];  
		if($image!=DOMAIN.'/admin/siteimg/'){ 
			
			$sql = "UPDATE siteinfo SET sitename = '".$sitename."',address = '".$address."',telephone='".$telephone."',mail='".$mail."',hours_of_work='".$hours_of_work."',google_maps='".$google_maps."',facebook='".$facebook."',google='".$google."',vk='".$vk."',twitter='".$twitter."',youtube='".$youtube."', siteimg='".$image."' WHERE id='1'"; 
			
		}else{ 
			$sql = "UPDATE siteinfo SET sitename = '".$sitename."',address = '".$address."',telephone='".$telephone."',mail='".$mail."',hours_of_work='".$hours_of_work."',google_maps='".$google_maps."',facebook='".$facebook."',google='".$google."',vk='".$vk."',twitter='".$twitter."',youtube='".$youtube."' WHERE id='1'"; 
			
		}  
		$st = $conn->prepare( $sql ); 
		$st ->execute(); 
		header('Refresh:0'); 
	}
}

?>