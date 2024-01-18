<div class="container-fluid" style="background-color: #2c2c54;";>
@include('frontend')
<style>
  .category-item {
      position: relative;
      overflow: hidden;
  }

  .category-item:hover img {
      transform: scale(1.1); /* Enlarge the image on hover */
      border-color: #84817a; /* Change the border color */
  }

  .category-item:hover h6 {
      background-color: #6ab04c; /* Change background color of text on hover */
      color: #fff; /* Change text color on hover */
      font-size: 22px;
  }
</style>
<h4 class="mt-5" text-align="center" style="text-align: center; font-weight: 600; color:#f7f1e3 ;">What are u looking for ?</h4>
<!-- search box starts -->
<div class="container">
  <form action="/searched_item" method="post"  style="text-align: center;" class="mt-2">
    @csrf

      
      <input type="text" class="search" name="search_items" placeholder="search your product" style="width: 50%; border-radius: 30px; border-color: #330000; height:50px!important; margin-top: 2%;" required>
      <button type="submit" class="btn btn-success ml-5" style="height: 40px; border-radius: 30px;">Search</button>
   </form>
</div>
<!-- search box ends -->
<!-- 4 products starts -->

<!-- 4 products ends -->
 <!-- Categories -->
 <div class="row mt-5">
  <div class="col-md-3 mb-4">
    <a href="{{ route('category.products', ['category' => 'Medicines']) }}" class="text-decoration-none category-item">
        <img src="{{ asset('images/p1.jpg') }}" class="img-thumbnail" alt="Medicines">
        <h6 class="text-center mt-2 border rounded-pill p-2" style="color:#f7f1e3">Medicines</h6>
    </a>
</div>
  <div class="col-md-3 mb-4">
      <a href="{{ route('category.products', ['category' => 'SkinCare']) }}" class="text-decoration-none category-item">
          <img src="{{ asset('images/p1.jpg') }}" class="img-thumbnail" alt="Skin Care">
          <h6 class="text-center mt-2 border rounded-pill p-2" style=" color:#f7f1e3">Skin Care</h6>
      </a>
  </div>
  <div class="col-md-3 mb-4">
      <a href="{{ route('category.products', ['category' => 'BabyCare']) }}" class="text-decoration-none category-item">
          <img src="{{ asset('images/p1.jpg') }}" class="img-thumbnail" alt="Baby Care">
          <h6 class="text-center mt-2 border rounded-pill p-2"style=" color:#f7f1e3">Baby Care</h6>
      </a>
  </div>
  <div class="col-md-3 mb-4">
      <a href="{{ route('category.products', ['category' => 'OralCare']) }}" class="text-decoration-none category-item">
          <img src="{{ asset('images/p1.jpg') }}" class="img-thumbnail" alt="Oral Care">
          <h6 class="text-center mt-2 border rounded-pill p-2"style=" color:#f7f1e3">Oral Care</h6>
      </a>
  </div>
</div>
<!-- End of Categories -->
<!-- New launches starts -->
<!-- New lauches ends -->

<script>
</script>
@include('footer');
</div>