<?php

/**
 * PostController for rendering list and detail
 * @author hoangpt
 */
class PostController
{

    public $service;//tesable code

    public function __construct($service)
    {
        $this->service = $service;
    }

    /**
     * list
     * @author hoangpt
     */
    public function index()
    {
        // we store posts in variable and past to view
        $posts = $this->service->all();
        require_once(ABS_APP_PATH . '/views/posts/index.php');
    }

    /**
     * detail
     * @author hoangpt
     */
    public function show()
    {
        // we expect a url of form ?controller=posts&action=show&id=x
        // without an id we just redirect to the error page as we need the post id to find it in the database
        if (!isset($_GET['id']) || !is_int($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post
        $post = $this->service->find($_GET['id']);
        require_once('views/posts/show.php');
    }
}