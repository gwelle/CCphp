<?php

namespace carsery\models;

class User extends Model
{
    protected $id;
    protected $title;
    protected $author;
    
    public function setId($id){
        
        $this->id=$id;
    }

    public function setTitle($title){
        
        $this->title=ucwords(strtolower(trim($title)));
    }
    
    public function setAuthor(User $user){
        
        $this->author = $user->getId();
    }
    
    public function getId(){
        
        return $this->id;
    }

    public function getTitle(){
        
        return $this->title;
    }

    public function getAuthor(){
       
        return $this->author;
    }


}
    
