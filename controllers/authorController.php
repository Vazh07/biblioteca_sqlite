<?php
  require_once('./models/authorModel.php');
  
  class authorController extends Controller {
    
    public function index() {  
      return view('author/index',
       ['authors'=>authorModel::all(),
        'title'=>'Authors List']);
    }

    public function show($id) {
      $athr = authorModel::find($id);
      return view('author/show',
        ['author'=>$athr,
         'title'=>'Author Detail']);
    }
  }
?>