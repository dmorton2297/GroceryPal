<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\FoodItem;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function welcome() {
        // We need to load all data from the FoodItem table
        $items = FoodItem::all();
        return view('welcome', ['items' => $items]);
    }

    public function addfood() {
        return view('addfood');
    }

    public function storeFood(Request $request) {
        $foodItem = new FoodItem();
        $foodItem -> item = $request->input('item');
        $foodItem -> description = $request->input('description');
        
        $inPantry = $request->input('inPantry');
        $inGroceryList = $request->input('inGroceryList');

        if ($inPantry != '') {
            $foodItem -> inPantry = true;
        } else {
            $foodItem -> inPantry = false;
        }

        if ($inGroceryList != '') {
            $foodItem -> inGroceryList = true;
        } else {
            $foodItem -> inGroceryList = false;
        }
        // the webpage says the created at and date are automatically set ?
        $date = date('Y-m-d H:i:s');
        $foodItem -> created_at = $date;
        $foodItem -> updated_at = $date;

        if(!$foodItem -> save()) {
            return "An error occured here. Please reload the page and fill in all fields of the form.";
        }

        return $this->welcome();

    }

    public function deleteFood(Request $request) {
        /*$foodItem = new FoodItem();
        $foodItem -> item = $request->input('item');
        $foodItem -> description = $request->input('description');
        $inPantry = $request->input('inPantry');
        $inGroceryList = $request->input('inGroceryList');
        
        // not sure if i should set any variable to true and false
        if ($inPantry != '') {
            $foodItem -> inPantry = true;
        } else {
            $foodItem -> inPantry = false;
        }
        
        if ($inGroceryList != '') {
            $foodItem -> inGroceryList = true;
        } else {
            $foodItem -> inGroceryList = false;
        }
        
        if(!$foodItem -> delete()) {
               return "An error occured here. Please reload the page and fill in all fields of the form.";
        }
        
        return $this->welcome();*/
    }

}
