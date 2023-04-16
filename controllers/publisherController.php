<?php
require_once('./models/publisherModel.php');
require_once('./models/bookModel.php');

class publisherController extends Controller {

  public function index() {  
    $pubs = publisherModel::all();
    $publishers = array_map(function($pub){
      $pub["books"] = bookModel::where('book_publisher_id',$pub["publisher_id"]);
      return $pub;
    },$pubs);
    return view('publisher/index',
     ['publishers'=>$publishers,
     'title'=>'Publisher List']);
  }

  public function show($id) {
    $publisher = publisherModel::where('publisher_id',$id);
    $books = bookModel::where('book_publisher_id',$id);
    return view('publisher/show',
      ['publisher'=>$publisher,
      'books'=>$books,
      'title'=>'Publisher Detail']);
  }

  public function create() {
    return view('publisher/create',
      ['books'=>bookModel::all(),
      'title'=>'Publisher Create']);
  }    

  public function store($_ = NULL) {
    $publisher_name = Input::get('publisher_name');
    $publisher_country = Input::get('publisher_country');
    $publisher_founded = Input::get('publisher_founded');
    $publisher_genre = Input::get('publisher_genre');
    $item = [
      'publisher_name' => $publisher_name,
      'publisher_country' => $publisher_country,
      'publisher_founded' => $publisher_founded,
      'publisher_genre' => $publisher_genre
    ];
    publisherModel::create($item);
    //$this->setBook($item);
    return redirect('/publisher');
  }

  public function edit($id) {
    $publisher = publisherModel::where('publisher_id',$id);
    return view('publisher/edit',
      ['publisher'=>$publisher,
      'books'=>bookModel::where('book_publisher_id',$id),
      'allBooks'=>bookModel::all(),
      'title'=>'Publisher Edit']);
  } 

  public function update($_,$id = NULL) {
    logController::logIt("publisherController::update","w","Update Publisher...\n");
    $publisher_name = Input::get('publisher_name');
    $publisher_country = Input::get('publisher_country');
    $publisher_founded = Input::get('publisher_founded');
    $publisher_genre = Input::get('publisher_genre');
    $item = [
      'publisher_id' => $id,
      'publisher_name' => $publisher_name,
      'publisher_country' => $publisher_country,
      'publisher_founded' => $publisher_founded,
      'publisher_genre' => $publisher_genre
    ];
    $this->setBook($item);
    logController::logIt("publisherController::update","a",$id."\t-\t".json_encode($item)."\n");
    publisherModel::update($id,$item,'publisher_id');
    return redirect('/publisher');
  } 

  private function setBook($item){
    $books = bookModel::all();
    array_map(function($book)use($item){
      if(Input::get('book_'.$book["book_id"])==$book["book_id"]){
        $book_item = [
          'book_publisher_id'=>$item["publisher_id"],
          'book_publisher'=>$item["publisher_name"]
        ];
        bookModel::update($book["book_id"],$book_item,'book_id');
        logController::logIt("publisherController::update","a",$book["book_id"]."\t-\t".json_encode($book_item)."\n");
      }
    },$books);
  }
}
?>