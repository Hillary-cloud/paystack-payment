<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="bootstrap/js/bootstrap.js" />
    <script src="https://js.paystack.co/v1/inline.js"></script> 
    <title>paystack payment</title>
</head>
<body>
    <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">DogShop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
        <div class="jumbotron">
            <div class="card">
                <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                    <h3>Buy dogs from us.</h3><hr>
                        <form id="paymentForm" action="https://js.paystack.co/v1/inline.js" method="post">
                        <h5>Wonder Dog</h5>
                        <strong>Price: 5000</strong><hr>
                            <label for="name">Name:</label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="Enter your name" required>
                            <label for="email">Email:</label>
                            <input class="form-control" type="text" name="email-address" id="email-address" placeholder="Enter your email" required>
                            <label for="gsm">Phone Number:</label>
                            <input class="form-control" type="text" name="gsm" id="gsm" placeholder="Enter your phone number" required>
                            <label for="price">Amount:</label>
                            <input class="form-control" type="text" name="amount" id="amount" placeholder="Enter amount " required>
                        <img src="image/dog.jpg" class="shadow p-3 mb-5 bg-white rounded img-fluid rounded mx-auto d-block" alt="Responsive image">
                        <button class="btn btn-success"  onclick="payWithPaystack()" type="submit">Buy</button>
                        </form>
                    </div>
                    </div>
            </div>
        </div>
    </div>

<script>
const paymentForm = document.getElementById('paymentForm');

paymentForm.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(e) {

  e.preventDefault();

  let handler = PaystackPop.setup({

    key: 'pk_test_a866f1b5e5d8f2d3549790c8333bbf7fc9d15e5b', // Replace with your public key

    email: document.getElementById("email-address").value,
    name: document.getElementById("name").value,
    gsm: document.getElementById("gsm").value,
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
</body>
</html>