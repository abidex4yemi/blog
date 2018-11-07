<?php 
    /**
     *PDO Database class
     *Connect to database
     *create prepared statement
     *Bind values
     *Return rows and result
     */
    class Database {
        //Database credentials
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $db_name = DB_NAME;

        private $dbh;
        private $stmt;
        private $error;

        /**
         * __construct
         *
         * @return class PDO
         */
        public function __construct()
        {
            //initialize dsn
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
            //set error mode and persistent state
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            //Instanciate PDO object
            try{
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
                
            }catch(PDOException $e){
                $this->error = $e->getMessage();
                exit;
            }
        }


        /**
         * Prepare sql query
         *
         * @param  mixed $sql
         *
         * @return void
         */
        public function prepareStmt($sql)
        {
            $this->stmt = $this->dbh->prepare($sql);
        }

        /**
         * Bind parameter with value
         *
         * @param  mixed $param
         * @param  mixed $value
         * @param  mixed $type
         *
         * @return void
         */
        public function bind($param, $value, $type = null)
        {
            if(is_null($type)){
                switch(true){
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

            //bind value with parameter
            $this->stmt->bindValue($param, $value, $type);
        }

        /**
         * execute prepared statement
         *
         * @return bool
         */
        public function executePrep()
        {
            return $this->stmt->execute();
        }

        /**
         * fetch all result from database
         *
         * @return sql resource
         */
        public function resultSet()
        {
            $this->executePrep();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }


        /**
         * fetch single column
         *
         * @return void
         */
        public function colFetch()
        {
            $this->executePrep();
            return $this->stmt->fetchColumn(0);
        }

        

        /**
         * fetch single result from database
         *
         * @return sql resource
         */
        public function single()
        {
            $this->executePrep();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        /**
         * count results returned from database
         *
         * @return int
         */
        public function rowCount()
        {
            return $this->stmt->rowCount();
        }
    }