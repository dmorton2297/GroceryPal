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

    public function index() {
        return redirect()->route('welcome');
    }

    public function welcome() {
        // We need to load all data from the FoodItem table
        $items = FoodItem::all();
        return view('welcome', ['items' => $items, 'stacked' => false]);
    }

    public function welcomeStacked() {
         $items = FoodItem::all();
        return view('welcome', ['items' => $items, 'stacked' => true]);
    }

    public function addfood() {
        return view('addfood', ['message'=>'']);
    }

    public function addFoodPresentMessage($message) {
         return view('addfood', ['message'=>$message]);
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



        if ($inGroceryList == '' && $inPantry == '') {
            return $this -> addFoodPresentMessage("Select an item to be in grocery list or pantry.");
        } else if ($inGroceryList != '' && $inPantry != '') {
            return $this -> addFoodPresentMessage("An item cannot be in both grocery list and pantry.");
        } else if ($foodItem -> item == '' || $foodItem -> description == '') {
            return $this -> addFoodPresentMessage('One of the required field (Item name and Item description) has not been filled out.');
        }
        
        // the webpage says the created at and date are automatically set ?
        $date = date('Y-m-d H:i:s');
        $foodItem -> created_at = $date;
        $foodItem -> updated_at = $date;
        $foodItem -> userId = Auth::user()->id;

        if(!$foodItem -> save()) {
            return "An error occured here. Please reload the page and fill in all fields of the form.";
        }

       return redirect()->route('welcome');

    }

    public function deleteFood($id, $pageLayout) {

        $toDelete = FoodItem::find($id);
        if ($toDelete) {
            $toDelete -> delete();
        }

        if ($pageLayout == 0) {
            return redirect()->route('welcome');
        } else {
            return redirect()->route('welcomeStacked');
        }
        


    }
    public function moveFood($item, $pageLayout) {

        $toMove = FoodItem::find($item);
        if (!$toMove-> inPantry) {
            $toMove-> inGroceryList = false;
            $toMove-> inPantry = true;
            $toMove -> save();
        } else {
            $toMove-> inGroceryList = true;
            $toMove-> inPantry = false;
            $toMove-> save();
        }

    	if ($pageLayout == 0) {
    		return redirect()->route('welcome');
    	}
    	else {
            	return redirect()->route('welcomeStacked');
    	}
    }

    public function updateFood($id) {
        $toUpdate = FoodItem::find($id);
        return view('updateFood', ['item' => $toUpdate, 'message' => '']);
    }

     public function updateFoodPresentMessage($id, $message) {
        $toUpdate = FoodItem::find($id);
         return view('updateFood', ['item' => $toUpdate, 'message' => $message]);
    }

    public function finishFoodUpdate(Request $request) {
        $foodItem = FoodItem::find($request -> input('id'));
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



        if ($inGroceryList == '' && $inPantry == '') {
            return $this -> updateFoodPresentMessage($foodItem -> id, "Error on this project");
        } else if ($inGroceryList != '' && $inPantry != '') {
            return $this -> updateFoodPresentMessage($foodItem -> id, "Error on this project");
        } else if ($foodItem -> item == '' || $foodItem -> description == '') {
            return $this -> updateFoodPresentMessage($foodItem -> id, 'One of the required field (Item name and Item description) has not been filled out.');
        }
        
        // the webpage says the created at and date are automatically set ?
        $date = date('Y-m-d H:i:s');
        $foodItem -> created_at = $date;
        $foodItem -> updated_at = $date;
        $foodItem -> userId = Auth::user()->id;

        if(!$foodItem -> update()) {
            return "An error occured here. Please reload the page and fill in all fields of the form.";
        }
        return redirect() -> route('welcome');
    }

    public function map() {
        return view('map');
    }

    public function about() {
        return view('about');
    }

    

}
