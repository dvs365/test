<?
$textToTranslate = 'example test';
$url = 'http://translate.google.ru/translate_a/t?client=x&text=example&hl=en&sl=en&tl=ru';
//$url = 'http://yandex.ru';
//$url = 'http://translate.google.ru';
$translate = file_get_contents($url);
echo '<pre>'; print_r($translate); echo '</pre>';