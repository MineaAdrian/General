<?php

class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        //check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Process for

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init Data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            //Validate Email
            if (empty($data['email'])) {
                $data['email_error'] = 'Please enter the email!';
            } else {
                //Check email in db
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_error'] = 'Email is already taken!';
                }
            }

            //Validate Name
            if (empty($data['name'])) {
                $data['name_error'] = 'Please enter the name!';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['password_error'] = 'Please enter the password!';
            } elseif (strlen($data['password']) < 6) {
                $data['password_error'] = 'Password length must be greater than 6!';
            }

            //Validate confirm password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_error'] = 'Please confirm password!';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_error'] = 'Passwords do not match!';
                }
            }
            //Make sure errors are empty
            if (empty($data['email_error']) && empty($data['name_error']) && empty($data['password_error'])
                && empty($data['confirm_password_error'])) {
                //Validated

                //Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register User
                if ($this->userModel->register($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('/users/login');
                } else {
                    die('Something went wrong!');
                }
            } else {
                //Load view with errors
                $this->view('users/register', $data);
            }

        } else {
            //Init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            //Load view
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        //check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init Data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_error' => '',
                'password_error' => ''
            ];

            //Validate Email
            if (empty($data['email'])) {
                $data['email_error'] = 'Please enter the email!';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['password_error'] = 'Please enter the password!';
            } elseif (strlen($data['password']) < 6) {
                $data['password_error'] = 'Password length must be greater than 6!';
            }

            //Check for user/email
            if ($this->userModel->findUserByEmail($data['email'])) {
                //User found
            } else {
                //User not found
                $data['email_error'] = 'No user found';
            }

            //Make sure errors are empty
            if (empty($data['email_error']) && empty($data['password_error'])) {
                //Validated
                //Check and set login user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    //Create Session variables
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_error'] = 'Password incorrect';
                    $this->view('users/login', $data);
                }
            } else {
                //Load view with errors
                $this->view('users/login', $data);
            }

        } else {
            //Init data
            $data = [
                'email' => '',
                'password' => '',
                'email_error' => '',
                'password_error' => ''
            ];

            //Load view
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($loggedInUser)
    {
        $_SESSION['user_id'] = $loggedInUser->id;
        $_SESSION['user_email'] = $loggedInUser->email;
        $_SESSION['user_name'] = $loggedInUser->name;
        redirect('/pages/index');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('/users/login');
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
}
