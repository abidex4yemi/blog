<?php
class Category {
    private $db;

    public function __construct()
    {
        //Instanciate new database object
        $this->db = new Database();
    }

    /**
     * getCategories
     *
     * @return \PDO $results
     */
    public function getCategories()
    {
        //sql query
        $sql = "SELECT * FROM categories";
        $this->db->prepareStmt($sql);

       $results = $this->db->resultSet();

       return $results;
    }


    /**
     * findCategoryByName
     *
     * @param  mixed $cat_title
     *
     * @return void
     */
    public function findCategoryByName($data){
        //sql query
        $sql = "SELECT * FROM categories WHERE cat_title = :cat_title";

        //prepared statement
        $this->db->prepareStmt($sql);

        //bind parameters with value
        $this->db->bind(':cat_title', $data['category_name']);

        if($this->db->single()){
            return true;
        }else{
            return false;
        }
    }



    /**
     * findCategoryById
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function findCategoryById($id){
        //sql query
        $sql = "SELECT * FROM categories WHERE cat_id = :cat_id";

        //prepared statement
        $this->db->prepareStmt($sql);

        //bind parameters with value
        $this->db->bind(':cat_id', $id);

        $row = $this->db->single();

        if($row){
            return $row;
        }else{
            return false;
        }
    }




    /**
     * addCategory
     *
     * @param  mixed $cat_title
     *
     * @return bool
     */
    public function addCategory($cat_title)
    {
        //sql statement
        $sql = "INSERT INTO categories (cat_title) VALUES(:catTitle)";

        //prepared statement
        $this->db->prepareStmt($sql);

        //bind parameters with value
        $this->db->bind(':catTitle', $cat_title);

        //check if category successfully added
        if($this->db->executePrep()){
            return true;
        }else{
            return false;
        }
    }


    /**
     * deleteCategory
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function deleteCategory($id)
    {
        //sql query
        $sql = "DELETE FROM categories WHERE cat_id = :cat_id";

        //prepared statement
        $this->db->prepareStmt($sql);

        //bind parameters with value
        $this->db->bind(':cat_id', $id);

        if($this->db->executePrep()){
            return true;
        }else{
            return false;
        }

    }


    public function updateCategory($id, $data)
    {
        //sql query
        $sql  = "UPDATE categories SET ";
        $sql .= "cat_title = :cat_title ";
        $sql .= "WHERE cat_id = :cat_id";

        //prepared statement
        $this->db->prepareStmt($sql);

        //bind named parameters with value
        $this->db->bind(':cat_title', $data['category_name']);
        $this->db->bind(':cat_id', $id);

        //execute statement
        if($this->db->executePrep()){
            return true;
        }else{
            return false;
        }
    }
}