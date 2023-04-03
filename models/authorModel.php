<?php

class authorModel extends Model {

  static $authors = [
    ['id'=>1, 'author'=>'Abraham Silberschatz', 'nationality'=>'Israelis / American', 'birth_year'=>1952, 'fields'=>'Database Systems, Operating Systems', 'books'=>[['book_id'=>1, 'book_name'=>'Operating System Concepts'],['book_id'=>2, 'book_name'=>'Database System Concepts']]],
    ['id'=>2, 'author'=>'Andrew S. Tanenbaum', 'nationality'=>'Dutch / American',  'birth_year'=>1944,  'fields'=>'Distributed computing, Operating Systems',  'books'=>[['book_id'=>3, 'book_name'=>'Computer Networks'],['book_id'=>4, 'book_name'=>'Modern Operating Systems']]]
  ];

  public static function all() { 
    return self::$authors; 
  }

  public static function find($id) {
    foreach (self::$authors as $key => $auth)
      if ($auth['id'] == $id) return $auth;
    return [];
  }
}
?>