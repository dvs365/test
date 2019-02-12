<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <script type="text/javascript" src="//code.jquery.com/jquery-1.7.js"></script>
  <link rel="stylesheet" type="text/css" href="/css/normalize.css">
  <link rel="stylesheet" type="text/css" href="/css/result-light.css">
  <style type="text/css">
    .unknown {
    width: 200px;
    height: 200px;
}
  </style>
  <title></title>
</head>
<body>
  <input type="file" id="browse" name="browse" size=""  placeholder="Photo" checked="checked" class="upload"/>
<input type="button" onclick="javascript:onbrowse()"  class="unknown" value="test"/>
<div id="progress"></div>
<script type='text/javascript'>//<![CDATA[

$(".upload").change(function () {
    
    
    var fileObj = this,
        file;

    if (fileObj.files) {
        file = fileObj.files[0];
        var fr = new FileReader;
        fr.onloadend = changeimg;
        fr.readAsDataURL(file);
    } else {
        file = fileObj.value;
        changeimg(file);
    }
});

function onbrowse() {
    document.getElementById('browse').click();
}

function changeimg(str) {
    var filename = '33333.jpg';
    var upload_chunk_size = 120000;
    if(typeof str === "object") {
        str = str.target.result; // file reader
    }
    
    $(".unknown").css({"background-size":  "100px 100px",
                       "background-image": "url(" + str + ")"});

var comma = str.indexOf(','); 
  if (comma>0) str = str.substring(comma+1); // Отрезаем заголовок Data::URL
 
  var pos = 0;
  $.ajaxSetup({async:false}); // Отключаем асинхронность
 
  while (pos<str.length) {
 
    $.post('upload.php',{ // Отправляем POST
      filename:filename, // Имя файла
      chunk:str.substring(pos, pos+upload_chunk_size) // Кусок файлв
    });
 
    pos += upload_chunk_size;
 
    var p = Math.round(pos*100/str.length); // Вычисляем процент отправленного
    $('#progress').text(p+'%'); // Рисуем цифирь для спокойствия пользователя
  }                       
}
//]]> 


</script>
</body>
</html>