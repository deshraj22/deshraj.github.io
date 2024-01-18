<?php

namespace App\Http\Controllers;
use App\Models\cart;
use Razorpay\Api\Api;
USE App\Models\ALLproducts;
USE App\Models\user;
use GuzzleHttp\Client;
use App\Models\payment;
use App\Models\myorders;
use App\Models\orderplaced;
use App\Models\userDetails;
use Illuminate\Http\Request;
use Geocoder\Query\GeocodeQuery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Nyholm\Psr7\Factory\Psr17Factory;
use Illuminate\Support\Facades\Session;
use Geocoder\Provider\GoogleMaps\GoogleMaps;
use Razorpay\Api\Errors\SignatureVerificationError;

class Homecontroller extends Controller
{
    public function index(){

        return view('Home');
    }

   public function searched_item(Request $request){
$searched_item=$request->search_items;
$ALLproducts=new ALLproducts;
$selected_allproducts = ALLproducts::select("*")
            ->where('name', $searched_item)->limit(1)
            ->get()
            ->toArray();

            return view('searchedITEM.index', [
                'selected_allproducts' => $selected_allproducts,
            ]);
   }
   public function category($category){
    $products = ALLproducts::select('id','name', 'description', 'image', 'price')
    ->where('category', '=', $category)
    ->where('status', '=', '1')
     ->where('Total_no_of_product', '>', 0)
    ->get()
    ->toArray();
return view('products', ['products' => $products]);
   }
//    add product to cart
   public function addtocart($id){
    $checkuser=Auth::user();
    if(!$checkuser){
    return redirect()->back()->with('userlogin', 'Please login to continue shopping');
   }
   else{
    $user=User::select('email')
    ->where('id',Auth::id())
    ->get()
    ->toArray();
    // check if item is already added into cart
    $double_product=cart::where('productID',$id)
    ->where('userID', Auth::id())
    ->first();
    if($double_product){
        $no_of_product=cart::select('no_of_product')
        ->where('userID',Auth::id())
        ->where('productID',$id)
        ->get()
        ->toArray();
        // --------------------
        $increased_no_of_product=$no_of_product['0']['no_of_product']+1;
        $query_increased_no_of_product=cart::where('productID',$id)
                                       ->update(['no_of_product'=> $increased_no_of_product]);
   
                                       $products_incart = cart::select('productID','no_of_product','name', 'description', 'image', 'price','Total_no_of_product','sold')
                                       ->where('userID', '=', Auth::id())
                                       ->get()
                                       ->toArray();
         return view('addtocart',['products_incart'=>$products_incart]);
        // return redirect()->route('showcartITEM')->with('products_incart', $products_incart);
}
// ends
$products = ALLproducts::select('name', 'description', 'image', 'price','Total_no_of_product','sold')
->where('id', '=', $id)
->get()
->toArray();
// adding product to cart
    $cart=new cart();
    $cart->userID=Auth::id();
    $cart->userEMAIL= $user['0']['email'];
    $cart->productID=$id;
    $cart->name=$products['0']['name'];
    $cart->description=$products['0']['description'];
    $cart->image=$products['0']['image'];
    $cart->price=$products['0']['price'];
    $cart->Total_no_of_product=$products['0']['Total_no_of_product'];
    $cart->sold=$products['0']['sold'];
    $cart->save();
    $products_incart = cart::select('productID','no_of_product','name', 'description', 'image', 'price','Total_no_of_product','sold')
    ->where('userID', '=', Auth::id())
    ->get()
    ->toArray();
     return view('addtocart',['products_incart'=>$products_incart]);
    // return redirect()->route('showcartITEM')->with('products_incart', $products_incart);
   }
   }
public function showcart(){
    $products_incart = cart::select('productID','no_of_product','name', 'description', 'image', 'price','Total_no_of_product','sold')
    ->where('userID', '=', Auth::id())
    ->orderBy('created_at', 'desc') 
    ->get()
    ->toArray();
    if($products_incart){}
     return view('addtocart')->with('products_incart', $products_incart);
}
   
   public function userlogin(Request $request){
    $credentials = $request->only('email', 'password');
    $user = User::where('email', $credentials['email'])->first();
    if($user && Hash::check($credentials['password'], $user->password)){
        Auth::login($user);
        $userId = Auth::id();
        return redirect()->back();
        }
    else{
        echo "try again";
    }
   }
   
   public function userlogin2(Request $request){
    $credentials = $request->only('email', 'password');
    $user = User::where('email', $credentials['email'])->first();
    if($user && Hash::check($credentials['password'], $user->password)){
        Auth::login($user);
        $userId = Auth::id();
        return redirect("/");
        }
    else{
        echo "try again";
    }
   }
   public function usersignup(Request $request){
   $user=new User();
   $user->email=$request->email;
   $user->name=$request->name;
   $user->password= bcrypt($request->password);
   $user->save();
   }
   public function usersignup2(Request $request){
    $user=new User();
    $user->email=$request->email;
    $user->name=$request->name;
    $user->password= bcrypt($request->password);
    $user->save();
    return redirect('/login')->with('signupdone');
    }
   public function logout(){
    Auth::logout();
    return redirect('/');
   }

   public function removeProduct($productID){
    $product = cart::where('productID', $productID)->first();

    if ($product) {
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    } else {
        return response()->json(['message' => 'Product not found'], 404);
    }

   }
   public function addProduct($productID){
    $no_of_product=cart::select('no_of_product')
    ->where('userID',Auth::id())
    ->where('productID',$productID)
    ->get()
    ->toArray();
    // --------------------
    $increased_no_of_product=$no_of_product['0']['no_of_product']+1;
    $query_increased_no_of_product=cart::where('productID',$productID)
    ->update(['no_of_product'=> $increased_no_of_product]);
    return response()->json(['message3' => 'Product increased']);
   }
   public function minusProduct($productID){
    $no_of_product=cart::select('no_of_product')
    ->where('userID',Auth::id())
    ->where('productID',$productID)
    ->get()
    ->toArray();
    if($no_of_product['0']['no_of_product']>= 2){ 
        $increased_no_of_product=$no_of_product['0']['no_of_product']-1;
            $query_increased_no_of_product=cart::where('productID',$productID)
            ->update(['no_of_product'=> $increased_no_of_product]);
            $no_of_product=cart::select('no_of_product')
            ->where('userID',Auth::id())
            ->where('productID',$productID)
            ->get()
            ->toArray();
        return response()->json(['productCOUNT' =>$no_of_product['0']['no_of_product']]);}

    else{  
        $no_of_product=cart::select('no_of_product')
        ->where('userID',Auth::id())
        ->where('productID',$productID)
        ->get()
        ->toArray();
        return response()->json(['productCOUNT' =>$no_of_product['0']['no_of_product']]);}
  
    // if($no_of_product>2){
    //     $increased_no_of_product=$no_of_product['0']['no_of_product']-1;
    //     $query_increased_no_of_product=cart::where('productID',$productID)
    //     ->update(['no_of_product'=> $increased_no_of_product]);
      
    // }
    // --------------------
 
   }

   public function buynow($id){
    $cart=cart::select('no_of_product')->where('userID',Auth::id())->where('productID',$id)->get()->toArray();
    $user_data=userDetails::select('contact_details','address','state','city','pincode')->where('UserID',Auth::id())->get()->toArray();

    $user = User::select('name')->where('id',Auth::id())->get()->toArray();

    $product_details=ALLproducts::select('price','Total_no_of_product','sold',)->where('id',$id)->get()->toArray();

    $product_left=$product_details['0']['Total_no_of_product']-$product_details['0']['sold'];

    // if($product_left>0){ return view('buynow_payment')->with(['id'=>$id,'user_data'=>$user_data,'user'=>$user,'product_details'=>$product_details]);}

     $user_city=$user_data['0']['city'];

$client = new Client();
$response = $client->get('https://nominatim.openstreetmap.org/search', [
    'query' => [
        'q' => $user_city,
        'format' => 'json',
        'limit' => 1,
    ],
]);
$data = json_decode($response->getBody(), true);
// long and lat for base location(patna)
$response2 = $client->get('https://nominatim.openstreetmap.org/search', [
    'query' => [
        'q' => 'patna',
        'format' => 'json',
        'limit' => 1,
    ],
]);
// 
$data2 = json_decode($response2->getBody(), true);
 $earthRadius = 6371; // Earth's radius in kilometers
if (!empty($data && $data2)) {
    $lat2=$data2['0']['lat'];
    $lon2=$data2['0']['lon'];
   $user_cityLat=  $data[0]['lat'];
   $user_cityLon= $data[0]['lon'];
   $distance = $this->calculateDistance($lat2, $lon2,  $user_cityLat, $user_cityLon);
 if($distance<=100 && $product_left>0){
    // on every 20km delivery charge will RS10
    $delivery_charge=floor(($distance/20)*10);
    return view('buynow_payment')->with(['id'=>$id,'user_data'=>$user_data,'user'=>$user,'product_details'=>$product_details,'deliveryStatus'=>'ok','product_quantity'=>$cart['0']['no_of_product'],'delivery_charge'=>$delivery_charge]);
 }
  
}
   // 
      return view('buynow_payment')->with(['id'=>$id,'user_data'=>$user_data,'user'=>$user]);
   }

//    distance in between function
public function calculateDistance($lat1, $lon1, $lat2, $lon2) {
    $earthRadius = 6371; // Earth's radius in kilometers

    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);

    $a = sin($dLat / 2) * sin($dLat / 2) +
        cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
        sin($dLon / 2) * sin($dLon / 2);

    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $distance = $earthRadius * $c;

    return $distance;
}
// 
   public function  userdetails(){
    $fill_userdata=userDetails::select('contact_details','address','state','city','pincode')
    ->where('userID',Auth::id())
    ->get()
    ->toArray();
  
    if(!$fill_userdata){

        return view('userdetails');
        }
    return view('userdetails')->with('fill_userdata', $fill_userdata);
   
   
   }
  public function userdetailsform(Request $request){
     $request->validate([
     'Contact'=>'digits:10',
     'Address'=>'string|min:7',
     'pincode'=>'string|min:6',
     ]);
   $double_userdata=userDetails::where('userID',Auth::id())
   ->first();

   if($double_userdata){
    userDetails::where('userID',Auth::id())
    ->update(['contact_details'=>$request->Contact,
      'address'=>$request->Address,
      'state'=> $request->state,
      'city'=>$request->city,
      'pincode'=>$request->pincode,
    

]);
$fill_userdata=userDetails::select('contact_details','address','state','city','pincode')
->where('userID',Auth::id())
->get()
->toArray();
return back()->with('fill_userdata',$fill_userdata);
   }
    else{
        $user_details=new userDetails();
        $user_details->userID=Auth::id();
        $user_details->contact_details=$request->Contact;
        $user_details->address=$request->Address;
        $user_details->state= $request->state;
        $user_details->city=$request->city;
        $user_details->pincode=$request->pincode;
        $user_details->save();
        $fill_userdata=userDetails::select('contact_details','address','state','city','pincode')
->where('userID',Auth::id())
->get()
->toArray();
return back()->with('fill_userdata',$fill_userdata);
    }
  }
public function payment($total_cost,$id){
    $api = new Api('rzp_test_JYJrIM4q5qjlhQ', 'UBpfFdtNYSUGm9bTGvCyde8H');
    $order = $api->order->create([
        'amount' => $total_cost * 100, // amount in paise
        'currency' => 'INR',
        'receipt' => 'receipt_id_1',
    ]);
    $orderId = $order['id']; 
    $user_pay = new payment();
    $user_pay->userID = Auth::id();
    $user_pay->PRODUCTid=$id;
    $user_pay->amount = $total_cost;
    $user_pay->payment_id = $orderId;
    $user_pay->save();
    $data = array(
        'order_id' => $orderId,
        'amount' =>$total_cost,
        'productID'=>$id
    );

    // Session::put('order_id', $orderId);
    // Session::put('amount' , $amount);

return view('payment_page')->with('paymentdata', $data);
}
public function pay(Request $request,$amount){
    $data = $request->all();
    $api = new Api('rzp_test_JYJrIM4q5qjlhQ', 'UBpfFdtNYSUGm9bTGvCyde8H');

    try{
    $attributes = array(
         'razorpay_signature' => $data['razorpay_signature'],
         'razorpay_payment_id' => $data['razorpay_payment_id'],
         'razorpay_order_id' => $data['razorpay_order_id']
    );
    $order = $api->utility->verifyPaymentSignature($attributes);
    $success = true;
    }catch(SignatureVerificationError $e){

    $succes = false;
}

    
if($success){
    Payment::where('payment_id', $data['razorpay_order_id'])
    ->update(['payment_status'=>1,
    'razorpay_id'=> $data['razorpay_payment_id'],
]);
$cart=cart::select('no_of_product')
->where('userID',Auth::id())
->where('productID',$request->productID)
->get()
->toArray();
    $myorders=new myorders();
    $myorders->userID=Auth::id();
    $myorders->productID=$request->productID;
    $myorders->price=$amount;
    $myorders->total_no_of_product=($cart['0']['no_of_product']);
    $myorders->payment_status=1;
    $myorders->save();
    $productname=allproducts::select('name')->where(['id'=>$request->productID])->get()->toArray();
    $address=userDetails::select('address')->where('userID',Auth::id())->get()->toArray();
    $username = User::select('name')->where('id',Auth::id())->get()->toArray();
    $myorderid=$myorders["id"];
    $ordersplaced=new orderplaced();
    $ordersplaced->userID=Auth::id();
    $ordersplaced->name=$username['0']['name'];
    $ordersplaced->productID=$request->productID;
    $ordersplaced->productName=$productname['0']['name'];
    $ordersplaced->price=$amount;
    $ordersplaced->total_no_of_product =$cart['0']['no_of_product'];
    $ordersplaced->delivery_address=$address['0']['address'];
    $ordersplaced->save();
    return redirect('/myorders');
}else{

    return redirect('/');
}
}
}