<?php
    class Pages extends Controller{
        public function __construct()
        {
            $this->categoryModel = $this->model('Category');
            $this->postModel = $this->model('Post');
        }

        /**
         * index
         *
         * @return void
         */
        public function index()
        {
            $categories = $this->categoryModel->getCategories();
            $data = [
                'categories' => $categories,
                'title' => 'Welcome to Codemind Blog!',
                'title-bar' => ' Home',
                'description' => 'A Blog for the NERD!'
            ];

            $this->view('pages/index', $data);
        }

        /**
         * about
         *
         * @return void
         */
        public function about()
        {
            $data = [
                'title' => 'About Codemind Blog',
                'title-bar' => ' About',
                'description' => 'We are heare to eduducate and inspire upcomming developers...'
            ];

            $this->view('pages/about', $data);
        }


         /**
         * admin
         *
         * @return void
         */
        public function admin()
        {
            before_every_protected_page();
            
            $data = [
                'title-bar' => ' Admin'
            ];

            $this->view('pages/admin', $data);
        }


        /**
         * blog_posts
         *
         * @param  int $id
         *
         * @return json
         */
        public function blog_posts($id)
        {
            if($this->is_ajax_request()){
                //get page number
                $current_page = intval($id);

                //count all posts
                $total_posts = intval($this->postModel->count_posts());
                if($total_posts === 0 || $total_posts === false){

                    redirect('pages/index');
                    exit;
                }
                $posts_per_page = 2;

                //Calculate how many pages in total
                $total_pages = ceil($total_posts / $posts_per_page);
                
                //redirect to last page if current page is larger than tottal pages
                if($current_page > $total_pages){
                    $total_pages = 0;
                }elseif($current_page < 1){
                    $current_page = 1;
                }

                //Determine first  post sets per page 
                $start = (($current_page - 1) * $posts_per_page) + 1;
                
                //Determine last  product sets per page 
                $end = $current_page * $posts_per_page;
                
                //reste last post to end
                if($end > $total_posts){
                    $end = $total_posts;
                }

                //get blog post
                $blog_posts = $this->postModel->get_products_subset($start, $end);
                $url_root = URL_ROOT;
                $html = "";
                foreach($blog_posts as $blog_post){
                   $post_image = htmlentities($blog_post->post_image);
                   $author = htmlentities(ucwords($blog_post->user_name));
                   $created_at = htmlentities($blog_post->postCreatedAt);
                   $body = htmlentities($blog_post->post_content);
                    
                    $tags = explode(",", $blog_post->post_tags);
                    $hash_tag = '';
                    foreach($tags as $tag){
                        
                        $hash_tag .= "<a href='#'>#" . trim($tag) . "</a>  ";
                    }
                    


                    $html .= <<<EOT
<div class="blog-post mb-3">
<div class="card mb-3">
<a href="#">
<img class="card-img-top img-fluid w-100" src="$url_root/img/post_images/$post_image"
alt="">
</a>

<div class="card-body">
<h6 class="card-title mb-1"><a href="#">$author</a></h6>
<p class="card-text small">$body
</p>
<p>$hash_tag</p>
</div>
<hr class="my-0">
<div class="card-body py-2 small">
<a class="mr-3 d-inline-block" href="#">
<i class="fa fa-fw fa-thumbs-up"></i>Like</a>
<a class="mr-3 d-inline-block" href="#">
<i class="fa fa-fw fa-comment"></i>Comment</a>
<a class="d-inline-block" href="#">
<i class="fa fa-fw fa-share"></i>Share</a>
</div>
<div class="card-footer small text-muted">$created_at</div>
</div>
</div>
<!-- /.blog-post -->
EOT;
                }
                echo json_encode(['total_pages' => $total_pages, 'html' => $html]);

            }else{
                die();
            }
        }

    }