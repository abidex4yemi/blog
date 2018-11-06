<?php
    /**
      *App Core class
      *Creates Url & loads Core controller
      *URL Format - /controller/method/params
    */
    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct()
        {
            $url = $this->getUrl();
            //check if controller class exist
            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
                $this->currentController = ucwords($url[0]);
                //unset controller from the url array
                unset($url[0]);
            }



            //Require the requested controller
            require_once "../app/controllers/" . $this->currentController . '.php';

            //Instantiate requested controller class
            $this->currentController = new $this->currentController();

            //check if method is set from the url address bar
            if(isset($url[1])){
                //check if method exist in controller class
                if(method_exists($this->currentController, $url[1])){
                    $this->currentMethod = $url[1];
                    //unset method from the url array
                     unset($url[1]);
                }else{
                    $this->currentMethod = 'index';
                }
            }

            //get requested controller name and method name
            $this->params = $url ? array_values($url) : [];

             //Call a callback function with array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

        }

        /**
         * getUrl form addres bar
         *
         * @return string $url
         */
        public function getUrl()
        {
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);

                return $url;
            }
        }
      }