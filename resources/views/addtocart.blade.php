
@include('frontend')
<style>
    .cart_objects{
        height: 20%!important;
    }
</style>
@if(empty($products_incart))
<h1>No Products In Cart</h1>
@endif
@foreach($products_incart as $products_incarts)
<div class="container-fluid" style="background-color: #dff9fb;";>
<div class="container px-2 py-2 cart_objects card mt-5" style="width: 50%!important;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
    <div class="row align-items-center g-2 py-2">
        <div class="col-md-3">
            <img src="{{ asset($products_incarts['image']) }}" class="d-block img-fluid" alt="Bootstrap Themes" width="350" height="250" loading="lazy">
          </div>
      <div class="col-md-9">
        <h3 class="fw-bold mb-1">{{$products_incarts['name']}}</h3>
        <p class="lead">{{$products_incarts['description']}}</p>
        
      </div>
    
    </div>
    <div class="container w-25 mt-5" style="margin-right: 90%!important;margin-bottom: -5%!important;">
      <div class="row bg-info">
        <div class="col-3 less_product" style="background-color: #EA7773; cursor: pointer;"> @if($products_incarts['no_of_product']==1)<i class="fa fa-trash product_remove" aria-hidden="true" data-productid="{{ $products_incarts['productID'] }}"></i>@else<i class="fa fa-minus product_minus" aria-hidden="true"  data-productid="{{$products_incarts['productID'] }}"></i>@endif
          </div>
        <div class="col-6 text-center product_no" style="background-color: #EAF0F1;" data-no_of_product="{{$products_incarts['no_of_product']}}">
          <span>{{$products_incarts['no_of_product']}}</span>
        </div>
        
        <div class="col-3 product_plus" style="background-color: #EA7773;cursor: pointer;" data-productid="{{ $products_incarts['productID'] }}"><i class="fa fa-plus" aria-hidden="true" ></i>
        </div>
      </div>
    </div>
    <div class="d-grid gap-2 d-md-flex"  style="margin-left: 40%;">
        <a type="button" class="btn btn-success btn-lg px-4 me-md-1" href="/buynow/{{$products_incarts['productID'] }}">Buy Now</a>
        <button type="button" class="btn btn-danger btn-lg px-4 product_remove" data-productid="{{ $products_incarts['productID'] }}">Remove</button>
      </div>
</div>
</div>
@endforeach

@include('footer')

<script>
  var productsIncartsProductID= <?php if(isset($products_incarts['productID'])){echo json_encode($products_incarts['productID']);} ?>;
</script>

<script>
  $(document).ready(function(){
    // button remove product
//     $.ajaxSetup({
//   headers: {
//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//   }
// });
$(".product_remove").click(function(){
  var clickedElement = $(this); // To reference the clicked element inside AJAX callbacks
  var productID = clickedElement.data('productid');
  
  $.ajax({
    url: "{{ route('removeProduct', ['productID' => '__productID__']) }}".replace('__productID__', productID),
    method: 'POST',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
      console.log(response);
      
      // Remove the corresponding element from the UI upon successful deletion
      clickedElement.closest('.cart_objects ').remove(); // Adjust this selector to match your structure
    },
    error: function(xhr, status, error) {
      console.error(xhr.responseText);
      // Handle errors here
    }
  });


})
// button minusproduct
$(".product_minus").click(function(){
  var clickedElement = $(this); // To reference the clicked element inside AJAX callbacks
  var productID = clickedElement.data('productid');
  var productNoDiv = $('.product_no'); // Select the product_no div directly
  var no_of_product_span = productNoDiv.find('span'); // Find the span within product_no div

  $.ajax({
    url: "{{ route('minusProduct', ['productID' => '__productID__']) }}".replace('__productID__', productID),
    method: 'POST',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
      console.log(response);
      if (response && response.productCOUNT >= 2) {
    if (parseInt(no_of_product_span.text()) > 1) {
        var current_no_of_product = parseInt(no_of_product_span.text()); // Get the current value
        var new_no_of_product = current_no_of_product - 1; // Decrement the value

        // Update the data attribute and text content
        productNoDiv.attr('data-no_of_product', new_no_of_product);
        no_of_product_span.text(new_no_of_product);
    }
}

if (response && response.productCOUNT == 1) {
    var current_no_of_product = parseInt(no_of_product_span.text()); // Get the current value
    var new_no_of_product = current_no_of_product - 1; // Decrement the value

    // Update the data attribute and text content
    productNoDiv.attr('data-no_of_product', new_no_of_product);
    no_of_product_span.text(new_no_of_product);

    // Update HTML content
    newContent = '<i class="fa fa-trash product_remove2" aria-hidden="true" data-productid="' + productsIncartsProductID + '"></i>';
    $('.less_product').html(newContent);
}

      // Remove the corresponding element from the UI upon successful deletion
      // clickedElement.closest('.cart_objects ').remove(); // Adjust this selector to match your structure
    },
    error: function(xhr, status, error) {
      console.error(xhr.responseText);
      // Handle errors here
    }
  });
})
$(document).on("click", ".product_remove2", function() {
  var clickedElement = $(this); // To reference the clicked element inside AJAX callbacks
  var productID = clickedElement.data('productid');
  
  $.ajax({
    url: "{{ route('removeProduct', ['productID' => '__productID__']) }}".replace('__productID__', productID),
    method: 'POST',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
      console.log(response);
      
      // Remove the corresponding element from the UI upon successful deletion
      clickedElement.closest('.cart_objects ').remove(); // Adjust this selector to match your structure
    },
    error: function(xhr, status, error) {
      console.error(xhr.responseText);
      // Handle errors here
    }
  });
});
// button add product
$(".product_plus").click(function(){
  var clickedElement = $(this); // To reference the clicked element inside AJAX callbacks
  var productID = clickedElement.data('productid');
  var productNoDiv = $('.product_no'); // Select the product_no div directly
  var no_of_product_span = productNoDiv.find('span'); // Find the span within product_no div
  $.ajax({
    url: "{{ route('addProduct', ['productID' => '__productID__']) }}".replace('__productID__', productID),
    method: 'POST',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
      console.log(response);
      if (response && response.message3 === 'Product increased') {
        var current_no_of_product = parseInt(no_of_product_span.text()); // Get the current value
        var new_no_of_product = current_no_of_product + 1; // Increment the value

        // Update the data attribute and text content
        productNoDiv.attr('data-no_of_product', new_no_of_product);
        no_of_product_span.text(new_no_of_product);
      }
      // Remove the corresponding element from the UI upon successful deletion
      // clickedElement.closest('.cart_objects ').remove(); // Adjust this selector to match your structure
    },
    error: function(xhr, status, error) {
      console.error(xhr.responseText);
      // Handle errors here
    }
  });
})
  });
</script>
