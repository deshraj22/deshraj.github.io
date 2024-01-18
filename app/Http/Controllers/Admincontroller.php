<?php

namespace App\Http\Controllers;
use App\Models\user;
use App\Models\myorders;
use App\Models\ALLproducts;
use App\Models\orderplaced;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;
class Admincontroller extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function adminAUTH(Request $request){
    $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();
    
        if ($user && $user->password === $credentials['password']) {
            // Authentication successful
            Auth::login($user);
            return view('admin.admindashboard');
        } else {
            // Authentication failed
            return view('admin.login')->withErrors(['error_login' => 'No Match Found']);
        }
    }
   
public function addproducts(){
    return view('admin.addproducts');
}
public function logout(){
    Auth::logout();
    return redirect('/');
}
public function productdata(Request $request){
    // $A=$request->file('productImage')->getClientOriginalName();
    $validate=$request->validate([
    'productImage'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    'Price'=>'required|numeric'
    ]);
   
$image=$request->file('productImage');
$filename=uniqid().'.'.$image->getClientOriginalExtension();
$image->move(public_path('images/productImages'), $filename);
$ALLproducts=new ALLproducts();
$ALLproducts->name=$request->ProductName;
$ALLproducts->description=strip_tags($request->description);
$ALLproducts->image ='images/productImages/' .$filename;
$ALLproducts->category=$request->Category;
$ALLproducts->status='1';
$ALLproducts->price=$request->Price;
$ALLproducts->Total_no_of_product=$request->ProductsCount;
$ALLproducts->sold=0;
$ALLproducts->save();
return redirect()->route('addproduct')->with('success', 'Product added successfully!');
}
public function orders(){
    return view('admin/allorders');
}
public function orderdetails(){
    $orders = orderplaced::select('*')->get()->toArray();
    return DataTables::of($orders)
    ->addColumn('action', function ($orders) {
        if($orders['status']=="Out For Delivery"){
            return '<a class="btn btn-icon" href="/orderdelivered/'.$orders['userID'].'/'.$orders['productID'].'" style="margin-right:10px;color:white;font-weight:bolder;background-color:#575fcf" id="delivered"><i class="fas fa-shipping-fast" style="margin-right:2px"></i>Delivered</i></a>' ;
        }
        elseif($orders['status']=="Deliverd"){
            return '<a class="btn btn-icon  btn-success" style="margin-right:10px;color:white;font-weight:bolder;background-color:##eb2f06" ><i class="fas fa-check" style="margin-right:2px"></i>Successfull</i></a>' ;
        }
        else{
            return '<a class="btn btn-icon btn-success" href="/acceptorder/'.$orders['userID'].'/'.$orders['productID'].'" style="margin-right:3px" id="tick"><i class="fa fa-check"></i></a>' .
            '<a class="btn btn-icon btn-danger" href="/declineorder" id="cut"><i class="fa fa-times"></i></a>';
        }
       
    })
    ->rawColumns(['action']) // Mark the 'action' column as raw HTML
    ->make(true);
}
public function acceptorder($userid,$productid){
    myorders::where(['userID'=>$userid,'productID'=>$productid])
    ->update(['delivery_status'=>'Out For Delivery']);
    orderplaced::where(['userID'=>$userid,'productID'=>$productid])
    ->update(['status'=>'Out For Delivery']);
    return back();

}
public function orderdelivered($userid,$productid){
    myorders::where(['userID'=>$userid,'productID'=>$productid])
    ->update(['delivery_status'=>'Deliverd']);
    orderplaced::where(['userID'=>$userid,'productID'=>$productid])
    ->update(['status'=>'Deliverd']);
    return back();

}
}
