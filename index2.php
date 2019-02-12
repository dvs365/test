<form action="/" method="post" >
	<input name="str">
	<input type="submit" value="check">
</form>
<?php
$str = isset($_POST['str'])? $_POST['str'] : '';
echo (!empty($str) ? checkBrackets($str) : '');
function checkBrackets($str) 
{
	$brackets = ['()', '{}', '[]'];
	$strBrackets = preg_replace('/[^(){}\[\]]/', '', $str);
	if (str_replace($brackets, '', $strBrackets) == '') {
		echo $str.' - Верно';
	} else {
		echo $str.' - Не верно';
	}
}
//SELECT * FROM `test` GROYP BY `id` HAVING COUNT(*) >1;