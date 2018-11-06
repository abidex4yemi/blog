<?php
    class Users extends Controller{
        public function __construct()
        {
            $this->userModel = $this->model('User');
        }
        
        public function index()
        {
            redirect('pages/index');
        }


        /**
         * register new user
         *
         * @return void
         */
        public function register()
        {
            //check user request type
            if($this->request_is_post()){
                //Sanitize and process form
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'first_name' => '',
                    'last_name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'title-bar' => 'Register',
                    'role' => '',
                    'image' => ''
                ];
                
                //cycle over Super global array
                foreach($_POST as $key => $value){
                    $value = isset($value) ? trim($value) : '';

                    if(empty($value)){
                        if($key == 'role'){
                            continue;
                        }
                        $data[$key . '_err'] = ucwords(str_replace('_', ' ', $key)) . " is required.";
                    }else{
                        $data[$key . '_err'] = '';
                    }

                    if(isset($value) && !empty($value)){
                        $data[$key] = $value;
                    }
                }

                //get user role
                $role = $_POST['role'];
                $data['role'] = $role;

                $image = 'image.jpg';
                $data['image'] = $image;

                if(empty($data['password_err'])){
                    if(strlen($data['password']) < 6){
                        $data['password_err'] = "Password must be atleast 6 character.";
                    }
                }

                if(empty($data['confirm_password_err'])){
                    if(strlen($data['password']) !== strlen($data['confirm_password'])){
                        $data['confirm_password_err'] = "Password does not match";
                    }
                }



                //check if user already exist
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = "Email already taken try another email.";
                }

                if(empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['email_err'])){
                    //hash user password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //save user record
                    if($this->userModel->register($data)){
                        flash('register_success', 'Registration successful, log in');
                        redirect('users/login');
                    }else{
                        die();
                    }

                }else{
                    $this->view('users/register', $data);
                }
                
            }else{
                //This is a GET request 
                //load form
                $data = [
                    'first_name' => '',
                    'last_name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'title-bar' => 'Register',
                    'first_name_err' => '',
                    'last_name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'role' => '',
                    'image' => ''
                ];
    
                $this->view('users/register', $data);
            }
        }


        

        /**
         * login
         *
         * @return void
         */
        public function login()
        {   
             //generate token
             $tokens = $this->csrf_token_tag();

            if($this->request_is_post()){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'email' => '',
                    'password' => '',
                    'title-bar' => 'login',
                    'tokens' => '',
                    'tokens_err' => ''
                ];
                
                //cycle over Super global array
                foreach($_POST as $key => $value){
                    $value = isset($value) ? trim($value) : '';

                    if(empty($value)){
                        if($key == 'csrf_token'){
                            continue;
                        }
                        $data[$key . '_err'] = ucwords(str_replace('_', ' ', $key)) . " is required.";
                    }else{
                        $data[$key . '_err'] = '';
                    }

                    //collect data
                    if(isset($value) && !empty($value)){
                        $data[$key] = $value;
                    }
                }


                if(empty($data['email_err'])){
                    //Find user by email
                    if($this->userModel->findUserByEmail($data['email'])){
                        
                    }else{
                        $data['email_err'] = "Invalid email address.";
                    }
                }

                if($this->csrf_token_is_valid()){
                    $data['tokens_err'] = '';
                }else{
                    $data['tokens_err'] = 'Invalid request';
                }

                if($this->csrf_token_is_recent()){
                    $data['tokens_err'] = '';
                }else{
                    $data['tokens_err'] .= ': something went wrong.';
                }


                //check if form values are all valid
                if(empty($data['password_err']) && empty($data['email_err']) && empty($data['tokens_err'])){
                    //check and set logged in user
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    if($loggedInUser){
                        after_successful_login();
                        $this->createUserSession($loggedInUser);
                        if($_SESSION['user_role'] === 'admin'){
                            redirect('pages/admin');
                        }else{
                            redirect('Pages/post');
                        }
                    }else{
                        //set error
                        $data['all_err'] = "Invalid username/password";

                        //load view
                        $this->view('users/login', $data);
                    }
                    

                }else{
                    $this->view('users/login', $data);
                }


            }else{
               
                $data = [
                    'tokens' => $tokens,
                    'email' => '',
                    'password' => '',
                    'token' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'title-bar' => 'login'
                ];

                $this->view('users/login', $data);
            }
        }




        /**
         * get user user details into session
         *
         * @param  mixed $user
         *
         * @return void
         */
        public function createUserSession($user)
        {
            session_regenerate_id();
            $_SESSION['user_name'] = $user->first_name;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_role'] = $user->role;
            $_SESSION['user_image'] = $user->image;
        }

        
        public function logout()
        {
            after_successful_logout();
            redirect('Pages/index');
        }
    }