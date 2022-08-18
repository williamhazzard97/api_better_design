<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Supplier;
use Log;

class itemController extends Controller
{
    //GET all items from items table (index)
    public function index() {
        return Item::all();
    }

    //GET 1 item from items table based on id (show)
    public function show($id) {
        return Item::find($id);
    }

    //POST a new item (create/store) 
    public function store() {
        return Item::create([
            'user_id' => 1,
            'supplier_id' => 3,
            'item_name' => "New Item",
            'description' => "This is a new product",
            'quantity' => 10,
            'category' => "Household",
            'price' => 9.99,
            'file_path' => null,
        ]);
    }

    //PUT a new set of data into an existing item (update)
    public function update($id) {
        $data = Item::find($id);
        $data->item_name = "Shovel";
        $data->description = "Gardening Tool";
        $data->quantity = 13;
        $data->category = "Gardening & Outdoors";
        $data->price = 12.99;

        $data->update();

        return [
            'success' => $data,
        ];
    }

    //DELETE an existing item based on item id
    public function destroy($id) {
        $data = Item::find($id);
        $data->delete();

        return [
            'success' => $data,
        ];
    }

    //GET results from searching by item name using query strings
    public function searchByItemName(Request $request) {
        return Item::where('item_name', 'ilike', '%' . $request->item_name . '%')->get();
    }

    //GET results of items that are in a specific category and supplied by a specific supplier 
    public function categorySupplier(Request $request) {
        return Item::where('category', 'ilike', '%' . $request->category . '%', 'and', 'supplier_id', 'is', '%' . $request->supplier_id . '%')->get();
    }
    
    //GET the total price of all items not including quantities (total of price column) (aggregate function)
    public function totalPrice(Request $request) {
        Log::info('Line 74 - function started');
        $totalPrice = Item::sum('price');
        return [
            'Total Price' => $totalPrice,
        ];
    }

    //GET the total cost of all items respective of their quantity(Aggregate functions)
}
