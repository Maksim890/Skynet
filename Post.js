function getXmlHttp() {
    var xmlhttp;
    try {
      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
      xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}
function summa(block , Numbe){ //Делаем POST-запрос к test.php (второе окно)
	var xmlhttp = getXmlHttp();
	xmlhttp.open('POST', 'test.php', true);
	 xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	 xmlhttp.send("test=" + Numbe);
	 xmlhttp.onreadystatechange=function(){
		 if (xmlhttp.readyState == 4) {
			 if(xmlhttp.status == 200) {
				 document.getElementById("test43").innerHTML = xmlhttp.responseText; //Результат выводится в блоке test43
			 }
		 }
	 }
}
function wind(block,a,b){ //Делаем POST-запрос к threewindow.php (третье окно_
	var xmlhttp = getXmlHttp();
	xmlhttp.open('POST', 'threewindow.php', true);
	 xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	 xmlhttp.send("test=" + a + "&moon=" + b);
	 xmlhttp.onreadystatechange=function(){
		 if (xmlhttp.readyState == 4) {
			 if(xmlhttp.status == 200) {
				 document.getElementById("test44").innerHTML = xmlhttp.responseText; //Результат выводится в блоке test44
			 }
		 }
	 }
}

//В функциях none и tone блоки делаются видимыми и невидимыми в зависимости от величины переменных global и globalone
function none(globalone){
	if (globalone==0){
	document.getElementById('block').style.display = "none"; 
	}
	if (globalone==1){
	document.getElementById('block').style.display = "block";
	}
	if (globalone==2){
	document.getElementById('test44').style.display = "none";
	}
	if (globalone==3){
	document.getElementById('test44').style.display = "block";
	}
}
function tone(global){
	if (global==0){
	document.getElementById('test43').style.display = "none";
	}
	if (global==1){
	document.getElementById('test43').style.display = "block";
	}
}