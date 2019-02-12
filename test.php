<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script type="text/javascript">
$(".upload").change(function () {
    var fileObj = this,
        file;
    
    if (fileObj.files) {
        file = fileObj.files[0];
        var fr = new FileReader;
        fr.onloadend = changeimg;
        fr.readAsDataURL(file)
    } else {
        file = fileObj.value;
        changeimg(file);
    }
});

function onbrowse() {
    document.getElementById('browse').click();
}

function changeimg(str) {
    if(typeof str === "object") {
        str = str.target.result; // file reader
    }
    
    $(".unknown").css({"background-size":  "100px 100px",
                       "background-image": "url(" + str + ")"});
}
    </script>
<style type="text/css">
    .unknown {
    width: 200px;
    height: 200px;
}
  </style>    
</head>
<body>
<input type="file" id="browse" name="browse" size=""  placeholder="Photo" checked="checked" class="upload"/>
<input type="button" onclick="javascript:onbrowse()"  class="unknown" value="test"/>
</body>
<script src="http://code.jquery.com/jquery-1.7.min.js" type="text/javascript"> </script>
</html>