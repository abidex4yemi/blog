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
        ///Sql query
        $sql = "SELECT *, ";
            $sql .= "posts.id AS postId,";
            $sql .= "users.id AS userId,";
            $sql .= "posts.created_at AS postCreated,";
            $sql .= "users.created_at AS userCreated ";
            $sql .= "FROM posts ";
            $sql .= "INNER JOIN users ON ";
            $sql .= "posts.user_id = users.id ";
            $sql .= "ORDER BY posts.created_at DESC";


        //query database
        $this->db->prepareStmt($sql);

        //store resultset
        $results = $this->db->resultSet();

        return $results;
    }
}