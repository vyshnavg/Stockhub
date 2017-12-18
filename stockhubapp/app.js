var express = require('express');
var path = require('path');
var favicon = require('serve-favicon');
var logger = require('morgan');
var cookieParser = require('cookie-parser');
var bodyParser = require('body-parser');
var session = require('express-session');
var bcrypt = require('bcrypt-nodejs');
var ejs = require('ejs');
var passport = require('passport');
var LocalStrategy = require('passport-local').Strategy;

var con = require('./db')

// var index = require('./routes/index');
// var users = require('./routes/users');

// custom libraries
// routes
var route = require('./routes/authUser');
// model
var Model = require('./model');



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


passport.use(new LocalStrategy(function(username, password, done) {
  new Model.User({username: username}).fetch().then(function(data) {
     var user = data;
     if(user === null) {
        return done(null, false, {message: 'Invalid username or password'});
     } else {
        user = data.toJSON();
        if(!bcrypt.compareSync(password, user.password)) {
           return done(null, false, {message: 'Invalid username or password'});
        } else {
           return done(null, user);
        }
     }
  });
}));

passport.serializeUser(function(user, done) {
 done(null, user.username);
});

passport.deserializeUser(function(username, done) {
  new Model.User({username: username}).fetch().then(function(user) {
     done(null, user);
  });
});


app.set('port', process.env.PORT || 3000);
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');


app.use(session({secret: process.env.SESSION_SECRET || '<mysecret>',resave: true,
   saveUninitialized: true}));
app.use(passport.initialize());
app.use(passport.session());


// GET
app.get('/', route.index);

// signin
// GET
app.get('/signin', route.signIn);
// POST
app.post('/signin', route.signInPost);

// signup
// GET
app.get('/signup', route.signUp);
// POST
app.post('/signup', route.signUpPost);

// logout
// GET
app.get('/signout', route.signOut);


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


module.exports = app;