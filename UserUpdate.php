<html>

<head>
	<title>User Update</title>	
</head>

<body>
	<?php
	
		if(isset($_POST['submit']))
		{
			$name = $_GET['name'];
			$scrn = $_GET['scrn'];
			$mail = $_GET['mail'];
			$did  = $_GET['dit'];
			
			
		$conn = new MongoClient();
		$db = $conn->selectDB('Users');
		$users = $db->user; 
		
		class User{			
			public function __construct($name, $scrn, $mail, $did){
				$this->name = $name;
				$this->scrn = $scrn;
				$this->mail = $mail;	
				$thus->did  = $did;
			}
		}//end class
		
		$users->insert(new User($name, $scrn, $mail, $did));
		echo 'User sucessfully added<br/>';
		}
		else{
			echo 'not submited<br/>';
		}
	?>
</body>
</html>

