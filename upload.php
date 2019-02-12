<?
  $dir = __DIR__;
  $filename = $_POST['filename'];
  $f = fopen($dir.'/test/'.$filename, "a");
  fputs($f,base64_decode($_POST['chunk']));
  fclose($f);