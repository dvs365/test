<html>
<head>
<script type="text/javascript" src="jquery-1.11.1.min.js"></script>
</head>
<form id="target">
<input type="file" id="files" name="file" value="qq"/>
</form>
<div id="byte_content"></div>
<script type="text/javascript">
    (function () {
        function send(e){
     
            var files = $("#files").files;             
            var files = e.target.files;
            if (files.length != true) {
                console.log('err length');
            }
         
            var file = files[0];
         
            var end = files[0].size - 1;             
            var blob = file.slice(0, end, file.type);
         
            var reader = new FileReader();                             
            reader.readAsBinaryString(blob); 
         
            var data = {}
            data.blob = blob;
            data.name = file.name; 
         
            reader.onloadend = function(e) {
         
                if (e.target.readyState == FileReader.DONE) {
             
                    data.bin = e.target.result;
                    data.bin = window.btoa(data.bin);
                    console.log("send");                                             
                 
                    $.ajax({         
     
                        type: "POST",
                        url: "upload_script.php",
                        data: JSON.stringify(data),                         
                        dataType: "json",             
                        timeout: 500000,                         
                        success: function(data) {
                                                                                 
                            console.log("all OK, return");
                        },
                        error: function(request, status, err) {
                                     
                            console.log(status);
                        }                     
                    });                     
                }
            }
     
        };
     
     

        $("#files").bind('change', function(e) {
            send(e);             
        }); 
 
    }());
</script>
</body>
</html>