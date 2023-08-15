<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Google reCAPTCHA CDN -->
<script src="https://www.google.com/recaptcha/api.js" async defer>
</script>
</head>
<body>
<h1>Google reCAPTCHA</h1>
<form action="action.php" method="post">
<input type="text" name="name" id="name" placeholder="Enter Name" required>
<!-- div to show reCAPTCHA -->
<div class="g-recaptcha"data-sitekey="**************************"></div>
<button type="submit" name="submit_btn">Submit</button>
</form>

</body>
</html>
