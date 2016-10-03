<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"  dir="ltr" lang="en-US"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="author" content="ppandp">
<meta name="Description" content="Eagle Logistics - Responsive Retina-Ready HTML5 One-Page" />
<meta http-equiv="refresh" content="900">
<title>費米智慧家庭</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link href="css/reset.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/contact.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/styles.css" rel="stylesheet" type="text/css" media="screen" />
<!--[if gt IE 8]><!--><link href="css/retina-responsive.css" rel="stylesheet" type="text/css" media="screen" /><!--<![endif]-->
<!--[if !IE]> <link href="css/retina-responsive.css" rel="stylesheet" type="text/css" media="screen" /> <![endif]-->
<!--[if lt IE 9]> <link href="css/styles-ie8.css" rel="stylesheet" type="text/css" media="screen" /> <![endif]-->
<link href="css/print.css" rel="stylesheet" type="text/css" media="print" />
<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,300italic,700,600,800' rel='stylesheet' type='text/css' />
<link href='http://fonts.useso.com/css?family=Ruda:400,900,700' rel='stylesheet' type='text/css'>
<link href="css/flexslider.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/jquery.fancybox.css" rel="stylesheet" type="text/css" media="screen" />
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="js/jquery-easing-1.3.js" type="text/javascript"></script>
<script src="js/modernizr.js" type="text/javascript"></script>
<script src="js/custom.js" type="text/javascript"></script>
<script src="js/jquery.gomap-1.3.2.min.js" type="text/javascript"></script>
<script src="js/jquery.isotope.min.js" type="text/javascript"></script>
<script src="js/jquery.ba-bbq.min.js" type="text/javascript"></script>
<script src="js/jquery.isotope.load_home.js" type="text/javascript"></script>
<script src="js/jquery.form.js" type="text/javascript"></script>
<script src="js/input.fields.js" type="text/javascript"></script>
<script src="js/responsive-nav.js" type="text/javascript"></script>
<script src="js/jquery.jtweetsanywhere-1.3.1.min.js" type="text/javascript"></script>
<script src="js/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="js/scrollup.js" type="text/javascript"></script>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<script type="text/javascript">
var publicIP="192.168.10.9";

function set_publicip() {
    $.ajax({
        url:"./serv_ip.php",
        type:'GET',
        dataType: "text",
        success:function(data){
            console.log("get serv ip " + data);
            publicIP = data;
        }
    });
    console.log("set_publicip = " + publicIP);
}

function showMode(){
$.ajax({
url:"http://"+publicIP+":8080/api/demo/singo",
type:'GET',
dataType: "json",
success:function(mode){
			$.each(mode,function(i,user){
			var txt=[];
			/*
			for(i=0;i<3;i++){
			if(user[i].mode==1){txt[i]="劇院模式";}
			if(user[i].mode==2){txt[i]="Party模式";}
			if(user[i].mode==3){txt[i]="閱讀模式";}
			if(user[i].mode==4){txt[i]="全開";}
			if(user[i].mode==5){txt[i]="全關";}
			if(user[i].mode==6){txt[i]="上防盜";}
			if(user[i].mode==7){txt[i]="解防盜";}
			}
			*/
				document.getElementById("mode1").innerHTML=user[0].mode;
				//document.getElementById("mode2").innerHTML=user[1].mode;
				//document.getElementById("mode3").innerHTML=user[2].mode;

				document.getElementById("mode1").style.fontSize = "70px";
				//document.getElementById("mode2").style.fontSize = "xx-large";
				//document.getElementById("mode3").style.fontSize = "xx-large";
			})

}
});

}
/*
function showEvent(){
	/*document.getElementById("event1").innerHTML="劇院情境";

$.ajax({
url:"http://"+publicIP+":8080/api/demo/event",
type:'GET',
dataType: "json",
success:function(mode){
			$.each(mode,function(i,user){
				document.getElementById("event1").innerHTML=user[0].log;
				document.getElementById("event2").innerHTML=user[1].log;
				document.getElementById("event3").innerHTML=user[2].log;

                document.getElementById("event1").style.fontSize = "xx-large";
                document.getElementById("event2").style.fontSize = "xx-large";
                document.getElementById("event3").style.fontSize = "xx-large";
						})

}
});	
}*/

function showHumidity(){
	/*document.getElementById("Humidity").innerHTML="70";*/
	
$.ajax({
url:"http://"+publicIP+":8080/api/demo/sensor/humidity",
type:'GET',
dataType: "json",
success:function(data){
			$.each(data,function(i,user){
var value = data.value[0].humidity ;
var color ;
if 			( value >= 75 )	{ color = "#ed622e"; }
else if 	( value > 50 )	{ color = "#9d9564"; }
else						{ color = "#7e7858"; }
document.getElementById("Humidity").innerHTML = value ;
document.getElementById("huBG").style.backgroundColor = color ;
						})

}
});	
}

function showUVI(){
	/*document.getElementById("UVI").innerHTML="10";*/
	
$.ajax({
url:"http://"+publicIP+":8080/api/demo/sensor/uv",
type:'GET',
dataType: "json",
success:function(data){
			$.each(data,function(i,user){
var value = data.value[0].uv ;
var color ;
if 			( value > 7 )	{ color = "#ed622e"; }
else if 	( value > 4 )	{ color = "#9d9564"; }
else						{ color = "#7e7858"; }
document.getElementById("UVI").innerHTML = value ;
document.getElementById("uvBG").style.backgroundColor = color ;
						})

}
});	
}

/*
function showHumidity(){

var api="http://api.openweathermap.org/data/2.5/weather?q=taipei,twunits=metric&callback=?";
$.getJSON(api,function(){
format:"json"
}).done(function(data){

document.getElementById("Humidity").innerHTML=data.main.humidity;

});
}


*/
function showTemp(){
	/*document.getElementById("temp").innerHTML="40";*/
$.ajax({
url:"http://"+publicIP+":8080/api/demo/sensor/outDoorTemp",
type:'GET',
dataType: "json",
success:function(data){
			$.each(data,function(i,user){
var value = data.value[0].outDoorTemp ;
value = value.toFixed(1);//保留2位但结果为一个String类型
value = parseFloat(value)
var color ;
if 			( value > 28 )	{ color = "#ed622e"; }
else if 	( value > 22 )	{ color = "#9d9564"; }
else						{ color = "#7e7858"; }
document.getElementById("temp").innerHTML = value ;
document.getElementById("outTempBG").style.backgroundColor = color ;
						})

}
});	
}

function showInTemp(){//室內溫度
/*document.getElementById("Intemp").innerHTML="45";*/
$.ajax({
url:"http://"+publicIP+":8080/api/demo/sensor/inDoorTemp",
type:'GET',
dataType: "json",
success:function(data){
			$.each(data,function(i,user){
var value = data.value[0].inDoorTemp;
value = value.toFixed ( 1 );
value = parseFloat( value );
var color ;
if 			( value > 28 )	{ color = "#ed622e"; }
else if 	( value > 24 )	{ color = "#9d9564"; }
else						{ color = "#7e7858"; }
document.getElementById("Intemp").innerHTML = value ;
document.getElementById("inTempBG").style.backgroundColor = color ;
						})

}
});	
}

function showCo2(){
	/*document.getElementById("co2").innerHTML="455";*/	
$.ajax({
url:"http://"+publicIP+":8080/api/demo/sensor/co2",
type:'GET',
dataType: "json",
success:function(data){

			$.each(data,function(i,user){
var value = data.value[0].co2 ;
var color ;
if 			( value > 800 )	{ color = "#ed622e"; }
else if 	( value > 500 )	{ color = "#9d9564"; }
else						{ color = "#7e7858"; }
document.getElementById("co2").innerHTML = value ;
document.getElementById("co2BG").style.backgroundColor = color ;
						})

}
});	
}

function showPM25(){
	/*document.getElementById("PM25").innerHTML="25";*/	
$.ajax({
url:"http://"+publicIP+":8080/api/demo/sensor/pm",
type:'GET',
dataType: "json",
success:function(data){

			$.each(data,function(i,user){
var value = data.value[0].pm ;
var color ;
if 			( value > 35 )	{ color = "#ed622e"; }
else if 	( value > 25 )	{ color = "#9d9564"; }
else						{ color = "#7e7858"; }
document.getElementById("PM25").innerHTML = value ;
document.getElementById("pmBG").style.backgroundColor = color ;
						})

}
});	
}


function showTime()
{
$.ajax({ 
            url:"time.php", 
            type:'GET', 
            success: function(data){ 
                document.getElementById("showtime1").innerHTML=data;
				document.getElementById("showtime2").innerHTML=data;
				document.getElementById("showtime3").innerHTML=data;
				document.getElementById("showtime4").innerHTML=data;
				document.getElementById("showtime5").innerHTML=data;
				document.getElementById("showtime6").innerHTML=data;
            } 
 }); 
}

$(document).ready(function() {
    console.log("document ready");
    set_publicip();
    setInterval("showMode()",500);
//    setInterval("showEvent()",500);
    setInterval("showUVI()",500);
    setInterval("showPM25()",500);
    setInterval("showHumidity()",500);
    setInterval("showTemp()",500);
    setInterval("showInTemp()",500);
    setInterval("showCo2()",500);
    });

</script>
</head>

<body>

<div class="container">
<div id="header"> <div id="logo"></div> </div>
<div class="Welcome">

<!--
<h1>Welcome to Everhome!</h1>
<br/>
為提供客戶更優質與完整的建築空間，即日起導入費米Fibaro智慧家庭系統，<br/>
用戶只需簡易的操作，就能控制家庭，彈指間改變氛圍與環境。<br/>
透過Fibaro系統，期許為我們的客戶帶來的是更深層的體驗，將人與空間的互動關係更推上一層樓。
2015-08-19 admin 執行了 劇院模式
-->
<table width="100%" border="1">

<tr>
<td>
<span id="mode1"></span></td>
<td style="width: 50%;text-align: right;">
<a href="http://time.is/Taipei" id="time_is_link" rel="nofollow" style="font-size:36px"></a>
<span id="Taipei_z43f" style="font-size:64px"></span>
<script src="http://widget.time.is/t.js"></script>
<script>
time_is_widget.init({Taipei_z43f:{}});
</script>

</tr>
<!--
<tr>
<td>&nbsp;</td><td><span id="event2"></span></td>
</tr>
<tr>
<td><span id="mode3"></span></td><td><span id="event3"></span></td>
</tr>-->
</table>

</div>
  <div id="container" class="clearfix">
		<div id="huBG" class="element home clearfix colSingo1-1 border services">
		<div  class="item" >
		<h1><img src="12001/12001.png">濕度</h1>
			<p><span id="showtime1"></span></p><br />
			<singo_info><span id="Humidity"></span></singo_info> %<br/>
			<!--<h1><a href=#  style="color:white">&nbsp;更多紀錄></a></h1>-->
		</div>		
		</div>
		<div id="pmBG" class="element home clearfix colSingo1-2 border services">
		<div  class="item" >
		<h1><img src="12001/12002.png">PM2.5</h1>
			<p><span id="showtime2"></span></p><br />
			<singo_info><span id="PM25"></span></singo_info> 微克/立方公尺<br/>
			<!--<h1><a href=#  style="color:white">&nbsp;更多紀錄></a></h1>-->
		</div>		
		</div>
		<div id="uvBG" class="element home clearfix colSingo1-3 border services">
		<div  class="item" >
		<h1><img src="12001/12003.png">紫外線指數</h1>
			<p><span id="showtime3"></span></p><br />
			<singo_info><span id="UVI"></span></singo_info> <br/>
			<!--<h1><a href=#  style="color:white">&nbsp;更多紀錄></a></h1>-->
		</div>		
		</div>
		<div id="co2BG" class="element home clearfix colSingo2-1 border services">
		<div  class="item" >
		<h1><img src="12001/12004.png">CO2濃度</h1>
			<p><span id="showtime4"></span></p><br />
			<singo_info><span id="co2"></span></singo_info> PPM<br/>
			<!--<h1><a href=#  style="color:white">&nbsp;更多紀錄></a></h1>-->
		</div>		
		</div>
		<div id = "inTempBG" class="element home clearfix colSingo2-2 border services">
		<div  class="item" >
		<h1><img src="12001/12005.png">室內溫度</h1>
			<p><span id="showtime5"></span></p><br />
			<singo_info><span id="Intemp"></span></singo_info> 度C<br/>
			<!--<h1><a href=#  style="color:white">&nbsp;更多紀錄></a></h1>-->
		</div>		
		</div>
		<div id="outTempBG" class="element home clearfix colSingo2-3 border services">
		<div  class="item" >
		<h1><img src="12001/12006.png">室外溫度</h1>
			<p><span id="showtime6"></span></p><br />
			<singo_info><span id="temp"></span></singo_info> 度C<br/>
			<!--<h1><a href=#  style="color:white">&nbsp;更多紀錄></a></h1>-->
		</div>		
		</div>
  </div>
  <footer class="centered">
<div id="Footer">
             <div style="float:left; width:100%;" >
             	<table width="100%">
                    <tr>
                        <img src="12001/120077.png" border="0" align="left" style="padding-left:2px; padding-top:10px;" >
                        <img src="12001/120099.png" border="0" align="right" style="padding-right:2px; padding-top:10px;" >
                    </tr>
                </table>
</div>
</footer>
</div>
<!-- end header -->

<!-- BACK TO TOP BUTTON -->
<!--
<div id="backtotop">
  <ul>
    <li><a id="toTop" href="#" onClick="return false">Back to Top</a></li>
  </ul>
</div>-->
</body>
</html>
