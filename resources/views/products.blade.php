<div class="container-fluid" style="background-color: #2c2c54;";>
@include('frontend')
<style>
  /* Style for eye icon */
  #toggle-icon1 {
      position: absolute;
     margin-top: -3%;
      right: 20px;
      transform: translateY(-50%);
      cursor: pointer;
  }
  #toggle-icon2{
      position: absolute;
     margin-top: -3%;
      right: 20px;
      transform: translateY(-50%);
      cursor: pointer;
  }
  #toggle-icon3{
      position: absolute;
     margin-top: -3%;
      right: 20px;
      transform: translateY(-50%);
      cursor: pointer;
  }
</style>
@if(isset($products))
<div class="row">
    @foreach($products as $data)
        <div class="col-sm-3 pl-5">
            <div class="card mt-5" style="width: 18rem;box-shadow: rgba(0, 0, 0, 0.4) 0px 30px 90px; margin-left: 8%;">
                <img src="{{ asset($data['image']) }}" alt="{{ $data['image'] }}" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{$data['name']}}</h5>
                    <p class="card-text">{{$data['description']}}</p>
                    <a href="/addtocart/{{$data['id']}}" class="btn btn-success">
                        <i class="fa fa-shopping-cart me-1"></i>Add To Cart</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endif
@if(session()->has('userlogin'))
<div class="modal" tabindex="-1" role="dialog" style="margin-top: 10%;" id="login_box">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <div>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="login_close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
      <div class="modal-body">
        <form   method="post" action="/userlogin"  enctype="multipart/form-data">
          @csrf
          <!-- 2 column grid layout with text inputs for the first and last names -->
        
              <div data-mdb-input-init>
                  <label class="form-label" for="form3Example2">Email</label>
                <input type="text" id="form3Example1" class="form-control" name="email" required/>  
              </div>
              <div data-mdb-input-init>
                <label class="form-label" for="form3Example2">Password</label>
              <input type="text" id="p3" class="form-control" name="password" required/>
              <i class="toggle-icon fas fa-eye-slash" id="toggle-icon3" onclick="togglePasswordVisibility3()"></i>  
            </div>
          
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Login</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="signup">Signup</a>
              </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- User Signup Model Box -->
<div class="modal" tabindex="-1" role="dialog" style="margin-top: 10%;" id="signup_box">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <div>
     <button type="button" class="close" data-dismiss="modal" id="signup_close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
      <div class="modal-body">
        <form   method="post" action="/usersignup"  enctype="multipart/form-data">
          @csrf
          <!-- 2 column grid layout with text inputs for the first and last names -->
        
              <div data-mdb-input-init>
                  <label class="form-label" for="form3Example2">Email</label>
                <input type="email" id="form3Example1" class="form-control" name="email" required/>  
              </div>
              <div data-mdb-input-init>
                <label class="form-label" for="form3Example2">Name</label>
              <input type="text" id="form3Example1" class="form-control" name="name" required/>  
            </div>
              <div data-mdb-input-init>
                <label class="form-label" for="form3Example2">Password</label>
              <input type="password" id="p1" class="form-control" name="password" required/>  
              <i class="toggle-icon fas fa-eye-slash" onclick="togglePasswordVisibility()" id="toggle-icon1"></i>
            </div>
            <div data-mdb-input-init>
              <label class="form-label" for="form3Example2">Confirm Password</label>
            <input type="password" id="p2" class="form-control" name="cnfpassword" required/>  
            <i class=" toggle-icon fas fa-eye-slash" onclick="togglePasswordVisibility2()" id="toggle-icon2"></i>
          </div>
            <div class="modal-footer">
                <button type="button" id="login" class="btn btn-primary">Login</button>
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Signup</a>
              </div>
      </form>
    </div>
  </div>
</div>
</div>
<!--  -->
<script>
  $(document).ready(function(){
      $("#login_box").show();
      $("#signup_box").hide();
    $("#signup").click(function(){
      $("#login_box").hide();
      $("#signup_box").show();
    });
    $("#login").click(function(){
      $("#signup_box").hide();
      $("#login_box").show();
    });
    $("#login_close").click(function(){
      $("#login_box").hide();
    });
    $("#signup_close").click(function(){
      $("#signup_box").hide();
    })
});
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('p1');
    const element = document.getElementById('toggle-icon1');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        element.classList.remove('fa-eye-slash');
        element.classList.add('fa-eye');
    } else {
        passwordInput.type = 'password';
        element.classList.remove('fa-eye');
        element.classList.add('fa-eye-slash');
    }
}
function togglePasswordVisibility2() {
    const passwordInput = document.getElementById('p2');
    const element = document.getElementById('toggle-icon2');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        element.classList.remove('fa-eye-slash');
        element.classList.add('fa-eye');
    } else {
        passwordInput.type = 'password';
        element.classList.remove('fa-eye');
        element.classList.add('fa-eye-slash');
    }
}

function togglePasswordVisibility3() {
    const passwordInput = document.getElementById('p3');
    const element = document.getElementById('toggle-icon3');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        element.classList.remove('fa-eye-slash');
        element.classList.add('fa-eye');
    } else {
        passwordInput.type = 'password';
        element.classList.remove('fa-eye');
        element.classList.add('fa-eye-slash');
    }
}
</script>
@endif
@include('footer');
</div>