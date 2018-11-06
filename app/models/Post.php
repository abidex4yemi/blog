<?php
class Post {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    
    
    /**
     * getPosts
     *
     * @return void
     */
    public function getPosts(){
        //Sql query
        $sql = "SELECT *, ";
            $sql .= "posts.id AS post_id,";
            $sql .= "users.first_name AS user_name, ";
            $sql .= "categories.cat_title AS category_name, ";
            $sql .= "posts.created_at AS postCreatedAt, ";
            $sql .= "users.created_at AS userCreatedAt ";
            $sql .= "FROM posts ";
            $sql .= "INNER JOIN users ON posts.user_id = users.id ";
            $sql .= "INNER JOIN categories ON posts.cat_id = categories.cat_id ";
            $sql .= "ORDER BY posts.created_at DESC";


        //query database
        $this->db->prepareStmt($sql);

        //store resultset
        $results = $this->db->resultSet();

        return $results;
    }
}