<?php
class Categories extends Controller {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {    
        before_every_protected_page();
        $this->categoryModel = $this->model('Category');
    }



    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        redirect('pages/index');
    }



    /**
     * categories
     *
     * @return void
     */
    public function viewCategory()
    {
        $category = $this->categoryModel->getCategories();

        $data = [
            'categories' => $category,
            'title-bar' => ' category',
            'category_name' => '',
            'category_name_err' => ''
        ];

        $this->view('categories/category', $data);
    }

    
    /**
     * addCategory
     *
     * @return void
     */
    public function addCategory(){
        $category = $this->categoryModel->getCategories();

        if($this->request_is_post()){
                //Sanitize and process form
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $data = [
                    'categories' => $category,
                    'title-bar' => ' category',
                    'category_name' => '',
                    'category_name_err' => ''
                ];
    
                $value = $_POST['category_name'];
                $value = isset($value) ? trim($value) : '';
    
                if(empty($value)){
                    $data['category_name_err'] = "Category name is required.";

                }else{
                    $data['category_name_err'] = '';
                }

                if(isset($value) && !empty($value)){
                    $data['category_name'] = $value;
                }

                if(empty($data['category_name_err'])){


                    if($this->categoryModel->findCategoryByName($data)){

                        flash('category_already_exist', 'Category already exist', 'alert alert-danger');
                        $this->view('categories/category', $data);
                        die();
                       
                    }else{
                         //save user record
                        if($this->categoryModel->addCategory($data['category_name'])){
                            flash('category_added', 'Category Added successfully');
                            redirect('categories/viewCategory');
                        }else{
                            flash('category_insertion_failed', 'Unable to add Category', 'alert alert-danger');
                            redirect('categories/viewCategory');
                            die();
                        }
                    }
                    

                }else{
                    $this->view('categories/category', $data);
                }
    
        
        }else{
            redirect('categories/viewCategory');
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

       if($this->categoryModel->deleteCategory($id)){
           flash('category_deleted', 'Category Successfully deleted');
           redirect('categories/viewCategory');
       }else{
            flash('category_deletetion_failed', 'Unable to delete Category', 'alert alert-danger');
            redirect('categories/viewCategory');
           die();
       }
   
    }





    /**
     * updateCategory
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function updateCategory($id){
        
        $category = $this->categoryModel->getCategories();
        $row = $this->categoryModel->findCategoryById($id);

        if($this->request_is_post()){

                //Sanitize and process form
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'categories' => $category,
                    'title-bar' => ' category',
                    'category_name' => '',
                    'category_name_err' => ''
                ];
    
                $value = $_POST['category_name'];
                $value = isset($value) ? trim($value) : '';
    
                if(empty($value)){
                    $data['category_name_err'] = "Category name is required.";

                }else{
                    $data['category_name_err'] = '';
                }

                if(isset($value) && !empty($value)){
                    $data['category_name'] = $value;
                }

                if(empty($data['category_name_err'])){


                    if($this->categoryModel->findCategoryByName($data)){

                        flash('category_already_exist', 'Category already exist', 'alert alert-danger');
                        redirect('categories/viewCategory');
                        die();
                       
                    }else{
                         //save user record
                        if($this->categoryModel->updateCategory($id, $data)){
                            flash('category_updated', 'Category updated successfully');
                            redirect('categories/viewCategory');
                        }else{
                            flash('category_update_failed', 'Unable to Update Category', 'alert alert-danger');
                            redirect('categories/viewCategory');
                            die();
                        }
                    }
                    

                }else{
                    $this->view('categories/category', $data);
                }
    
        
        }else{

        $data = [
            'update' => true,
            'categories' => $category,
            'title-bar' => ' category',
            'category_name' => htmlspecialchars($row->cat_title),
            'cat_id' => urlencode($row->cat_id),
            'category_name_err' => ''
        ];

        $this->view('categories/category', $data);
        }
    }
}