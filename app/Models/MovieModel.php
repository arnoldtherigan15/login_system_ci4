<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $table = 'movies';
    protected $allowedFields = ['title', 'genre', 'year', 'rating', 'poster', 'description'];
    protected $useTimestamps = true;

    public function getMovies()
    {
        return $this->findAll();
    }

    public function getMovie($id)
    {
        return $this->where('id', $id)->first();
    }

    public function saveMovie($movie)
    {
        return $this->insert($movie);
    }

    public function updateMovie($id, $movie)
    {
        return $this->update($id, $movie);
    }
}
