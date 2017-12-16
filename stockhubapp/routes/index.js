var express = require('express');
var router = express.Router();
const mysql = require('mysql');

var rows_m={}

var con = require('../DBConnection')

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
