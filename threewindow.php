<?php
	$f_json='http://sknt.ru/job/frontend/data.json';
	$json=file_get_contents($f_json);
	$tarif=json_decode($json,true);
	$test=$_POST["test"];
	$moon=$_POST["moon"]; //Значения присваиваются через POST-запрос
?>
<div class="bigblock">
	<button class="greenbutton" onclick="none(2);tone(1);"><!--Вызываются функции в Post.js-->
	<img src="linkgreen.png">
	</button>
	<?php
	echo "Выбор тарифа";
	?>
</div>
<div class="bigblockthree">
<div class="tarifthree"> <!--Название тарифа-->
	<?php
	$cmd=$tarif['tarifs'][$test]['title'];
	echo "Тариф " . "\"". $cmd . "\"";
	?>
</div>
<div class="moneythree"> <!--Платёжный период и размер оплаты-->
	<?php
	$regedit=$tarif['tarifs'][$test]['tarifs'];
	usort($regedit,'cmp_function'); //Вызывается функция сортировки
	$g=$regedit[$moon]['pay_period'];
	if ($g==1){
		$month="месяц";
	}
	if ($g>4){
		$month="месяцев";
	}
	if($g>1 and $g<5){
		$month="месяца";
	}
	echo "Период оплаты - " . $g . " " . $month;
	?>
	<br><?php
	$money=$regedit[0]['price'];
	echo $money . " ₽/мес";
	?>
</div>
<div class="optionsthree"><!--Дата-->
	<?php
	echo "разовый платёж - " . $regedit[$moon]['price'] . " ₽";
	?>
	<br><?php
	echo "со счёта спишется - " . $regedit[$moon]['price'] . " ₽";
	?>
</div>
<div class="time">
	<?php
	echo "вступит в силу - сегодня";
	?>
	<br><?php
	$timestamptz=$regedit[$moon]['new_payday'];
	$datetimeFormat='Y-m-d';
	$date = new \DateTime();
	$date->setTimestamp($timestamptz);  
	echo "активно до - " . $date->format($datetimeFormat);
	?>
</div>
<div class="knopka"> <!--Кнопка добавить-->
<button class="game">Выбрать</button>
</div>
</div>
<?php
	function cmp_function ($a,$b){ //Функция сортировки
			if ($a['ID']<$b['ID']){
			return false;
			}
			if ($a['ID']>$b['ID']){
			return true;
			}
	} 
	?>
