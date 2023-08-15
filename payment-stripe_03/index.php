<?php require_once 'config.php'; ?>

<p>Demo Product 01<br>Qty: 3<br/>Price: $ 50<br/>Total Amount: $ 150</p>
<button id="payButton">Pay Now</button>

<script src="https://js.stripe.com/v3/"></script>
<script>
const stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');
const payBtn = document.querySelector("#payButton");
payBtn.addEventListener("click", function (evt) {
  payBtn.disabled = true;
  fetch("payment_init.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      createCheckoutSession: 1,
      productName: 'test-item1',
      productQuantity: parseInt(3),
      productPrice: parseFloat(50),      

    })
  }).then(function (result) {
    return result.json();
  }).then(function (data) {

    if (data.sessionId) { stripe.redirectToCheckout({ sessionId: data.sessionId }); }
    else { alert("Error: Unable to create a checkout session."); }
    payBtn.disabled = false;

  }).catch(function (error) {
    alert("An error occurred while processing your payment.");
    payBtn.disabled = false;
  });
});
</script>
