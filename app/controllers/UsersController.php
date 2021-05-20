<?php


class UsersController extends Controller
{
    protected $userModel;

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    /**
     * Logout action
     */
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);

        header('location:'.URL_ROOT . '/users/login');
    }

    /**
     * Login view
     */
    public function login()
    {
        $data = [
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];

            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter username';
            }

            // Validate password
            if (empty($data['password']) ) {
                $data['passwordError'] = 'Please enter password';
            }

            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Username or Password is incorrect.';
                    $this->view('users/login', $data);
                }
            }
        } else {
            if (isLoggedIn()) {
                header('location:'.URL_ROOT . '/pages');
            }

            $this->view('users/login', $data);
        }
    }

    /**
     * User registration
     */
    public function register()
    {
        $data = [
            'username' => '',
            'usernameError' => '',
            'email' => '',
            'emailError' => '',
            'password' => '',
            'passwordError' => '',
            'confirmPassword' => '',
            'confirmPasswordError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter username';
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'username can only accept letters and numbers';
            }

            // Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter correct email format';
            } else {
                // Check email is exist
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['emailError'] = 'The email already taken';
                }
            }

            // Validate password
            if (empty($data['password']) ) {
                $data['passwordError'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['passwordError'] = 'Password must be at least 6 chars';
            }

            // Validate confirm password
            if (empty($data['confirmPassword']) ) {
                $data['confirmPasswordError'] = 'Please enter confirm password';
            } elseif ($data['password'] !== $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Confirm Password does not match with Password';
            }

            if (empty($data['passwordError']) && empty($data['emailError'])
                && empty($data['usernameError']) && empty($data['confirmPasswordError'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->userModel->register($data)) {
                    // Redirect to the login page
                    header('location:'. URL_ROOT . '/users/login');
                } else {
                    die('Something went wrong');
                }
            }
        }

        $this->view('users/register', $data);
    }

    /**
     * @param $user
     */
    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['user_name'] = $user->user_name;
        $_SESSION['user_email'] = $user->user_email;

        header('location:'.URL_ROOT . '/pages');
    }
}