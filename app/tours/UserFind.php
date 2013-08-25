<html>

<head>
	<title>User Find</title>	
</head>

<body>
	<h1 style="text-align:center">Find Users</h1>
	<?php
		if(isset($_GET['scrn'])){
		
		$scrn = $_GET['scrn'];
			
		$conn = new MongoClient("mongodb://localhost");
		$db = $conn->selectDB('Users');
		$users = new MongoCollection($db, 'user');		
		
		$sweetQuery = array('scrn'=>$scrn);
		$cursor = $users->find($sweetQuery);
		foreach ($cursor as $doc) {
   		  echo $doc['name'].'&nbsp;';
		  echo $doc['scrn'].'&nbsp;';
		  echo $doc['mail'].'&nbsp;';
		  echo $doc['did'].'&nbsp;';
		  echo '<br/>';
			}
		}//end if
		else{
			echo 'could not find';
		}
		
	?>
</body>
</html>

