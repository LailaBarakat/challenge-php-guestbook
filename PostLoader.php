<?php

class PostLoader{

    private array $postsArray = [];


    public function read (){
        //echo 'reading from file';
        $serialized = file_get_contents('posts.txt');
        $posts = unserialize($serialized);
        $this->postsArray = $posts;

        return $this->postsArray;

        }

    public function write (Post $post){
        //echo 'writing to file';
        array_push($this->postsArray,$post);
        $serialize = serialize($this->postsArray);
        file_put_contents('posts.txt',$serialize);
    }

}