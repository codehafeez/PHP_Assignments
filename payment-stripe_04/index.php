<?php require_once 'config.php'; ?>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<center>
<div style="width:700px; margin-top:100px;">
<h2 style="font-weight:bold;">Product List</h2>
<table id="productTable" class="table table-bordered">
  <thead>
    <tr>
      <th>Product Name</th>
      <th>Description</th>
      <th>Quantity</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody></tbody>
</table>
<button id="payButton">Pay Now</button>
</div>
</center>




<script src="https://js.stripe.com/v3/"></script>
<script>
const products = [
  {
    "name": "Product 1",
    "desc": "Desc Test Product 1",
    "quantity": 2,
    "price": 19.99
  },
  {
    "name": "Product 2",
    "desc": "Desc Test Product 2",
    "quantity": 1,
    "price": 29.99
  },
  {
    "name": "Product 3",
    "desc": "Desc Test Product 2",
    "quantity": 3,
    "price": 9.99
  }
];

  const productTable = document.getElementById("productTable").getElementsByTagName('tbody')[0];
  products.forEach(function(product) {
    const row = productTable.insertRow();
    const nameCell = row.insertCell(0);
    const descCell = row.insertCell(1);
    const quantityCell = row.insertCell(2);
    const priceCell = row.insertCell(3);

    nameCell.textContent = product.name;
    descCell.textContent = product.desc;
    quantityCell.textContent = product.quantity;
    priceCell.textContent = "$" + product.price.toFixed(2);
  });




const stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');
const payBtn = document.querySelector("#payButton");
payBtn.addEventListener("click", function (evt) {
  payBtn.disabled = true;
  fetch("payment_init.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      createCheckoutSession: 1,
      products:products,
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
