<?php

require_once ABS_APP_PATH.'/models/Post.php';

class PostMockService
{

    public $result;

    public function all() {
        $this->result = 'hoho';
    }

    public function find($id) {
        $this->result = new Post($id, 1, 'haha');
    }

}