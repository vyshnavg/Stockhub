var express = require('express');
var router = express.Router();
const mysql = require('mysql');

var rows_m={}

const con = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'mango123%',
  database: 'testdb'
});

con.connect((err) => {
  if(err){
    console.log('Error connecting to Db');
    return;
  }
  console.log('Connection established');
});

con.query('SELECT * FROM employees', (err,rows) => {
  if(err) throw err;

  console.log('Data received from Db:\n');
  console.log(rows);
  rows_m=rows
});





/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index.ejs', { title: 'Stockhub', data:rows_m });
});


module.exports = router;
