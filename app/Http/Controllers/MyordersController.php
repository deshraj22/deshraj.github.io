<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\myorders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MyordersController extends Controller
{
    public function index(Request $request){
        // Printing the value of myorderid // Or use dd($myorderid) for debugging
         $myorders_result=myorders::select('*')
        ->where('userID',Auth::id())
        ->where('payment_status','1')
        ->orderBy('created_at', 'desc')
        ->get()
        ->toArray();
        return view('Myorders')->with(['myorders_result'=>$myorders_result]);
    }
    public function returnproduct($productID){
         myorders::where('id',$productID)->where('userID',Auth::id())->update([
            'delivery_status'=>'Returned',
         ]);
        $myorder_returned=myorders::select('delivery_status')->where('id',$productID)->where('userID',Auth::id())->get()->toArray();
        if($myorder_returned['0']['delivery_status']=='Returned'){
            return redirect()->back()->with('statusUpdate',true);
        }

    }
   
}
