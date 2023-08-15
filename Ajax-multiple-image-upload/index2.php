<html>
<head>
<title>PHP AJAX Multiple Image Upload</title>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {

    $("#uploadForm").on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData($("#uploadForm")[0])
        $.ajax({
            url: "upload2.php",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                alert('success save');
            }
        });
    });
});
</script>
</head>
<body>

<form id="uploadForm" action="" method="post">
<input name="userImage[]" type="file" accept=".jpg, .jpeg, .png, .gif" required/>
<br><br>
<input name="userImage[]" type="file" accept=".jpg, .jpeg, .png, .gif" required/>
<br><br>
<input name="userImage[]" type="file" accept=".jpg, .jpeg, .png, .gif" required/>
<br><br>
<input type="submit" value="Submit" />
</form>

</body>
</html>