<!DOCTYPE>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="Decoration.css">
		<script src="Post.js"></script>
		<title>Тарифы</title>
	</head>
	<body>
		<?php
			$f_json='http://sknt.ru/job/frontend/data.json';
			$json=file_get_contents($f_json);
			$tarif=json_decode($json,true);
			$cmd=$tarif['tarifs'];
		?>
		<div id="blockthree">
			<div id="test44"> <!--Место для вывода третьей страницы-->
			</div>
		</div>
		<div class="blocktwo" id= "blocktwo">
			<div class="test43" id="test43"></div> <!--Место для вывода второй страницы-->
		</div>
		<div id="block" class="space"> <!--Место для вывода первой страницы-->
		<?php
			for ($g=0; ; $g++) //Цикл выводит блоки с классом block
			{
			if (isset($cmd[$g]['title'])) //Цикл выполняется, пока переменная существует
			{
		?>
		<div class="block">
			<div class="tarif"> <!--Название тарифа-->
			<?php
			echo "Тариф "."\"".$cmd[$g]['title']."\""; 
			?>
			</div>
			<div class="megablock"> <!--Значение скорости-->
			<?php
			if ($cmd[$g]['speed']==50){ //Цвет блоков зависит от скорости, указанной в json
			$color="#360f00";
			}
			if($cmd[$g]['speed']==100){
			$color="#0da6f2";
			}
			if ($cmd[$g]['speed']>100){
			$color="#f2590d";
			}
			?>
			<div class="speed" style="background-color:<?php echo $color; ?>">
			<?php
			echo $cmd[$g]['speed']." Мбит/с";
			?>
			</div>
			<button class="onebutton" onclick="summa(document.getElementById('blocktwo'),<?php echo $g ?>);none(0);tone(1);"><!--Вызываюся функции в Post.js-->
			<img src="link.png">
			</button>
			<div class="money"> <!--Стоимость тарифа-->
			<?php
				$x= $cmd[$g]['tarifs'];
				usort($x, 'cmp_function'); //Вызываем функцию сортировки
				foreach($cmd[$g]['tarifs'] as $y){
				}
				$z=$y['price']/$y['pay_period'];
				echo $z." - ".$x[0]['price'] . " ₽/мес";
			?>
			</div>
			<div class="options"> <!--Дополнительные опции-->
			<?php
				$t=$cmd[$g]['free_options'];
				if (isset($t)){ //Цикл запускается, если переменная существует
					foreach ($t as $c){ //Цикл идёт, пока переменная существует
					echo $c . '<br>';
					}
				}
			?>
			</div>
			</div>
			<div class="link"> <!--Ссылка на сайт-->
			<?php
			$k=$cmd[$g]['link'];
			echo '<a href="' . $cmd[$g]['link'] . '">узнать подробнее на сайте www.sknt.ru</a>';
			?>
			</div>
		</div>
		<?php
		}
		else{
			break; //Если переменной не существует, выполнение цикла прекращается
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
		</div>
	</body>
</html>