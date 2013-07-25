<html>

<head>
	<title>chan1</title>	
</head>

<body>
	<?php
	
		if(isset($_POST['submit']))
		{
			$author = $_POST['author'];
			$title = $_POST['title'];
			$content = $_POST['content'];
			
			//echo $author;
			
		$conn = new MongoClient();
		$db = $conn->selectDB('blog');
		$posts = $db->post; 
		
		class PostObj{
			public $comments = array();
			public function __construct($author, $title, $content){
				$this->author = $author;
				$this->title = $title;
				$this->content = $content;	
			}
		}//end class
		
		$posts->insert(new PostObj($author,$title,$content));
		echo 'post sucessfully added<br/>';
		}
		else{
			echo 'not submited<br/>';
		}
	?>
</body>
</html>

