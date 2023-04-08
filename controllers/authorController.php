<?php
require_once('./models/authorModel.php');
require_once('./models/bookModel.php');

class authorController extends Controller {

  public function index() {  
    return view('author/index',
     ['authors'=>authorModel::all(),
     'books'=>bookModel::all(),
     'title'=>'Authors List']);
  }

  public function show($id) {
    $athr = authorModel::where('author_id',$id);
    return view('author/show',
      ['author'=>$athr,
      'books'=>bookModel::where('book_author_id',$id),
      'title'=>'Author Detail']);
  }

  public function create() {
    return view('author/create',
      ['title'=>'Author Create']);
  }  

  public function store($_ = NULL) {
      $author_name = Input::get('author_name'); 
      $author_nationality = Input::get('author_nationality');
      $author_birth_year = Input::get('author_birth_year');
      $author_fields = Input::get('author_fields');
      $item = [
        'author_name'=>$author_name,
        'author_nationality'=>$author_nationality,
        'author_birth_year'=>$author_birth_year,
        'author_fields'=>$author_fields
      ];
      authorModel::create($item);
      return redirect('/author');
    }

    public function edit($id) {
      $athr = authorModel::where('author_id',$id);
      return view('author/edit',
        ['author'=>$athr,
        'books'=>bookModel::where('book_author_id',$id),
        'title'=>'Author Edit']);
    }  

    public function update($_,$id = NULL) {
      $author_name = Input::get('author_name'); 
      $author_nationality = Input::get('author_nationality');
      $author_birth_year = Input::get('author_birth_year');
      $author_fields = Input::get('author_fields');
      $item = [
        'author_name'=>$author_name,
        'author_nationality'=>$author_nationality,
        'author_birth_year'=>$author_birth_year,
        'author_fields'=>$author_fields
      ];
      authorModel::update($id,$item,'author_id');
      return redirect('/author');
    } 
  }
?>