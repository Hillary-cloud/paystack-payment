<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="bootstrap/js/bootstrap.js" />
    <title>paystack payment</title>
</head>
<body>
    <div class="container">
        <div class="row" >
            <div class="card">
                <div class="card-body">
                    <h2>this is the payment page</h2>
                    <form id="paymentForm">
                    <script src="https://js.paystack.co/v1/inline.js"></script> 
    <button type="submit" onclick="payWithPaystack()"> Pay </button>
</form>
                    <script>
                        const paymentForm = document.getElementById('paymentForm');

paymentForm.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(e) {

  e.preventDefault();

  let handler = PaystackPop.setup({

    key: 'pk_test_a866f1b5e5d8f2d3549790c8333bbf7fc9d15e5b', // Replace with your public key

    email: document.getElementById("email-address").value,

    amount: document.getElementById("amount").value * 100,

    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you

    // label: "Optional string that replaces customer email"

    onClose: function(){

      alert('Window closed.');

    },

    callback: function(response){

      let message = 'Payment complete! Reference: ' + response.reference;

      alert(message);

    }

  });

  handler.openIframe();

}
                    </script>
                <div>    
            </div>
        </div>
    </div>
</body>
</html>