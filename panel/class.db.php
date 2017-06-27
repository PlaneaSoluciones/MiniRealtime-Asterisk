<?php
   include('config.php');
   class db extends mysqli {


       // single instance of self shared among all instances
       private static $instance = null;


       // db connection config vars
       private $user = DBUSER;
       private $pass = DBPWD;
       private $dbName = DBNAME;
       private $dbHost = DBHOST;

       //This method must be static, and must return an instance of the object if the object
       //does not already exist.
       public static function getInstance() {
       if (!self::$instance instanceof self) {
               self::$instance = new self;
       }
           return self::$instance;
       }

       // The clone and wakeup methods prevents external instantiation of copies of the Singleton class,
       // thus eliminating the possibility of duplicate objects.
       public function __clone() {
         trigger_error('Clone is not allowed.', E_USER_ERROR);
       }
       public function __wakeup() {
         trigger_error('Deserializing is not allowed.', E_USER_ERROR);
       }

       private function __construct() {
         parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName);
         if (mysqli_connect_error()) {
             exit('Connect Error (' . mysqli_connect_errno() . ') '
                     . mysqli_connect_error());
         }
         parent::set_charset('utf-8');
      }

      public function dbquery($query)
       {
           if($this->query($query))
           {
               return true;
           }
       }

       public function getResult($query)
       {
           $result = $this->query($query);

          if (!$result) {
            trigger_error('Invalid query: ' . $this->error);
          }
          if ($result->num_rows > 0){
            $rows = $result->fetch_assoc();
            return $rows;
          } else
            return null;
       }
   }
