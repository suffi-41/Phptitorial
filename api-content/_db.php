<?php
   class database{
      private $server;
      private $username;
      private $password;
      private $database_name;

      public function __construct($sername, $username, $password, $database_name){
        $this->server = $sername;
        $this->username = $username;
        $this->password = $password;
        $this->database_name = $database_name;
      }

      public function connection(){
         $connect = mysqli_connect($this->server, $this->username, $this->password, $this->database_name);
         if($connect){
            return $connect;
         }else{
            die("Erorr" . mysqli_connect_errno());
         }
      }
   }

   define('server','localhost');
   define('username', 'root');
   define('password', '');
   define('database', 'lms');

   $server = server;
   $username = username;
   $password = password;
   $database = database;

   $connect_data = new database($server, $username, $password, $database);
   $connect_data->connection();
   
