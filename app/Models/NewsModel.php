<?php

namespace App\Controllers;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $allowedFields = ['title', 'slug', 'body'];


    public function getNews($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
