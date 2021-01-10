<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\Book_model;

class Book extends Controller
{
    public function index()
    {
        $model = new Book_model();
        $data['book'] = $model->getBook()->getResult();
        echo view('book', $data);
    }

    public function save()
    {
        $model = new Book_model();
        $data = array(
            'book_title' => $this->request->getPost('book_title'),
            'year'       => $this->request->getPost('book_year'),
        );
        $model->saveBook($data);
        return redirect()->to('/book');
    }

    public function update()
    {
        $model = new Book_model();
        $id = $this->request->getPost('id_book');
        $data = array(
            'book_title' => $this->request->getPost('book_title'),
            'year'       => $this->request->getPost('book_year'),
        );
        $model->updateBook($data, $id);
        return redirect()->to('/book');
    }

    public function delete()
    {
        $model = new Book_model();
        $id = $this->request->getPost('id_book');
        $model->deleteBook($id);
        return redirect()->to('/book');
    }
}
