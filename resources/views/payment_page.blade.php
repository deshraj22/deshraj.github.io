@include('frontend')
@if(isset($paymentdata))
<style>
    /* Customize Razorpay button */
    .razorpay-payment-button {
      background-color: #192A56; /* Change background color */
      color: #ffffff; /* Change text color */
      border-radius: 5px; /* Add rounded corners */
      padding: 10px 20px; /* Adjust padding */
      font-size: 16px; /* Adjust font size */
      width: 100%;
      height: 100%;
      /* Add any other styles you want to customize */
    }
    .razorpay-payment-dialog {
        max-width: 600px!important; /* Example: Increase the max width */
        max-height: 500px; /* Example: Increase the max height */
    }

  </style>
  
<div class="container tex-center">
    <div class="container tex-center mx-auto" id="razorpay-container">
        <form action="/pay/{{$paymentdata['amount']}}" method="POST" class="text-center mx-auto mt-5">
            @csrf
          <script
              src="https://checkout.razorpay.com/v1/checkout.js"
              data-key="rzp_test_JYJrIM4q5qjlhQ"
        data-amount="{{$paymentdata['amount']}}" 
              data-currency="INR"
        data-order_id="{{$paymentdata['order_id']}}"
              data-buttontext="Pay with Razorpay"
              data-name="MEDPLUS"
              data-description="Test transaction"
             
              data-theme.color="#F37254"
          ></script>
          <input type="hidden" custom="Hidden Element" name="productID" value="{{$paymentdata['productID']}}">
          </form>
    
        </div>

</div>
@endif
@include('footer')