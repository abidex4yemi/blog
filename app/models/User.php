<?php
    class User {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        
        /**
         * register
         *
         * @param  mixed $data
         *
         * @return bool
         */
        public function register($data)
        {   //Sql query
            $sql = "INSERT INTO  ";
            $sql .= "users (first_name, last_name, email, hashed_password, role, image)";
            $sql .= "VALUES(:firstName, :lastName, :email, :hashedPassword, :role, :image)";

            //prepared statement
            $this->db->prepareStmt($sql);

            //bind named parameters with value
            $this->db->bind(':firstName', $data['first_name']);
            $this->db->bind(':lastName', $data['last_name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':hashedPassword', $data['password']);
            $this->db->bind(':role', $data['role']);
            $this->db->bind(':image', $data['image']);

            //execute statement
            if($this->db->executePrep()){
                return true;
            }else{
                return false;
            }
        }


        public function findUserByEmail($email)
        {
            //sql query
            $sql = "SELECT email from users WHERE email = :email";

            //prepared sql statement
            $this->db->prepareStmt($sql);

            //bind parameter with value
            $this->db->bind(":email", $email);

            //fetch single record from database
            $this->db->single();

            //check for row if any
            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

        

        /**
         * login
         *
         * @param  mixed $email
         * @param  mixed $password
         *
         * @return void
         */
        public function login($email, $password)
        {   //sql query
            $sql = "SELECT * FROM users WHERE email = :email";

            //prepared sql statement
            $this->db->prepareStmt($sql);

            //bind parameters with value
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            //strore hashed password from database
            $hashed_password = $row->password;

            //validate user password
            //check if user provided password === to database password
            if(password_verify($password, $hashed_password)){
                return $row;
            }else{
                return false;
            }
        }
    }