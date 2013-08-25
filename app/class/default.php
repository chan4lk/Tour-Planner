<?php
class DefaultController{
		public function GETAction($param) {			
			$html = "<a href='/users/add'>Add user</a>".
				"<br/>".
				"<a href='/users/find'>Find user</a>";		
			return $html;			
			}
		}
?>
