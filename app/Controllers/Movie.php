<?php

namespace App\Controllers;

use App\Models\MovieModel;

class Movie extends BaseController
{
    public function __construct()
    {
        $this->movieModel = new MovieModel();
        $this->validation =  \Config\Services::validation();
    }

    public function index()
    {
        $movies = $this->movieModel->getMovies();
        $data = [
            'title' => 'NetflixFake | Movie List',
            'movies' => $movies
        ];

        return view('movies/index', $data);
    }

    public function detail($id)
    {
        $movie = $this->movieModel->getMovie($id);
        $data = [
            'title' => 'NetflixFake | ' . $movie['title'],
            'movie' => $movie
        ];

        return view('movies/detail', $data);
    }

    public function showAddForm()
    {
        if (session('role') == 'user') return redirect()->to('/movies');
        $data = [
            'title' => 'NetflixFake | Add new movie'
        ];

        return view('movies/create', $data);
    }

    public function save()
    {
        $this->validation->setRuleGroup('movie');
        $posterFile = $this->request->getFile('poster');
        // dd($posterFile);
        if ($posterFile->getError() == 4) {
            $posterName = 'default-movie.png';
        } else {
            $posterName = $posterFile->getRandomName();
            // pindahkan file ke folder img
            $posterFile->move('img', $posterName);
        }
        $movie = [
            'title' => $this->request->getPost('title'),
            'rating' => $this->request->getPost('rating'),
            'genre' => $this->request->getPost('genre'),
            'year' => $this->request->getPost('year'),
            'description' => $this->request->getPost('description'),
            'poster' => $posterName
        ];
        // dd($movie);
        if (!$this->validation->run($movie)) {
            $errors = $this->validation->getErrors();
            session()->setFlashdata('errors', $errors);
            return redirect()->to('/movies/add-movie')->withInput();
        } else {
            session()->setFlashdata('message', 'Add New Movie Success');
            // dd($movie);
            $this->movieModel->saveMovie($movie);
            return redirect()->to('/movies');
        }
    }

    public function delete($id)
    {
        $movie = $this->movieModel->find($id);
        if ($movie['poster'] !== 'default-movie.png') unlink('img/' . $movie['poster']);
        $this->movieModel->delete($id);
        return redirect()->to('/movies');
    }

    public function showEdit($id)
    {
        if (session('role') == 'user') return redirect()->to('/movies');
        $movie = $this->movieModel->getMovie($id);
        $data = [
            'title' => 'NetflixFake | Edit movie data',
            'movie' => $movie
        ];

        return view('movies/edit', $data);
    }

    public function saveEdit($id)
    {

        $this->validation->setRuleGroup('movie');
        $posterFile = $this->request->getFile('poster');
        // dd($posterFile);
        if ($posterFile->getError() == 4) {
            $posterName =  $this->request->getVar('posterOld');
        } else {
            $posterName = $posterFile->getRandomName();
            // pindahkan file ke folder img
            $posterFile->move('img', $posterName);
            unlink('img/' . $this->request->getVar('posterOld'));
        }

        $movie = [
            'title' => $this->request->getPost('title'),
            'rating' => $this->request->getPost('rating'),
            'genre' => $this->request->getPost('genre'),
            'year' => $this->request->getPost('year'),
            'description' => $this->request->getPost('description'),
            'poster' => $posterName
        ];
        // dd($movie);
        if (!$this->validation->run($movie)) {
            $errors = $this->validation->getErrors();
            session()->setFlashdata('errors', $errors);
            return redirect()->to('/movies/edit-movie/' . $id)->withInput();
        } else {
            session()->setFlashdata('message', 'Edit Movie Data Success');
            // dd($movie);
            $this->movieModel->updateMovie($id, $movie);
            return redirect()->to('/movies/' . $id);
        }
    }

    //--------------------------------------------------------------------

}
