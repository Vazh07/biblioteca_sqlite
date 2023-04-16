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
    $this->setAuthor($item);
    $this->setPublisher($item);
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
    logController::logIt("bookController::update","w","Update Book...\n");
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
      'book_pages'=>$book_pages,
    ];
    $this->setAuthor($item);
    $this->setPublisher($item);
    logController::logIt("bookController::update","a",$id."\t-\t".json_encode($item)."\n");
    bookModel::update($id,$item,'book_id');
    return redirect('/book');
  }

  private function setAuthor(&$item){
    $authors = authorModel::all();
    array_map(function($author)use(&$item){
      $author_id = $author["author_id"];
      if(Input::get('author_id')=='author_'.$author_id){
        $item["book_author_id"] = $author_id;
        $item["book_author"] = $author["author_name"];
      }
    },$authors);
  }

  private function setPublisher(&$item){
    $publishers = publisherModel::all();
    array_map(function($publisher)use(&$item){
      $publisher_id = $publisher["publisher_id"];
      if(Input::get('publisher_id')=='publisher_'.$publisher_id){
        $item["book_publisher_id"] = $publisher_id;
        $item["book_publisher"] = $publisher["publisher_name"];
      }
    },$publishers);
  } 
}
?>