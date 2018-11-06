<?php
class Posts extends Controller {
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {    
        before_every_protected_page();
        //get post model
        $this->postModel = $this->model('Post');
        
        //get user model
        $this->userModel = $this->model('User');

        //get category model
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
     * viewAllPosts
     *
     * @return void
     */
    public function viewAllPosts()
    {
        $posts = $this->postModel->getPosts();

        $data = [
            'posts' => $posts,
            'title-bar' => ' post',
            'post_title' => '',
            'user_id' => '',
            'cat_id' => '',
            'post_image' => '',
            'post_content' => '',
            'post_tags' => '',
            'post_comment_count' => '',
            'post_status' => ''

        ];

        $this->view('posts/post', $data);
    }


    
    /**
     * addPost
     *
     * @return void
     */
    public function addPost(){
        $categories = $this->categoryModel->getCategories();
        //check if request is post or get
        if($this->request_is_post()){
            //Sanitize Post Array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => '',
                'category' => '',
                'image' => 'post_3.jpeg',
                'tags' => '',
                'content' => '',
                'user_id' => intval($_SESSION['user_id']),
                'title-bar' => 'Add new post',
                'categories' => $categories
            ];

            //validate user input
            //cycle over Super global array
            foreach($_POST as $key => $value){
                $value = isset($value) ? trim($value) : '';

                if(empty($value)){
                    $data[$key . '_err'] = ucwords($key) . " is required.";

                }else{
                    $data[$key . '_err'] = '';
                }

                //collect data
                if(isset($value) && !empty($value)){
                    $data[$key] = $value;
                }
            }

            //make sure no error
            if(empty($data['title_err']) && empty($data['category_err']) && empty($data['image_err']) && empty($data['tags_err']) && empty($data['content_err'])){

                //validation successful
                if($this->postModel->addPost($data)){
                    //users feedback
                    flash('post_added', 'Post Added successfully');
                    redirect('posts/viewAllPosts');
                }else{
                    //users feedback
                    flash('post_failed', 'Unabled to add post');
                    redirect('posts/add-post');
                    die();
                }

            }else{
                //load view with error
                $this->view('posts/add-post', $data);
            }

        }else{
            
            $data = [
                'title-bar' => 'Add new post',
                'title_err' => '',
                'category_err' => '',
                'image_err' => '',
                'tags_err' => '',
                'content_err' => '',
                'title' => '',
                'category' => '',
                'image' => '',
                'tags' => '',
                'content' => '',
                'categories' => $categories
            ];

            $this->view('posts/add-post', $data);
        }
    }
}