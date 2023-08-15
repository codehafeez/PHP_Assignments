<?php require_once 'config.php'; ?>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<center>
<div style="width:500px; margin-top:100px;">
<input type="number" id="amount" class="form-control" placeholder="Amount (Required)">
<textarea style="margin-top:10px; margin-bottom:10px;" class="form-control" rows="5" id="description" placeholder="Description (Required)"></textarea>
<button class="btn btn-primary" id="stripe_button">Pay with Stripe</button>
<button class="btn btn-danger" id="paypal_button">Pay with PayPal</button>
</div>
</center>





<!-- (Start) Stripe Payment Code -->
<script src="https://js.stripe.com/v3/"></script>
<script>
const stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');
const stripe_button = document.querySelector("#stripe_button");
stripe_button.addEventListener("click", function (evt) {
  const amount = document.querySelector("#amount").value;
  const description = document.querySelector("#description").value;

  if (!amount || amount <= 0) {
    alert("Please enter a valid amount.");
    return;
  }
  else if (!description.trim()) {
    alert("Please enter a description.");
    return;
  }

  stripe_button.disabled = true;
  fetch("stripe-payment.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      createCheckoutSession: 1,
      amount: amount,
      description: description
    })
  }).then(function (result) {
    return result.json();
  }).then(function (data) {
    if (data.sessionId) {
      stripe.redirectToCheckout({ sessionId: data.sessionId });
    } else {
      alert("Error: Unable to create a checkout session.");
    }
    stripe_button.disabled = false;
  }).catch(function (error) {
    alert("An error occurred while processing your payment.");
    stripe_button.disabled = false;
  });
});
</script>
<!-- (End) Stripe Payment Code -->










<!-- (Start) PayPal Payment Code -->
<form id="paypal_form" method='post' action='<?= PAYPAL_URL; ?>' style="display:none;">

    <!-- Product information -->
    <input type='number' id='amount_1' name='amount_1'><br/>
    <textarea name='item_name_1' id='item_name_1'></textarea>

    <!-- PayPal Required Fields -->
    <input type='hidden' name='cmd' value='_cart'>
    <input type='hidden' name='upload' value='1'>
    <input type='hidden' name='return' value='<?= PAYPAL_SUCCESS_URL; ?>'>
    <input type='hidden' name='cancel_return' value='<?= PAYPAL_CANCEL_URL; ?>'>
    <input type='hidden' name='business' value='<?= PAYPAL_EMAIL; ?>'>

</form>
<script>
  const paypalButton = document.getElementById('paypal_button');
  paypalButton.addEventListener('click', function () {
    const amount = document.getElementById('amount').value;
    const description = document.getElementById('description').value;

    if (!amount || amount <= 0) {
      alert("Please enter a valid amount.");
      return;
    }
    else if (!description.trim()) {
      alert("Please enter a description.");
      return;
    }


    paypalButton.disabled = true;
    document.getElementById('amount_1').value = amount;
    document.getElementById('item_name_1').value = description;
    document.getElementById('paypal_form').submit();
  });
</script>
<!-- (End) PayPal Payment Code -->



