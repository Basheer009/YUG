<?php
include '/config.php';

class User{
		
		public $db;
		public function __construct(){
			$this->db = new mysqli('localhost', 'root', '', 'yug');
		
			if(mysqli_connect_errno()) {
	 
				echo "<script>alert('Error: Could not connect to database.');</script>";
	 
			exit;
 
			}
		}
	
	
		/*** for login process ***/
		public function check_login($email, $password){
			
        	$password=md5($password);
        	
			$sql2="SELECT id from users WHERE email='$email' AND password='$password'";
			
			//checking if the username is available in the table
        	$result = mysqli_query($this->db,$sql2);
        	$user_data = mysqli_fetch_array($result);
        	$count_row = $result->num_rows;
		
	        if ($count_row == 1) {
	            // this login var will use for the session thing
	            $_SESSION['login'] = true; 
	            $_SESSION['id'] = $user_data['id'];
	            return true;
	        }
	        else{
			    return false;
			}
    	}

  
    	/*** starting the session ***/
	    public function get_session(){    
	        return $_SESSION['login'];
	    }

	    public function user_logout() {
	        $_SESSION['login'] = FALSE;
			session_unset();
	        session_destroy();
	    }

	
}
?>
