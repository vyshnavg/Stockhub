var express = require('express');
var path = require('path');
var favicon = require('serve-favicon');
var logger = require('morgan');
var cookieParser = require('cookie-parser');
var bodyParser = require('body-parser');

const mysql = require('mysql');

var index = require('./routes/index');
var users = require('./routes/users');

var app = express();

// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');

// uncomment after placing your favicon in /public
//app.use(favicon(path.join(__dirname, 'public', 'favicon.ico')));
app.use(logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

app.use('/', index);
// app.use('/users', users);

app.get('/signin', function (req, res) {
  res.render('portal.ejs', { title: 'Stockhub' });
})

app.post('/testget', function (req, res) {
  // res.render('portal.ejs', { title: 'Stockhub' });
  console.log("got the post");
  console.log('req.body');
  console.log(req.body);
  res.write('You sent the Email "' + req.body.inputEmail+'".\n');
  res.end()
})

// catch 404 and forward to error handler
app.use(function(req, res, next) {
  var err = new Error('Not Found');
  err.status = 404;
  next(err);
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.render('error');
});


// ================================================================
// ROUTING CODES
// ================================================================

// // This responds with "Hello World" on the homepage
// app.get('/', function (req, res) {
//     console.log("Got a GET request for the homepage");
//     res.send('Hello GET');
//  })
 
//  // This responds a POST request for the homepage
//  app.post('/', function (req, res) {
//     console.log("Got a POST request for the homepage");
//     res.send('Hello POST');
//  })
 
//  // This responds a DELETE request for the /del_user page.
//  app.delete('/del_user', function (req, res) {
//     console.log("Got a DELETE request for /del_user");
//     res.send('Hello DELETE');
//  })
 
//  // This responds a GET request for the /list_user page.
//  app.get('/list_user', function (req, res) {
//     console.log("Got a GET request for /list_user");
//     res.send('Page Listing');
//  })
 
//  // This responds a GET request for abcd, abxcd, ab123cd, and so on
//  app.get('/ab*cd', function(req, res) {   
//     console.log("Got a GET request for /ab*cd");
//     res.send('Page Pattern Match');
//  })






// ================================================================
// GET AND POST METHODS
// ================================================================

// app.use(cookieParser())


// app.get('/', function (req, res) {
//     console.log("Cookies: ", req.cookies)
//     res.sendFile( __dirname + "/" + "index.htm" );
//  })



//  app.get('/process_get', function (req, res) {
//     // Prepare output in JSON format
//     response = {
//        first_name:req.query.first_name,
//        last_name:req.query.last_name
//     };
//     console.log("Get Method")
//     console.log(response);
//     res.end(JSON.stringify(response));
//  })


 
//  // Create application/x-www-form-urlencoded parser
//  var urlencodedParser = bodyParser.urlencoded({ extended: false })

//  app.post('/process_post', urlencodedParser, function (req, res) {
//     // Prepare output in JSON format
//     response = {
//        first_name:req.body.first_name,
//        last_name:req.body.last_name
//     };
//     console.log("Post Method")
//     console.log(response);
//     res.end(JSON.stringify(response));
//  })






// ================================================================
// DATABASE CONNECTION
// ================================================================


// const con = mysql.createConnection({
//   host: 'localhost',
//   user: 'root',
//   password: 'mango123%',
//   database: 'testdb'mango123
// });

// con.connect((err) => {
//   if(err){
//     console.log('Error connecting to Db');
//     return;
//   }
//   console.log('Connection established');
// });

// con.query('SELECT * FROM employees', (err,rows) => {
//   if(err) throw err;

//   console.log('Data received from Db:\n');
//   console.log(rows);

// });



module.exports = app;
