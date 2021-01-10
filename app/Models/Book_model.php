<?php

namespace App\Models;

use CodeIgniter\Model;

class Book_model extends Model
{
    public function getBook()
    {
        $get = $this->db->table('book');
        return $get->get();
    }

    public function saveBook($data)
    {
        $query = $this->db->table('book')->insert($data);
        return $query;
    }

    public function updateBook($data, $id)
    {
        $query = $this->db->table('book')->update($data, array('id_book' => $id));
        return $query;
    }

    public function deleteBook($id)
    {
        $query = $this->db->table('book')->delete(array('id_book' => $id));
        return $query;
    }
}
