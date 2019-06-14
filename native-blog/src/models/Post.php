<?php

/**
 * Class Post
 * @author hoangpt
 */
class Post
{
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    private $id;
    private $user_id;
    private $title;

    public function __construct($id, $user_id, $title)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
}
