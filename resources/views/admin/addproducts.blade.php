@include('admin.dashboard');
@if(session('success'))

<div id="sweetAlertContainer"></div>

<script>
    // Display SweetAlert when 'success' session exists
    Swal.fire({
        position: "center",
        icon: "success",
        title: "New Product Added",
        showConfirmButton: false,
        timer: 1500,
        target: '#sweetAlertContainer'
    });
</script>
@endif


<form  class="card p-4"  style="margin-left: 30%; width: 50%;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;" method="post" action="/productdata"  enctype="multipart/form-data">
    @csrf
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
      <div class="col">
        <div data-mdb-input-init class="form-outline">
            <label class="form-label" for="form3Example2">Product Name:</label>
          <input type="text" id="form3Example1" class="form-control" name="ProductName" required/>  
        </div>
      </div>
      <div class="col">
        <div data-mdb-input-init class="form-outline">
            <label class="form-label" for="form3Example2">Price:</label>
          <input type="text" id="form3Example2" class="form-control" name="Price" required/>
          <span class="text-danger">
            @error('Price')
            {{$message}}
            @enderror
          </span>
        </div>
      </div>
      <div class="col">
        <div data-mdb-input-init class="form-outline">
            <label class="form-label" for="form3Example2">Select Category:</label>
            <select class="form-select" aria-label="Default select example" name="Category" required>
                <option selected>Category</option>
                <option value="Medicines">Medicines</option>
                <option value="SkinCare">Skin Care</option>
                <option value="BabyCare">Baby Care</option>
                <option value="OralCare">Oral Care</option>
              </select>
         
        </div>
      </div>
      <div class="col">
        <div data-mdb-input-init class="form-outline">
            <label class="form-label" for="form3Example2">No of Products:</label>
          <input type="number" id="form3Example2" class="form-control" name="ProductsCount" required/>
         
        </div>
      </div>
    </div>
  
    <!-- Email input -->
    <div><label for="editor">Product Description:</label>
        <textarea id="editor" name="description" required></textarea>
    </div>
  
    <!-- Password input -->
    <div data-mdb-input-init class="form-outline mt-4">
        <label class="form-label" for="form3Example4">Product Image:</label>
      <input type="file" id="form3Example4" class="form-control" name="productImage" />
    </div>
    <span class="text-danger">
      @error('productImage')
      {{$message}}
      @enderror
    </span>
  
    <!-- Submit button -->
    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mt-4">Add Product</button>
  

  </form>
  <script>
    tinymce.init({
      selector: '#editor',
      height: 300
    });
  </script>
  