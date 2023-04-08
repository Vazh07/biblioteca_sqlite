<?php
  require_once('./models/bookModel.php');
  
  class bookController extends Controller {
    
    public function index() {  
      return view('book/index',
       ['books'=>bookModel::all(),
        'title'=>'Books List']);
    }

    public function show($id) {
      $book = bookModel::where('book_id',$id);
      return view('book/show',
        ['book'=>$book,
         'title'=>'Book Detail']);
    }
  }
?>