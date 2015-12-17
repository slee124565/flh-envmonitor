# FLH API Server Designed By Singo
## What is this?
- Get user power data
	- Call API: /api/user/:name
- Get within 30 days of the use of power
	- Call API: /api/user/:range/:name
- Set user use of power into the database
	- Call API: /api/set/:name/:power
- Set WebSceneMode
	- Call API: /api/demo/set/:name/:mode
		- Ex: 127.0.0.1:8080/api/demo/set/singo/1
- Get WebSceneMode
	- Call API: /api/demo/:name

## Install
- Download NodeJs and install it
- Create Web Service and MySql Service (Windows can install wamp)
- npm install express
- npm install mysql

## Getting Start!
- node server.js (You can open server.js setting port and database info)
