var express = require('express'); 
var fs = require('fs');
var app = express();
var mysql = require('mysql');
var router = express.Router();
var dFormat = require('dateformat');
app.use('/api', router);


/*
已知BUG為:
res.send(results); 在同一個GET內只能使用一次
*/
/*
var host = 'localhost';
var user = 'root';
var password = 'hacktdoh';
var database = 'test';
var connection = mysql.createConnection({
  host: host,
  user: user,
  password: password,
  database: database,
  port:3306
});
*/
var host = 'localhost';
var user = 'root';
var password = 'demosql';
var database = 'flh';

var power = [1899];
var table = 'flhdemo2015';
var tab_DeviceIDpower='devicepower';
var tab_Demo='demomode';
var tab_Event='demoevent';
var tab_Sensor='sensor';
  function sleep(milliSeconds) {
    var startTime = new Date().getTime();
    while (new Date().getTime() < startTime + milliSeconds);
  }

function log(str) {
  //console.log(' [' + new Date().toLocaleTimeString() + '] ' + str);
   // console.log(' [' + new Date().toLocaleString().replace(/T/, ' ').replace(/\..+/, '') + '] ' + str);
console.log('['+dFormat(new Date,'yyyy-mm-dd HH:MM:ss')+'] '+str);	
fs.appendFile('PowerLog.txt','[' + dFormat(new Date,'yyyy-mm-dd HH:MM:ss') + '] ' + str+'\r\n');
}
router.get('/user/:name', function(req, res){
		//if(req.params.data==null) {return;}
	res.header("Access-Control-Allow-Origin","*");
res.header("Access-Control-Allow-Header","X-Requested-With");

	var connection = mysql.createConnection({
			host: host,
			user: user,
			password: password,
			database: database,
			port:3306
			});
		
		connection.connect();
		var json;
		//res.setHeader({ 'Content-Type': 'application/json' });
		/*
		connection.query("SELECT * from `" + table + "` where name=\""+req.params.data+'\"', function(err, results,fields) {
		if (err) {
			throw err;
		}
		console.log(results);
		
		});
		*/
		connection.query("select DATE_FORMAT(date,'%Y-%m-%d') AS date,name,power from `"+table+"` where name=\""+req.params.name+"\" order by date desc", function(err, results,fields) {
		if (err) {
			throw err;
		}
		/*
		for(key in results)
                {
                        json='date:'+results[key].date + ',' + 'name:'+results[key].name+','+'power:'+results[key].power;
                }
		*/
		json = JSON.stringify({user:results});
		//json=JSON.stringify({date:results[0].date})
		res.send(json);
		});
		
        //res.send({"date": new Date().toLocaleString().replace(/T/, ' ').replace(/\..+/, ''), "power": power[0]});
		log('Process IP: '+req.ip+' Call API! UserName:'+req.params.name+'Power Data');
		connection.end();
		
  //res.send(user[0]);
});
router.get('/demo/event/',function(req,res){

	res.header("Access-Control-Allow-Origin","*");
	res.header("Access-Control-Allow-Header","X-Requested-With");
	var connection=mysql.createConnection({
	host:host,
	user:user,
	password:password,
	database:database,
	port:3306
	});
	connection.connect();
	var json;
	var now_date=dFormat(new Date,'yyyy-mm-dd HH:MM:ss');
	var now_time=dFormat(new Date,'HH:MM:ss');
		connection.query("select DATE_FORMAT(date,'%Y-%m-%d') AS date,time,log from `"+tab_Event+"` order by id desc", function(err, results,fields) {
		if (err) {
			throw err;
		}
	
		json = JSON.stringify({user:results});
		res.send(json);
		});

		connection.end();
	
});
router.get('/demo/set/event/:log',function(req,res){

	res.header("Access-Control-Allow-Origin","*");
	res.header("Access-Control-Allow-Header","X-Requested-With");
	var connection=mysql.createConnection({
	host:host,
	user:user,
	password:password,
	database:database,
	port:3306
	});
	connection.connect();
	var json;
	var now_date=dFormat(new Date,'yyyy-mm-dd HH:MM:ss');
	var now_time=dFormat(new Date,'HH:MM:ss');
	var data = {
			//name: req.params.name,
			date: now_date,
			time: now_time,
			log: req.params.log
			};
		connection.query('update `' + tab_Event+ '` SET ? where `id`=1', data, function(err, results) {
		if (err) {
			throw err;
		}
		console.log(results);
		
		});
res.send({"status":"success"});  
		log('Demo Event Log Save!');
		connection.end();
	
});

router.get('/demo/:name',function(req,res){

	res.header("Access-Control-Allow-Origin","*");
	res.header("Access-Control-Allow-Header","X-Requested-With");
	var connection=mysql.createConnection({
	host:host,
	user:user,
	password:password,
	database:database,
	port:3306
	});
	connection.connect();
	var json;
	connection.query("SELECT DATE_FORMAT(date,'%Y-%m-%d') AS date,time,name,mode FROM `demomode` where `name`=\""+req.params.name+"\" ORDER BY id DESC" ,function(err,results,fields){
		if (err) {
			throw err;
		}
		json = JSON.stringify({user:results});
		res.send(json); 
		});

		log('Demo History get user: '+req.params.name);
		connection.end();
	
});

router.get('/demo/set/:name/:mode',function(req,res){

	res.header("Access-Control-Allow-Origin","*");
	res.header("Access-Control-Allow-Header","X-Requested-With");
	var connection=mysql.createConnection({
	host:host,
	user:user,
	password:password,
	database:database,
	port:3306
	});
	connection.connect();
	var json;
	var now_date=dFormat(new Date,'yyyy-mm-dd HH:MM:ss');
	var now_time=dFormat(new Date,'HH:MM:ss');
	var data = {
			name: req.params.name,
			date: now_date,
			time: now_time,
			mode: req.params.mode
			};
		connection.query('update `' + tab_Demo+ '` SET ? where `id`=1', data, function(err, results) {
		if (err) {
			throw err;
		}
		console.log(results);
		
		});
res.send({"status":"success"});  
		log('Demo set user: '+req.params.name);
		connection.end();
	
});

router.get('/user/:range/:name', function(req, res){
	res.header("Access-Control-Allow-Origin","*");
res.header("Access-Control-Allow-Header","X-Requested-With");
	//if(req.params.data==null) {return;}
		var connection = mysql.createConnection({
			host: host,
			user: user,
			password: password,
			database: database,
			port:3306
			});
		
		connection.connect();
		var json;
		connection.query("SELECT DATE_FORMAT(date,'%Y-%m-%d') AS date,name,power FROM `flhpower` WHERE TO_DAYS(NOW()) - TO_DAYS(date) <="+ req.params.range+" and name=\""+req.params.name+"\" ORDER BY date ASC" ,function(err,results,fields){
		if (err) {
			throw err;
		}
		json = JSON.stringify({user:results});
		res.send(json); 
		});

		log('Process IP: '+req.ip+' Call API! Username:'+req.params.name+' '+req.params.range+'Day Power!');
		connection.end();
		
});

//設備的用電量
router.get('/set/:name/:deviceId/:power', function(req, res){
res.header("Access-Control-Allow-Origin","*");
res.header("Access-Control-Allow-Header","X-Requested-With");
		var connection = mysql.createConnection({
			host: host,
			user: user,
			password: password,
			database: database,
			port:3306
			});
		connection.connect();
		var addId=0;
        res.send({"date": dFormat(new Date,'yyyy-mm-dd HH:MM:ss'), "power": req.params.power});
		var now_date = dFormat(new Date,'yyyy-mm-dd HH:MM:ss');		connection.query('SELECT count(*) as `logCount` from `' + tab_DeviceIDpower + '`', function(err, results,fields) {
		if (err) {
			throw err;
		}
		console.log(results[0].logCount);
		addId=parseInt(parseInt(results[0].logCount)+1);
		console.log('Data Count Update:'+addId);
		});
		
		var data = {
			//id: 6,
			ip: req.ip,
			name: req.params.name,
			date: now_date,
			deviceid: req.params.deviceId,
			power: req.params.power
			};
		connection.query('INSERT INTO `' + tab_DeviceIDpower + '` SET ?', data, function(err, results) {
		if (err) {
			throw err;
		}
		console.log(results);
		
		});
		
		log('Process From IP: '+req.ip+' DeviceID is ' + req.params.deviceId + ' Call API! Write Power data!'+req.params.power);
		log('Waitting...');
		fs.appendFile('PowerLog.txt','[' + dFormat(new Date,'yyyy-mm-dd HH:MM:ss') + '] Process From IP'+req.ip+':Write Power Data is ' + req.params.power +'\r\n');
		log('Success!');
		connection.end();

});

router.get('/set/:name/:power', function(req, res){
res.header("Access-Control-Allow-Origin","*");
res.header("Access-Control-Allow-Header","X-Requested-With");		
var connection = mysql.createConnection({
			host: host,
			user: user,
			password: password,
			database: database,
			port:3306
			});
		connection.connect();
		var addId=0;
        res.send({"date":  dFormat(new Date,'yyyy-mm-dd HH:MM:ss'), "power": req.params.power});
		var now_date = dFormat(new Date,'yyyy-mm-dd HH:MM:ss');		connection.query('SELECT count(*) as `logCount` from `' + table + '`', function(err, results,fields) {
		if (err) {
			throw err;
		}
		console.log(results[0].logCount);
		addId=parseInt(parseInt(results[0].logCount)+1);
		console.log('Data Count Update:'+addId);
		});
		
		var data = {
			//id: 6,
			ip: req.ip,
			name: req.params.name,
			date: now_date,
			power: req.params.power
			};
		connection.query('INSERT INTO `' + table + '` SET ?', data, function(err, results) {
		if (err) {
			throw err;
		}
		console.log(results);
		
		});
		
		log('Process From IP: '+req.ip+' Call API! Write Power data! '+req.params.power);
		log('Waitting...');
		fs.appendFile('PowerLog.txt','[' +  dFormat(new Date,'yyyy-mm-dd HH:MM:ss') + '] User IP'+req.ip+':Write Power data is ' + req.params.power);
		log('Success!');
		connection.end();

});
router.get('/demo/set/sensor/:humidity/:inDoorTemp/:co2/:uv/:outDoorTemp/:pm',function(req,res){

	res.header("Access-Control-Allow-Origin","*");
	res.header("Access-Control-Allow-Header","X-Requested-With");
	var connection=mysql.createConnection({
	host:host,
	user:user,
	password:password,
	database:database,
	port:3306
	});
	connection.connect();
	var json;
	var now_date=dFormat(new Date,'yyyy-mm-dd HH:MM:ss');
	var now_time=dFormat(new Date,'HH:MM:ss');
	
		var data = {
			date: now_date,
			time: now_time,
			humidity:req.params.humidity,
			inDoorTemp:req.params.inDoorTemp,
			co2: req.params.co2,
			uv:req.params.uv,
			outDoorTemp:req.params.outDoorTemp,
			pm:req.params.pm
			};
	connection.query('update `' + tab_Sensor+ '` SET ? where `id`=1', data, function(err, results) {
		if (err) {
			throw err;
		}
		console.log(results);
		
		});
	

	
res.send({"status":"success"});  
		log('Demo set Sensor Value!');
		connection.end();
	
});

router.get('/demo/sensor/:data',function(req,res){

	res.header("Access-Control-Allow-Origin","*");
	res.header("Access-Control-Allow-Header","X-Requested-With");
	var connection=mysql.createConnection({
	host:host,
	user:user,
	password:password,
	database:database,
	port:3306
	});
	connection.connect();
	var json;
if(req.params.data=="humidity"||req.params.data=="inDoorTemp"||req.params.data=="co2"||req.params.data=="uv"||req.params.data=="outDoorTemp"||req.params.data=="pm"){
	connection.query("SELECT " +req.params.data+ " FROM `sensor` ORDER BY id ASC" ,function(err,results,fields){
		if (err) {


			throw err;
		}
		json = JSON.stringify({value:results});
		res.send(json); 
		});
}else{
json = JSON.stringify({err:"fail"});
res.send(json);
}
		log('Demo get Sensor Value!');
		connection.end();
	
});

var port = 8080;

app.listen(port);
log('Start Server!');
