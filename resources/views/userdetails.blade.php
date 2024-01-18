@include('frontend')
@php
$indianStates = [
    "Andhra Pradesh",
    "Arunachal Pradesh",
    "Assam",
    "Bihar",
    "Chhattisgarh",
    "Goa",
    "Gujarat",
    "Haryana",
    "Himachal Pradesh",
    "Jharkhand",
    "Karnataka",
    "Kerala",
    "Madhya Pradesh",
    "Maharashtra",
    "Manipur",
    "Meghalaya",
    "Mizoram",
    "Nagaland",
    "Odisha",
    "Punjab",
    "Rajasthan",
    "Sikkim",
    "Tamil Nadu",
    "Telangana",
    "Tripura",
    "Uttar Pradesh",
    "Uttarakhand",
    "West Bengal",
    "Andaman and Nicobar Islands",
    "Chandigarh",
    "Dadra and Nagar Haveli and Daman and Diu",
    "Lakshadweep",
    "Delhi",
    "Puducherry"
];

$indianCities = [
    "Patna",
    "Mumbai",
    "Delhi",
    "Bangalore",
    "Hyderabad",
    "Ahmedabad",
    "Chennai",
    "Kolkata",
    "Surat",
    "Pune",
    "Jaipur",
    "Lucknow",
    "Kanpur",
    "Nagpur",
    "Visakhapatnam",
    "Indore",
    "Thane",
    "Bhopal",
    "Patna",
    "Vadodara",
    "Ghaziabad",
    "Ludhiana",
    "Agra",
    "Nashik",
    "Faridabad",
    "Meerut",
    "Rajkot",
    "Kalyan-Dombivali",
    "Vasai-Virar",
    "Varanasi",
    "Srinagar",
    "Aurangabad",
    "Dhanbad",
    "Amritsar",
    "Navi Mumbai",
    "Allahabad",
    "Ranchi",
    "Howrah",
    "Jabalpur",
    "Gwalior",
    "Vijayawada",
    "Jodhpur",
    "Raipur",
    "Kota",
    "Guwahati",
    "Chandigarh",
    "Thiruvananthapuram",
    "Solapur",
    "Hubli–Dharwad",
    "Tiruchirappalli",
    "Bareilly",
    "Moradabad",
    "Mysore",
    "Tiruppur",
    "Gurgaon",
    "Aligarh",
    "Jalandhar",
    "Bhubaneswar",
    "Salem",
    "Warangal",
    "Guntur",
    "Bhiwandi",
    "Saharanpur",
    "Gorakhpur",
    "Bikaner",
    "Amravati",
    "Noida",
    "Jamshedpur",
    "Bhilai",
    "Cuttack",
    "Firozabad",
    "Kochi",
    "Nellore",
    "Bhavnagar",
    "Dehradun",
    "Durgapur",
    "Asansol",
    "Rourkela",
    "Nanded",
    "Kolhapur",
    "Ajmer",
    "Akola",
    "Gulbarga",
    "Jamnagar",
    "Ujjain",
    "Loni",
    "Siliguri",
    "Jhansi",
    "Ulhasnagar",
    "Nellore",
    "Jammu",
    "Sangli-Miraj & Kupwad",
    "Belgaum",
    "Mangalore",
    "Ambattur",
    "Tirunelveli",
    "Malegaon",
    "Gaya",
    "Jalgaon",
    "Udaipur",
    "Maheshtala",
    "Davanagere",
    "Kozhikode",
    "Kurnool",
    "Rajpur Sonarpur",
    "Rajahmundry",
    "Bokaro",
    "South Dumdum",
    "Bellary",
    "Patiala",
    "Gopalpur",
    "Agartala",
    "Bhagalpur",
    "Muzaffarnagar",
    "Bhatpara",
    "Panihati",
    "Latur",
    "Dhule",
    "Rohtak",
    "Sagar",
    "Korba",
    "Bhilwara",
    "Brahmapur",
    "Muzaffarpur",
    "Ahmednagar",
    "Mathura",
    "Kollam",
    "Avadi",
    "Kadapa",
    "Anantapur",
    "Kamarhati",
    "Bilaspur",
    "Shahjahanpur",
    "Satara",
    "Bijapur",
    "Sultanpur",
    "Hosapete",
    "Rampur",
    "Shivamogga",
    "Chandrapur",
    "Junagadh",
    "Thrissur",
    "Alwar",
    "Bardhaman",
    "Kulti",
    "Kakinada",
    "Nizamabad",
    "Parbhani",
    "Tumkur",
    "Khammam",
    "Ozhukarai",
    "Bihar Sharif",
    "Panipat",
    "Darbhanga",
    "Bally",
    "Aizawl",
    "Ichalkaranji",
    "Dewas",
    "Tirupati",
    "Karnal",
    "Bathinda",
    "Rampur",
    "Shimoga",
    "Hapur",
    "Anand",
    "Raurkela Industrial Township",
    "Nadiad",
    "Bokaro",
    "Allappuzha",
    "Bilaspur",
    "Shantipur",
    "Hosur",
    "Sultangazi",
    "Proddatur",
    "Sambalpur",
    "Krishnanagar",
    "Vizianagaram",
    "Hindupur",
    "Balurghat",
    "Purnia",
    "Bhilai",
    "Panihati",
    "Kashipur",
    "Jaunpur",
    "Shivpuri",
    "Surendranagar Dudhrej",
    "Unnao",
    "Chinsurah",
    "Ongole",
    "Puri",
    "Haldia",
    "Anantapur",
    "Raniganj",
    "Habra",
    "Hajipur",
    "Bankura",
    "Machilipatnam",
    "Hazaribagh",
    "Balangir",
    "Bhuj",
    "Hindupur",
    "Balurghat",
    "Baranagar",
    "Barasat",
    "Barrackpore",
    "Batala",
    "Bathinda",
    "Begusarai",
    "Berhampur",
    "Bettiah",
    "Bhind",
    "Bhiwani",
    "Bhusawal",
    "Bidar",
    "Bihar Sharif",
    "Bijapur",
    "Bikaner",
    "Bilaspur",
    "Bulandshahr",
    "Chandannagar",
    "Chapra",
    "Chittorgarh",
    "Churu",
    "Cuddalore",
    "Danapur",
    "Dehri",
    "Dewas",
    "Dibrugarh",
    "Dimapur",
    "Durg",
    "Eluru",
    "Erode",
    "Etawah",
    "Faridabad",
    "Fatehpur",
    "Firozabad",
    "Gandhidham",
    "Gang"];
 
@endphp
@if(isset($double_userdata))
@foreach($double_userdata as $double_userdatas)
@endforeach
@endif
<form class="w-25 mt-5" style="margin-left: 30%;" action="/userdetailsform" method="post">
    @csrf
    <div data-mdb-input-init class="form-outline mb-4">
      <input type="number" id="form3Example3" class="form-control" name="Contact" required value="@if(isset($fill_userdata)){{($fill_userdata[0]['contact_details'])}}@endif"/>
      <label class="form-label" for="form3Example3">Contact Details</label>
      <span class="text-danger">
        @error('Contact')
        {{$message}}
        @enderror
    </span>
    </div>
   
    <!-- Password input -->
    <div data-mdb-input-init class="form-outline mb-4">
      <input type="text" id="form3Example4" class="form-control"name="Address" required value="@if(isset($fill_userdata)) {{($fill_userdata[0]['address'])}}@endif"/>
      <label class="form-label" for="form3Example4">Address</label>
      <span class="text-danger">
        @error('Address')
        {{$message}}
        @enderror
    </span>
    </div>
    <div class="row mb-4">
        <div class="col">
            <div class="form-group">
                <select id="citySelect2" class="form-control" name="state" required>
                    <option value="@if(isset($fill_userdata)){{($fill_userdata[0]['state'])}}@endif" selected>@if(isset($fill_userdata)){{($fill_userdata[0]['state'])}}@else Select State @endif</option>
                    @foreach ($indianStates as $States): ?>
                        <option value="{{$States}}">{{$States}}</option>
                    @endforeach; 
                </select>
            </div>
        
        </div>
        <div class="col">
            <div class="form-group">
              
                <select id="citySelect" class="form-control" name="city" required>
                    <option value="@if(isset($fill_userdata)){$fill_userdata[0]['city']}@endif" selected>@if(isset($fill_userdata)){{($fill_userdata[0]['city'])}}@else Select City @endif</option>
                    @foreach ($indianCities as $city)
                        <option value="{{ $city }}">{{ $city }}</option>
                    @endforeach
                </select>
            </div>
            
   
            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> -->
            <script>
                $(document).ready(function() {
                    $('#citySelect').select2();
            
                    $('#citySearch').on('keyup', function() {
                        var searchText = $(this).val().toLowerCase();
                        $("#citySelect option").each(function() {
                            var optionText = $(this).text().toLowerCase();
                            var match = optionText.includes(searchText);
                            $(this).toggle(match);
                        });
                    });
                });
            </script>
            
        </div>
      </div>
      <div class="row mb-4">
        <div class="col">
          <div data-mdb-input-init class="form-outline">
            <input type="text" id="form3Example1" class="form-control" name="pincode"value="@if(isset($fill_userdata)) {{($fill_userdata[0]['pincode'])}}@endif"/>
            <label class="form-label" for="form3Example1">Pincode</label>
          </div>
        </div>
        <span class="text-danger">
            @error('pincode')
            {{$message}}
            @enderror
        </span>
      </div>
    
  
    <!-- Submit button -->
    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Update</button>
  
  </form>
 
@include('footer')
<!-- JavaScript to enable search functionality -->
