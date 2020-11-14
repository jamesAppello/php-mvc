<?php
    // PDO class
    /**
     * connect
     * create prepared stmtbind values
     * return rows and results
     */
    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pw = DB_PASS;
        private $dbname = DB_NAME;
        private $dbHandler;
        private $stmt;
        private $err;
        public function __construct() {
            // set DSN
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            // options
            $ops = array(
                PDO::ATTR_PERSISTENT => true, // sets a persistent connection to mysql
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // elegant way to handle exception|errors
            );
            // create new PDO instantiation
            try {
                $this->dbHandler = new PDO($dsn, $this->user, $this->pw, $ops);
            } catch(PDOException $e) {
                $this->err = $e->getMessage();
                echo $this->err;
            }
        }
        // prepare statement w/ query
        public function query($sql) {
            $this->stmt = $this->dbHandler->prepare($sql);
        }
        // bind values
        public function bind($param, $value, $type = null) {
            if (is_null($type)) {
                switch(true) {
                    case is_int($value): 
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value): 
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value): 
                        $type = PDO::PARAM_NULL;
                        break;
                    default: 
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param, $value, $type);   
        }
        // execute the prepared statement
        public function execute() {
            return $this->stmt->execute();
        }
        // get result set as array of objects
        public function results() {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }
        // fetch single row from db
        public function single() {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }
        // get length of row
        public function rowCount() {
            return $this->stmt->rowCount();
        }
    }
?>