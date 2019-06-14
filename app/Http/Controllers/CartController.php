<?php

namespace Ngea\Http\Controllers;

use Illuminate\Http\Request;

use Ngea\Http\Requests;

use Illuminate\Support\Facades\Redis;

use View;

use Yajra\Datatables\Datatables;

class CartController extends Controller
{
	public function viewCart (Request $request){
		$redisKeys = Redis::keys('*');
		$items = array();
		foreach ($redisKeys as $key => $value) {
			//bad if statement, very bad, extremly in a hurry
			if ($value != 'total_items' && strpos($value, 'count') == false && $value != 'random') {
				$tempArray = null;
				$tempArray = Redis::get($value);				
				$tempArray = json_decode($tempArray, true);

				if ($tempArray !== null) {
					foreach ($tempArray as $key_array => $array_items) {
						foreach ($array_items as $key => $value) {
							$tempArray = null;
							$tempArray = array('item' => $key_array ,'quantity' => $value['quantity']);
							array_push($items, $tempArray);
						}
				
					}
				}

	
			}
		}

	
		return View::make('viewcart', compact('items'));

	}

	public function addToCart ($token, $cartItem){
        try {
			$quantity = 1;
			$total_items = Redis::get('total_items') + $quantity;
			$item_count = Redis::get($cartItem.'_count') + $quantity;

			$cart = array('token' => $token,  'quantity' => $item_count);
			$newCart[$cartItem][] = $cart;

			Redis::set('total_items', $total_items);
			Redis::set($cartItem.'_count', $item_count);
			Redis::set($cartItem, json_encode($newCart));

            return response()->json(
                $total_items
            );                    
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }
 
	}

    public function getItems()
    {
		$redisKeys = Redis::keys('*');
		$items = array();
		foreach ($redisKeys as $key => $value) {
			if ($value != 'total_items' && strpos($value, 'count') == false) {
				$tempArray = null;
				$tempArray = Redis::get($value);
				
				$tempArray = json_decode($tempArray, true);
				foreach ($tempArray as $key_array => $array_items) {
					foreach ($array_items as $key => $value) {
						$tempArray = null;
						$items['data'][] = array('item' => $key_array ,'quantity' => $value['quantity']);
					}
			
				}
	
			}
		}

        return json_encode($items);
    }

}
