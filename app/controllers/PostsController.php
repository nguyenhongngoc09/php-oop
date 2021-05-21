<?php

class PostsController extends Controller
{
    protected $postModel;

    public function __construct()
    {
        $this->postModel = $this->model('Post');
    }
    /**
     * Blog list all posts
     **/
    public function index()
    {
        if (!isLoggedIn()) {
            header('location:'. URL_ROOT. '/pages');
        }

        $posts = $this->postModel->getPosts();
        $this->view('posts/index', $posts);
    }

    public function create()
    {
        if(!isLoggedIn()) {
            header("Location: " . URL_ROOT . "/posts");
        }

        $data = [
            'title' => '',
            'content' => '',
            'titleError' => '',
            'contentError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_id' => $_SESSION['user_id'],
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'titleError' => '',
                'contentError' => ''
            ];

            if(empty($data['title'])) {
                $data['titleError'] = 'The title of a post cannot be empty';
            }

            if(empty($data['content'])) {
                $data['contentError'] = 'The body of a post cannot be empty';
            }

            if(empty($data['titleError']) && empty($data['contentError'])) {
                if ($this->postModel->create($data)) {
                    header('Location:'. URL_ROOT . '/posts');
                } else {
                    die('Oops!. Something went wrong.');
                }
            }
        }
        $this->view('posts/create', $data);
    }

    public function update()
    {
        
    }

    public function delete()
    {
        
    }
}