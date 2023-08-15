<html>
<head>
<title>PHP AJAX Multiple Image Upload</title>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {

    $("#uploadForm1").on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData($("#uploadForm1")[0])
        $.ajax({
            url: "upload.php",
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

function previewFile1(input){
    var file = $("#userImage1").get(0).files[0];
    if(file){
        var reader = new FileReader();
        reader.onload = function(){
            $("#previewImg").attr("src", reader.result); 
            $("#previewImg").css("display", "block");
            $("#uploadForm1").submit();
        }
        reader.readAsDataURL(file);
    }
}
</script>
</head>
<body>



<form id="uploadForm1" action="" method="post" enctype="multipart/form-data">
<input name="userImage1" id="userImage1" type="file" onchange="previewFile1(this);" accept=".jpg, .jpeg, .png"/>
</form>

<img style="display:none;" id="previewImg" src="#"/>

</body>
</html>