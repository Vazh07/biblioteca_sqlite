<?php
  require_once('./models/publisherModel.php');
  
  class publisherController extends Controller {
    
    public function index() {  
      return view('publisher/index',
       ['publishers'=>publisherModel::all(),
        'title'=>'Publisher List']);
    }

    public function show($id) {
      $publisher = publisherModel::find($id);
      return view('publisher/show',
        ['publisher'=>$publisher,
         'title'=>'Publisher Detail']);
    }
  }
?>