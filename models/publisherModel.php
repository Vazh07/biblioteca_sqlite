<?php

class publisherModel extends Model {

  static $publishers =[
    ['id'=>1,  'publisher'=>'John Wiley & Sons', 'country'=>'United States', 'founded'=>1807, 'genre'=>'Academic','books'=>[['book_id'=>1, 'name'=>'Operating System Concepts'],['book_id'=>2, 'name'=>'Database System Concepts']]],
    ['id'=>2,  'publisher'=>'Pearson Education', 'country'=>'United Kingdom', 'founded'=>1844, 'genre'=>'Education', 'books'=>[['book_id'=>3, 'name'=>'Computer Networks'],['book_id'=>4, 'name'=>'Modern Operating Systems']]]
  ];

  public static function all() { 
    return self::$publishers; 
  }

  public static function find($id) {
    foreach (self::$publishers as $key => $publisher)
      if ($publisher['id'] == $id) return $publisher;
    return [];
  }
}
?>