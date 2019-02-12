<?php
//максимальное кол-во элементов
$arrMax = 500;
//максимальная длина строки
$strMax = 500;
//кол-во элементов массива
$arrCnt = rand(1, $arrMax);

//создание массива
$arr = randomArr($arrCnt, $strMax);
echo '<pre>'; print_r($arr); echo '</pre>';
//сортировка массива пользовательской функцией
usort($arr, "cmpSubstr");
echo '<hr><pre>'; print_r($arr); echo '</pre>';

//генерация массива
function randomArr($arrCnt, $strMax) 
{
	for ($j = 0; $j < $arrCnt; $j++) {
		$arr[] = randomString(rand(1, $strMax));
	}
	return $arr;
}

//генерация строки
function randomString($length) 
{
  $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
  $countChars = strlen($chars);
  $string = '';
  for ($i = 0; $i < $length; $i++) {
    $string .= substr($chars, rand(1, $countChars) - 1, 1);
  }
  return $string;
}

//сравнение 2-x подстрок со 2 по 5 символ включительно без учета регистра
function cmpSubstr($a, $b)
{
	return strnatcasecmp(substr($a, 1, 4), substr($b, 1, 4));
}