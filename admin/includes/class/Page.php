<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 10/26/2015
 * Time: 2:21 PM
 */

class Page {

    private $db;

    public function __construct($conn){
        $this->db = $conn;
    }

    /*
    |------------------------------------------------------------
    |   Create function
    |
    |   @params: $title, $content, $author
    |
    |   This function creates a new page in the database.
    |------------------------------------------------------------
    */
    public function create($title, $content, $author){
        try {
            $sql = "INSERT INTO pages SET title = :title, content = :content, author = :author";
            $q = $this->db->prepare($sql);

            $q->execute(array(':title' => $title, ':content' => $content, ':author' => $author));

            return $q;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /*
    |------------------------------------------------------------
    |   Edit function
    |
    |   @params: $title, $content, $id
    |
    |   This function edits a row in the database and updates
    |   it according to the specified '$id'.
    |------------------------------------------------------------
    */
    public function edit($title, $content, $id){
        try {
            $sql = "UPDATE pages SET title = :title, content = :content, id = :id";
            $q = $this->db->prepare($sql);

            $q->execute(array(':title' => $title, ':content' => $content, ':id' => $id));

            return $q;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /*
    |------------------------------------------------------------
    |   Destroy function
    |
    |   @params: $id
    |
    |   This function deletes a row from the database by the
    |   specified ID.
    |------------------------------------------------------------
    */
    public function destroy($id){
        try {
            $sql = "DELETE FROM pages WHERE id = :id";
            $q = $this->db->prepare($sql);

            $q->execute(array(':id' => $id));

            return $q;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /*
    |------------------------------------------------------------
    |   List all function
    |
    |   This function lists all the pages and displays them.
    |------------------------------------------------------------
    */
    public function list_all(){
        try {
            $sql = "SELECT * FROM pages";
            $q = $this->db->prepare($sql);

            $q->execute();

            return $q;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /*
    |------------------------------------------------------------
    |   List single function
    |
    |   @params: $id
    |
    |   This function lists a single page and displays it.
    |------------------------------------------------------------
    */
    public function list_single($id){
        try {
            $sql = "SELECT * FROM pages WHERE id = :id";
            $q = $this->db->prepare($sql);

            $q->execute(array(':id' => $id));

            return $q;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}