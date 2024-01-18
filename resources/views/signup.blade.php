@include('frontend')
<style>
 .bn632-hover {
  width: 160px;
  font-size: 16px;
  font-weight: 600;
  color: #fff;
  cursor: pointer;
  margin: 20px;
  height: 55px;
  text-align:center;
  border: none;
  background-size: 300% 100%;
  border-radius: 50px;
  moz-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
}

.bn632-hover:hover {
  background-position: 100% 0;
  moz-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
}

.bn632-hover:focus {
  outline: none;
}

.bn632-hover.bn23 {
  background-image: linear-gradient(
    to right,
    #009245,
    #fcee21,
    #00a8c5,
    #d9e021
  );
  box-shadow: 0 4px 15px 0 rgba(83, 176, 57, 0.75);
}
</style>

<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <h6 class="display-5 fw-bold lh-1 mb-5 text-center" style="color:#574b90;font-size: 35px;margin-left: 38%;">Create New Account</h6>
        <div class="container p-5 card" style="background-color:#778beb; margin-left: 35%;">
            <form action="/usersignup2" method="post">
              @csrf
                <div class="form-group">
                  <input type="email" class="form-control mt-3 p-3" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" style="height: 28%;" name="email">
                </div>
                <div class="form-group mt-4">
                    <input type="text" class="form-control mt-3 p-3" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" name="name">
                  </div>
                <div class="form-group mt-4">
                    <input type="password" class="form-control mt-3 p-3" id="pass" placeholder="Password" style="position: relative;" name="password">
                    <i class="fa fa-eye" style="float: right;margin-top: -8%;margin-right: 2%;cursor: pointer;z-index: 999;position: relative;" onclick="openeye()" id="eyeIcon"></i>
                  </div>
                 

                <button type="submit" class="bn632-hover bn23 mt-5" style="margin-left: 38%;">Signup</button>
              </form>
        </div>
      </div>
      <div class="col-lg-6">
        <img src="{{asset('images/signup2.jpg')}}" class="d-block mx-lg-auto img-fluid" alt="" width="700" height="500" loading="lazy">
        </div>
      </div>
    </div>
  </div>
  <script>
    function openeye()
{
var inputelement = document.getElementById("pass");
var eyeicon=document.getElementById("eyeIcon");
var typedetail=inputelement.getAttribute("type");
if(typedetail==="password"){
  inputelement.setAttribute("type","text");
  eyeIcon.classList.remove("fa-eye-slash");
  eyeIcon.classList.add("fa-eye");
}
else{
  inputelement.setAttribute("type","password")
  eyeIcon.classList.remove("fa-eye");
  eyeIcon.classList.add("fa-eye-slash");
}
}  </script>
@include('footer');