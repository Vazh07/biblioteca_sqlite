<?php
require_once('./models/publisherModel.php');
require_once('./models/bookModel.php');

class publisherController extends Controller {

  public function index() {  
    return view('publisher/index',
     ['publishers'=>publisherModel::all(),
     'books'=>bookModel::all(),
     'title'=>'Publisher List']);
  }

  public function show($id) {
    $publisher = publisherModel::where('publisher_id',$id);
    return view('publisher/show',
      ['publisher'=>$publisher,
      'books'=>bookModel::where('book_publisher_id',$id),
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
    publisherModel::update($id,$item,'publisher_id');
    return redirect('/publisher');
  } 
}
?>