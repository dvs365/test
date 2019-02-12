<?
//задаем граф 1,2 - две вершины 1 и 2
$gr = [
		'1,2',
		'2,2',
		'2,5',
		'3,5',
		'3,3'
	];
//вершины графа
$tops = array_unique(explode(',',implode(',', $gr)));

echo '<pre>'; print_r($gr); echo '</pre>';

if(checkGraph($gr, $tops)){
	echo 'Связной';
}else{
	echo 'Не связной';
}


function checkGraph($gr, $tops)
{
	$checkTops = [];
	$cnt = count($tops);
	foreach ($tops as $top1) {
		foreach($tops as $key2 => $top2){
			//исключаем повторную проверку
			if(array_search($top1.','.$top2, $checkTops) === false){
				if (checkTop($top1, $top2, $gr)) {
					$checkTops[] = $top2.','.$top1;
					continue;
				} else {
					return false;
				}
			}
		}
	}
	return true;
}

//Проверка двух вершин(узлов) $a и $b
function checkTop($a, $b, $gr)
{
	if ($a == $b) {
		return true;
	}
	
	$cntGr = count($gr);
	
	foreach ($gr as $edgeKey => $edge) {
		$tops = explode(',', $edge);
		$key = array_search($a, $tops);
		if($key !== false) {
			unset($tops[$key]);
			unset($gr[$edgeKey]);
			if (checkTop(implode('', $tops), $b, array_values($gr))) {
				return true;
			} elseif ($edgeKey == $cntGr-1) {
				return false;
			}
		}
	}
	return false;
}