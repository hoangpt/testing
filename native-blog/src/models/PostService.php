<?php

require_once ABS_APP_PATH.'/models/Post.php';

class PostService
{
    public function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM post');

        // we create a list of Post objects from the database results
        foreach($req->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['user_id'], $post['title']);
        }

        return $list;
        //return array(1,2,3);
    }

    public function find($id) {
        $db = Db::getInstance();
        // we make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM post WHERE id = :id');//holder
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
        $post = $req->fetch();

        return new Post($post['id'], $post['user_id'], $post['title']);
    }

}