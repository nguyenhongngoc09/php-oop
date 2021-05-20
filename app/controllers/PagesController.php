<?php


class PagesController extends Controller
{
    protected $userModel;

    /**
     * PagesController constructor.
     */
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    /**
     * Index page
     */
    public function index()
    {
        $users = $this->userModel->getUsers();
        $data = [
            'title' => "Homepage Title",
            'users' => $users
        ];

        $this->view('pages/index', $data);
    }


    /**
     * About Page
     */
    public function about()
    {
        $this->view('pages/about');
    }
}