<?php
require_once('./models/authorModel.php');
require_once('./models/bookModel.php');
require_once('logController.php');

class authorController extends Controller {

  public function index() { 
    $athrs = authorModel::all();
    $authors = array_map(function($athr){
      $athr["books"] = bookModel::where('book_author_id',$athr["author_id"]);
      return $athr;
    },$athrs);
    return view('author/index',
     ['authors'=> $authors,
     'title'=>'Authors List']);
  }

  public function show($id) {
    $athr = authorModel::where('author_id',$id);
    $books = bookModel::where('book_author_id',$id);
    return view('author/show',
      ['author'=>$athr,
      'books'=>$books,
      'title'=>'Author Detail']);
  }

  public function create() {
    return view('author/create',
      ['books'=>bookModel::all(),
      'title'=>'Author Create']);
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
    //$this->setBook($item);
    return redirect('/author');
  }

  public function edit($id) {
    $athr = authorModel::where('author_id',$id);
    return view('author/edit',
      ['author'=>$athr,
      'books'=>bookModel::where('book_author_id',$id),
      'allBooks'=>bookModel::all(),
      'title'=>'Author Edit']);
  }  

  public function update($_,$id = NULL) {
    logController::logIt("authorController::update","w","Update Author...\n");
    $author_name = Input::get('author_name'); 
    $author_nationality = Input::get('author_nationality');
    $author_birth_year = Input::get('author_birth_year');
    $author_fields = Input::get('author_fields');
    $books = bookModel::all();
    $item = [
      'author_id' => $id,
      'author_name'=>$author_name,
      'author_nationality'=>$author_nationality,
      'author_birth_year'=>$author_birth_year,
      'author_fields'=>$author_fields
    ];
    $this->setBook($item);
    logController::logIt("authorController::update","a",$id."\t-\t".json_encode($item)."\n");
    authorModel::update($id,$item,'author_id');
    return redirect('/author');
  }

  private function setBook($item){
    $books = bookModel::all();
    array_map(function($book)use($item){
      if(Input::get('book_'.$book["book_id"])==$book["book_id"]){
        $book_item = [
          'book_author_id'=>$item["author_id"],
          'book_author'=>$item["author_name"]
        ];
        bookModel::update($book["book_id"],$book_item,'book_id');
        logController::logIt("authorController::update","a",$book["book_id"]."\t-\t".json_encode($book_item)."\n");
      }
    },$books);
  }
}
?>