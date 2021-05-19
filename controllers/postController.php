<?php

class postController extends Controller
{
    public function index()
    {
        $posts = [
            [
                'title' => 'Post title',
                'content' => 'Post Content here',
                'created_at' => \Carbon\Carbon::now()
            ], [
                'title' => 'Post title 2',
                'content' => 'Post Content here 2',
                'created_at' => \Carbon\Carbon::now()
            ]
        ];

        $this->loadView('post/index', $posts);
    }
    /**
     * Show Detail Post
     */
    public function detail()
    {
        $this->loadModel('post');
        $postData = [
            'title' => 'Post title',
            'content' => 'Post Content here',
            'created_at' => \Carbon\Carbon::now()
        ];

        $this->loadView('post/detail', $postData);
    }

}