@include('frontend')
<div class="row">
    <div class="col-8 mt-5 w-50" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset; margin-left: 5%;">
<div class="container mt-5">
    <div class="col-lg-8">
        <div class="row"><div class="col-8"><h2 class=" fw-bold lh-1 mb-3" style="color: #c75233;">Delivery address</h2></div><div class="col-4"><a href="/userdetails" class="mt-3" style="font-size: 22px; font-weight: 600;color: #0b2e59;cursor: pointer; float: right;">Change<i class="fas fa-edit"></i></a></div></div>
        @if(isset($user))
        <p class="lead" style="font-size: 22px; font-weight: 600;color: #355c7d;">{{ $user[0]['name']}}</p>
    @endif
      
        <p class="lead" style="font-size: 22px; font-weight: 600;color: #355c7d;">{{$user_data['0']['address']}}</p>
        <p class="lead" style="font-size: 22px; font-weight: 600;color: #355c7d;">{{$user_data['0']['city']}},{{$user_data['0']['state']}},{{$user_data['0']['pincode']}}</p>
        <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
        </div> -->
      </div>
    </div>
     @if(isset($deliveryStatus))
    <div class="container mb-5">
        <div class="row">
            <div class="col mt-5"><p class="lead" style="font-size: 22px; font-weight: 900;color:#3d3d3d;margin-left: 25%; margin-top: 20%;"><h2 style="color:#01a3a4;font-weight: 900">Hurray!!We Deliver in {{$user_data['0']['city']}}</h2></p></div>
            <div class="col">
     <img src="{{ asset('images/delivery.jpg') }}" class="img-thumbnail"  alt="..." >
     <h5 style="color:#ff4d4d">(**We Deliver Only Upto 100KM From Patna**)</h5>
    </div>
    </div>
    </div>
     @else
     <div class="container mb-5">
        <div class="row">
            <div class="col mt-5"><p class="lead" style="font-size: 22px; font-weight: 900;color:#3d3d3d;margin-left: 25%; margin-top: 20%;"><h2 style="color:#01a3a4;font-weight: 900">Sorry!!We Don't Deliver in </h2><h2 class="ml-5 justify-content-md-center" style="text-align: center;color:#01a3a4;font-weight: 900;">{{$user_data['0']['city']}}</h2></p></div>
            <div class="col">
     <img src="{{ asset('images/delivery.jpg') }}" class="img-thumbnail"  alt="...">
     <h5 style="color:#ff4d4d">(**We Deliver Only Upto 100KM From Patna**)</h5>
    </div>
    </div>
    </div>
     @endif
</div>
@if(isset($deliveryStatus))
<div class="col-4 mt-5 card w-25" style="background-color: white; box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset; margin-left: 5%;">
<h4 class="mt-4" style="text-align: center; font-size: 22px; font-weight: 800; color:#51425f;">Order Summary</h4>
    _____________________________________________________________________
<p style="color:red;font-size: 20px;font-weight: 600;">Price:  <span style="color: black;">&#8377;{{$product_details['0']['price']*$product_quantity}}</span></p>
<p style="color:red;font-size: 20px;font-weight: 600;">Quantity:  <span style="color: black;">{{$product_quantity}}</span></p>
<p style="color:red;font-size: 20px;font-weight: 600;">Delivery Charge: <span style="color: black;">&#8377</span><span style="color: black;">{{$delivery_charge}}</span></p>
_____________________________________________________________________
<p style="color:red;font-size: 26px;font-weight: 900;">Order Total:  <span style="color: black;">&#8377;{{$product_details['0']['price']*$product_quantity+$delivery_charge}}</span></p>
@php $total_cost=$product_details['0']['price']*$product_quantity+$delivery_charge @endphp
 <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-5" >
          <a type="button" class="btn btn-success btn-lg px-4 me-md-2" href="/payment/{{$total_cost}}/{{$id}}">Buy Now</a>
        </div></div>
        @else
        <div class="col-4 mt-5 card w-25" style="background-color: white; box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset; margin-left: 5%;"><img src="{{ asset('images/sorry.jpg') }}" class="img-thumbnail mt-2"  alt="..." style="height: 96%;"></div>
        @endif
</div>
<!-- <div class="container card mt-5" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
    <h1 class="display-5 fw-bold lh-1 mb-3 mt-2" style="color: #c75233;">Payment method</h1>
    <div class="container">UPI</div>
    
</div> -->

@include('footer')