<html>

<head>
	<title>User Update</title>	
</head>

<body>
	<?php
	
		if(isset($_GET['submit']))
		{
			$urN  = $_GET['urN'];
			$scrn = $_GET['scrn'];
			$mail = $_GET['mail'];
			$urTy = $_GET['urTy'];
			$did  = $_GET['did'];
			
			
		$conn = new MongoClient();
		$db = $conn->selectDB('Users');
		$users = $db->user; 
		
		class User{			
			public function __construct($urN, $scrn, $mail,$urTy, $did){
				$this->urN = $urN;
				$this->scrn = $scrn;
				$this->mail = $mail;
				$this->urTy = $urTy;	
				$this->did  = $did;
			}
		}//end class
		
		$users->insert(new User($urN, $scrn, $mail,$urTy, $did));
		echo 'User sucessfully added<br/>';
		}
		else{
			echo 'not submited<br/>';
		}
	?>
</body>
</html>

