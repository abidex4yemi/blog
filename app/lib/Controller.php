<?php
    /**
     * Base controller
     */
    class Controller {
        /**
         * model
         *
         * @param  mixed $model
         *
         * @return object model
         */
        public function model($model)
        {
            //require the given model name
            require_once "../app/models/" . $model . '.php';

            //instanciate model
            return new $model();
        }

        /**
         * view
         *
         * @param  mixed $view
         * @param  mixed $data
         *
         * @return void
         */
        public function view($view, $data = [])
        {   //check if view exists
            if(file_exists('../app/views/' . $view . '.php')){
                require_once "../app/views/" . $view . '.php';
            }else{
                die();
            }
        }

        /**
         * validate if user request is GET
         * @return bool
         */
        public function request_is_get(){
            return $_SERVER['REQUEST_METHOD'] == 'GET';
        }

        /**
         * validate if user request is POST
         * @return bool
         */
        public function request_is_post(){
            return $_SERVER['REQUEST_METHOD'] == 'POST';
        }

        /**
         * Generate a token for use with CSRF protection.
         * Does not store the token.
         * Example: dbf9ff6ae12df082d21b308a1c5c2c9a
         * @return string
         */
        public function csrf_token(){
            return md5(uniqid(rand(), TRUE));
        }

        /**
         * Generate and store CSRF token in user session
         * Requires session to have been started already
         * @return string $token
         */
        public function create_csrf_token(){
            //get token
            $token = $this->csrf_token();
            $_SESSION['csrf_token'] = $token;
            $_SESSION['csrf_token_time'] = time();
            
            return $token;
        }
        /**
         * Destroy a token by removing it from the session
         * @return bool true
         */
        public function destroy_csrf_token(){
            $_SESSION['csrf_token'] = null;
            $_SESSION['csrf_token_time'] = null;

            return true;
        }


        /**
         * Return an HTML tag including the CSRF token
         * for use in a form.
         * Usage: echo csrf_token_tag();
         * @return string
         */
        public function csrf_token_tag(){
            //generate token
            $token = $this->create_csrf_token();
            return "<input type=\"hidden\" name=\"csrf_token\" value=\"{$token}\">";
        }

        /**
         * Return true if user-submitted POST token is
         * identical to the previously stored SESSION token
         * return false otherwise
         * @return bool 
         */
        public function csrf_token_is_valid(){
            if(isset($_POST['csrf_token'])){
                $user_token = $_POST['csrf_token'];
                $stored_token = $_SESSION['csrf_token'];

                return $user_token === $stored_token;
            }else{
                return false;
            }
        }

        /**
         * You can check the token validity and 
         * handle the failure yourself, or you can use 
         * this "stop-everything-on-failure" function
         */
        public function die_on_csrf_token_failure(){
            if(!$this->csrf_token_is_valid()){
                die("CSRF validation failed");
            }
        }


        /**
         * optional check to see if token is also recent
         * @return mixed
         */
        public function csrf_token_is_recent(){
            $max_elapsed = 60 * 60 * 24; //1 day
            if(isset($_SESSION['csrf_token_time'])){
                $stored_time = $_SESSION['csrf_token_time'];
                return ($stored_time + $max_elapsed) >= time();
            }else{
                //Remove expired token
                $this->destroy_csrf_token();
                return false;
            }
        }
    }