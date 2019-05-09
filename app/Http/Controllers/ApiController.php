<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
use App\Order;

class ApiController extends Controller
{
    public function getItemPrice(Request $request){
        //echo $request->skuId; 
        $price = DB::table("Products")
        ->select('selling_price','sku','id')
        ->where("id", $request->skuId)
        ->get();
        $selling_price = json_encode($price);
        //print_r($price); die;
        return response()->json($selling_price);
    }

    public function getItemProfit(Request $request){
        //echo "ok"; die;
        $quantity = $request->quantity;
        $price = DB::table("Products")
        ->select('selling_price','buying_price')
        ->where("id", $request->sku)
        ->get();
        $selling_price = $price[0]->selling_price;
        $buying_price = $price[0]->buying_price;
        
        $profit = (($selling_price - $buying_price) * $quantity);
        echo $profit;
        //print_r($price); die;
        //return response()->json($selling_price);
    }

    public function getReports(Request $request)
    {
        $filterOn = $request->filterOn;
        
        $firstDateOfLastMonth =  date('Y-m-d 00:00:00', strtotime('first day of last month'));
        $lastDateOfLastMonth =  date('Y-m-d 00:00:00', strtotime('last day of last month'));
        
        $firstDateOfLastMonth = '2019-05-06';
        $lastDateOfLastMonth = '2019-05-09';

        $date1 = new DateTime($firstDateOfLastMonth);
        $date2 = new DateTime($lastDateOfLastMonth);
        $dt1 = $date1->format('Y-m-d');
        $dt2 = $date2->format('Y-m-d');

        if($filterOn == 'profit')
        {
            $orders = DB::table('orders')
            ->join('subcategories', 'subcategories.id', '=', 'orders.subcategory_id')
            ->join('categories as categories', 'categories.id', '=', 'orders.category_id')
            ->select('orders.*', 'categories.name as category_name', 'subcategories.name as subcategory_name')
            ->whereBetween('orders.order_date', [$dt1, $dt2])
            ->orderBy('item_profit',  'desc')
            ->take(5)
            ->get();
            echo json_encode($orders);
        }

        if($filterOn == 'quantity')
        {
            $orders = DB::table('orders')
            ->join('subcategories', 'subcategories.id', '=', 'orders.subcategory_id')
            ->join('categories as categories', 'categories.id', '=', 'orders.category_id')
            ->select('orders.*', 'categories.name as category_name', 'subcategories.name as subcategory_name')
            ->whereBetween('orders.order_date', [$dt1, $dt2])
            ->orderBy('item_quantity',  'desc')
            ->take(5)
            ->get();
            echo json_encode($orders);
        }

        if($filterOn == 'all')
        {
            $orders = DB::table('orders')
            ->join('subcategories', 'subcategories.id', '=', 'orders.subcategory_id')
            ->join('categories as categories', 'categories.id', '=', 'orders.category_id')
            ->select('orders.*', 'categories.name as category_name', 'subcategories.name as subcategory_name')
            ->get();
            echo json_encode($orders);
        }
        if($filterOn == 'parent')
        {
            $orders = DB::table('orders')
            ->join('subcategories', 'subcategories.id', '=', 'orders.subcategory_id')
            ->join('categories as categories', 'categories.id', '=', 'orders.category_id')
            ->select('orders.*', 'categories.name as category_name', 'subcategories.name as subcategory_name', DB::raw('sum(item_quantity) as item_quantity'), DB::raw('sum(item_price) as item_price'), DB::raw('sum(item_profit) as item_profit'))
            ->groupBy('orders.category_id')
            ->get();
            echo json_encode($orders);
        }
        
    }



}