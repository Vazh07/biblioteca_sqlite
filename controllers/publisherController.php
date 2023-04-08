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
  }
?>