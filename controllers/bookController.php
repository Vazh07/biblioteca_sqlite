<?php
require_once('./models/bookModel.php');
require_once('./models/authorModel.php');
require_once('./models/publisherModel.php');

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

  public function create() {
    return view('book/create',
      ['authors'=>authorModel::all(),
      'publishers'=>publisherModel::all(),
      'title'=>'Book Create']);
  }  

  public function store($_ = NULL) {
    $book_title = Input::get('book_title');
    $book_edition = Input::get('book_edition');
    $book_copyright = Input::get('book_copyright');
    $book_language = Input::get('book_language');
    $book_pages = Input::get('book_pages');
    $item = [
      'book_title'=>$book_title,
      'book_edition'=>$book_edition,
      'book_copyright'=>$book_copyright,
      'book_language'=>$book_language,
      'book_pages'=>$book_pages
    ];
    bookModel::create($item);
    return redirect('/book');
  }

  public function edit($id) {
    $book = bookModel::where('book_id',$id);
    return view('book/edit',
      ['book'=>$book,
      'authors'=>authorModel::all(),
      'publishers'=>publisherModel::all(),
      'title'=>'Book Edit']);
  }  

  public function update($_,$id = NULL) {
    $book_title = Input::get('book_title');
    $book_edition = Input::get('book_edition');
    $book_copyright = Input::get('book_copyright');
    $book_language = Input::get('book_language');
    $book_pages = Input::get('book_pages');
    $item = [
      'book_title'=>$book_title,
      'book_edition'=>$book_edition,
      'book_copyright'=>$book_copyright,
      'book_language'=>$book_language,
      'book_pages'=>$book_pages
    ];
    bookModel::update($id,$item,'book_id');
    return redirect('/book');
  } 
}
?>