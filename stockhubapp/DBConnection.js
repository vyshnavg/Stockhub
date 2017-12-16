const mysql = require('mysql');

const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'mango123%',
    database: 'testdb'
});

connection.connect((err) => {
    if(err){
        console.log('Error connecting to Db');
        console.log(err);
        return;
    }
    console.log('Connection established');
});


module.exports = connection;