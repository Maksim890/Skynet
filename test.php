<?php
	$f_json='http://sknt.ru/job/frontend/data.json';
	$json=file_get_contents($f_json);
	$tarif=json_decode($json,true);
	$Get=$_POST["test"]; //Значение присваивается через POST-запрос
	$cmd=$tarif['tarifs'][$Get]['title'];
?>
<div class="bigblock"><!--Название тарифа-->
<button class="greenbutton" onclick="tone(0);none(1);"> <!--Вызываются функции в Post.js-->
<img src="linkgreen.png">
</button>
<?php
	echo "Тариф " . "\"" . $cmd . "\"";
?>
</div>
<?php
	for ($s=0; ; $s++){ // Цикл выводит блоки с классом bigblocktwo
	$control=$tarif['tarifs'][$Get]['tarifs'];
	usort($control,'cmp_function'); //Вызывается функция сортировки
	if (isset($control[$s]['title'] )){ //<Цикл выполняется, пока переменная существует
?>
<div class="bigblocktwo">
<div class="tarif"> <!--Количество месяцев-->
	<?php
	if ($control[$s]['pay_period']==1){
		$month="месяц";
	}
	if ($control[$s]['pay_period']>4){
		$month="месяцев";
	}
	if($control[$s]['pay_period']>1 and $control[$s]['pay_period']<5){
		$month="месяца";
	}
	echo $control[$s]['pay_period'] . " $month";
	?>
</div>
<div class="megablocktwo">
<div class="money"> <!--Стоимость-->
	<?php
	$moneytwoone=$control[$s]['price'];
	$moneytwotwo=$control[$s]['pay_period'];
	$moneytwo=$moneytwoone/$moneytwotwo;
	echo $moneytwo . " ₽/мес";
	?>
</div>
<button class="onebutton" onclick="tone(0);wind(document.getElementById('test43'),<?php echo $Get ?>,<?php echo $s ?>);none(3);"><!--Вызываются функции в Post.js-->
<img src="link.png">
</button>
<div class="optionstwo"> <!--Разовый платёж и скидка-->
	<?php
	$skidkatwo=$moneytwoone-$moneytwo;
	$skidkatwoone=$control[0]['price'];
	$skidkatwotwo=($skidkatwoone-$moneytwo)*$control[$s]['pay_period'];
	echo "разовый платёж - " . $control[$s]['price'] . " ₽" . '<br>';
	if ($skidkatwo>0){
		echo "скидка - " . $skidkatwotwo . " ₽";
	}
	?>
</div>
</div>
</div>
<?php
	}
	else{
		break; //Если переменной не существует, выполнение цикла заканчивается
	}
	}
	function cmp_function ($a,$b){ //Функция сортировки
			if ($a['ID']<$b['ID']){
			return false;
			}
			if ($a['ID']>$b['ID']){
			return true;
			}
	}
?>