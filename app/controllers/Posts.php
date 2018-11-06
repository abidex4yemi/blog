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
}