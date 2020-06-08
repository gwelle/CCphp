<?php
namespace carsery\Managers;

use carsery\core\DB;
use carsery\models\Post;
use carsery\core\Helpers;
use carsery\core\QueryBuilder;

class PostManager extends DB {
    
    public function __construct()
    {
        parent::__construct(Post::class, 'posts');
    }

    
    public function getUserPost(int $id){

        return (new QueryBuilder())
        ->select('p.*, u.*')
        ->from('ymnx_posts','p')
        ->join('ymnx_users','u')
        ->where('p.author = :iduser', $id)
        ->getQuery()
        ->getArrayResult(Post::class)
        ;

    }

    
    
}