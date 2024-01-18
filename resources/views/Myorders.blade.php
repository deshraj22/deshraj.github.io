@include('frontend')
@if(session('statusUpdate'))
 <script>
Swal.fire("Product Returned!");
 </script>
@endif
@if(isset($myorders_result))
@foreach($myorders_result as $myorders_results)
@php
$cartData = \App\Models\Cart::where('productID', $myorders_results['productID'])->get()->toArray();
@endphp
@if($cartData)
<div class="container col-xxl-8 px-4 py-5 card mt-5" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset; height: 10%!important;">
  @if($myorders_results['delivery_status']=='Pending')
  <div style="text-align: right;">
    <span class="w-25" style="background-color:#485460;color:#ffffff; text-align: center;border-radius: 25px;float: right;box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px; font-weight: 900;font-size: 18px; padding-top: 1%;padding-bottom: 1%">{{$myorders_results['delivery_status']}}</span></div>
  @else
  <div style="text-align: right;">
    <span class="w-25" style="background-color:#e84118;color:#ffffff; text-align: center;border-radius: 25px;float: right;box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px; font-weight: 900;font-size: 18px; padding-top: 1%;padding-bottom: 1%">{{$myorders_results['delivery_status']}}</span></div>
    @endif
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-lg-6">
        @if(!empty($cartData) && isset($cartData[0]['name']))
        <h1 class="display-5 fw-bold lh-1 mb-3">{{$cartData['0']['name']}}</h1>
        @endif
        @if(!empty($cartData) && isset($cartData['0']['description']))
        <p class="lead">{{$cartData['0']['description']}}</p>
        @endif
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
           @if($myorders_results['delivery_status']=='Pending') 
          <a type="button" href="/returnproduct/{{$myorders_results['id']}}" class="btn btn-primary btn-lg px-4 me-md-2 mt-4">Return</a>
         @endif
          <button type="button" class="btn btn-outline-secondary btn-lg px-4 mt-4">Remove From List</button>
        </div>
        </div>
      <div class="col-10 col-sm-8 col-lg-6 w-50">
        @if(!empty($cartData) && isset($cartData['0']['image']))
        <img src="{{asset($cartData['0']['image'])}}" class="d-block mx-lg-auto img-fluid" alt="not-available" width="150" height="500" loading="lazy"></img>
        @endif
      </div>
      <span style="color:#ffa801;font-size: 22px; font-weight: 900;text-align: center;margin-top: 5%;"><span>Price: </span><span style="color:#ff4757">&#8377</span><span style="color:#ff4757">{{$myorders_results['price']}}</span></span><br>
      <span style="color:#ffa801;font-size: 16px; font-weight: 900; text-align: center;margin-top: -2%"><span style="color:#ffa801">Ordered On: <span style="color:#ff4757;"> {{ \Carbon\Carbon::parse($myorders_results['created_at'])->format('d-m-y') }}</span></span></span>
    </div>
  </div>
@endif
@endforeach
@endif

@include('footer')