<?php
//include('config.php');


class USER {
        
        public $username;
        public $password;
        public $con;

        function __construct( $username, $password,$con){
            
            $this->username=$username;
            $this->password=$password;
            $this->con=$con;

        }
        function userExistsSql(){
            return $this->con->prepare("SELECT * FROM usuarios WHERE usuario = $this->username AND pass = $this->password");
        }
        



}

?>