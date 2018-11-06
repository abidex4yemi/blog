<?php
    class Pages extends Controller{
        public function __construct()
        {
            $this->categoryModel = $this->model('Category');
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

    }