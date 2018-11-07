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


    /**
     * count_posts
     *
     * @return void
     */
    public function count_posts()
    {
        $sql = "SELECT COUNT(id) FROM posts";

        //query database
        $this->db->prepareStmt($sql);

        //store resultset
        $results = $this->db->colFetch();

        return $results;
    }



    public function get_products_subset($positionStart, $positionEnd){
        //Note: 0 will yield to 1
        $offset = $positionStart - 1;
        //get total rows to be displayed
        $rows = $positionEnd - $positionStart + 1;

        $sql = "SELECT *, ";
            $sql .= "posts.id AS post_id,";
            $sql .= "users.first_name AS user_name, ";
            $sql .= "categories.cat_title AS category_name, ";
            $sql .= "posts.created_at AS postCreatedAt, ";
            $sql .= "users.created_at AS userCreatedAt ";
            $sql .= "FROM posts ";
            $sql .= "INNER JOIN users ON posts.user_id = users.id ";
            $sql .= "INNER JOIN categories ON posts.cat_id = categories.cat_id ";
            $sql .= "ORDER BY posts.created_at DESC ";
            $sql .= "LIMIT :offset, :rows";

            //prepared statament
            $this->db->prepareStmt($sql);

            $this->db->bind(":offset", $offset);
            $this->db->bind(":rows", $rows);

            $this->db->executePrep();
    
            $subset = $this->db->resultSet();

            return $subset;
    }


    
    /**
     * addPost
     *
     * @param  mixed $data
     *
     * @return void
     */
    public function addPost($data){
        //sql query
        $sql  = "INSERT INTO posts";
        $sql .= "(cat_id, post_title, user_id, post_image, post_content, post_tags)";
        $sql .= "VALUES(:cat_id, :post_title, :user_id, :post_image, :post_content, :post_tags)";

        //prepare statement
        $this->db->prepareStmt($sql);

        //bind parameters with value
        $this->db->bind(':cat_id', $data['category']);
        $this->db->bind(':post_title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':post_image', $data['image']);
        $this->db->bind(':post_content', $data['content']);
        $this->db->bind(':post_tags', $data['tags']);



        //execute prepared statement
        if($this->db->executePrep()){
            return true;
        }else{
            return false;
        }
    }
}