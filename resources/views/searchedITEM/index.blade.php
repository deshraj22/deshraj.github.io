@include('frontend')

   
    @foreach($selected_allproducts as $selected_allproducts2)

<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <h6 class="display-5 fw-bold lh-1 mb-3">{{$selected_allproducts2['name']}}</h6>
        <p class="lead">{{$selected_allproducts2['description']}}</p>
        <div class="alert alert-warning" role="alert">Best MRP:  <i class="fas fa-rupee-sign"></i>

            {{$selected_allproducts2['price']}}</div>          
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <a href="/addtocart/{{$selected_allproducts2['id']}}" class="btn btn-success" style="font-size: 20px;">
            <i class="fa fa-shopping-cart me-3 pt-2"></i>Add To Cart</a>
            <a type="button" class="btn btn-danger btn-lg px-4 me-md-1" style="font-size: 20px;" href="/buynow/{{$selected_allproducts2['id'] }}">Buy Now</a>
          </div>
      </div>
      <div class="col-lg-6">
        <img src="{{asset($selected_allproducts2['image'])}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
       
      </div>
    </div>
  </div>

    @endforeach
</body>
</html>
@include('footer')