<?php
    //echo '<pre>post = '; print_r($_POST); echo '</pre>'; die();
    mb_internal_encoding("UTF-8");
        
 
    $obj = file_get_contents("php://input");
    $arr = json_decode($obj, true);
    
    $handle = fopen('tmp/'.$arr['name'], "w");

 
    if ($handle == true) {
        $bin = $arr['bin'];
        $bin = base64_decode($bin);
        fwrite($handle, $bin);
        fclose($handle);
 
        $data['success'] = true;     
    } else {
        $data['success'] = false;     
    }
 
    print(json_encode($data));
    die();