<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Stockhub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <link rel="stylesheet" type="text/css"  href="https://bootswatch.com/3/yeti/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css"  href="<?php echo asset_url();?>css/style.css" />
    
    <!-- <script src="main.js"></script> -->

    <!-- <link href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css" rel="stylesheet"/> -->

</head>
<body>

<!-- NAVBAR START -->

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>">StockHUB</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="<?php if ($title=="Materials") {echo "active"; } else  {echo "noactive";} ?>"> <a href="<?php echo base_url(); ?>materials">Materials</a></li>
                <li class="<?php if ($title=="About") {echo "active"; } else  {echo "noactive";} ?>"> <a href="<?php echo base_url(); ?>about">About</a></li>
                <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                </ul>
                </li> -->
            </ul>
            <!-- <form class="navbar-form navbar-left">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form> -->
            <ul class="nav navbar-nav navbar-right">
                <?php if(!$this->session->userdata('logged_in')) : ?>
                    <li class="<?php if ($title=="Login") {echo "active"; } else  {echo "noactive";} ?>"> <a href="<?php echo base_url(); ?>users/login">Login</a></li>
                    <li class="<?php if ($title=="Sign Up") {echo "active"; } else  {echo "noactive";} ?>"> <a href="<?php echo base_url(); ?>users/register">Register</a></li>
                <?php else : ?>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo ucfirst($this->session->userdata('first_name'))." ".ucfirst($this->session->userdata('last_name')) ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li role="separator" class="divider"></li>
                        <li > <a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
                    </ul>
                    </li>
                    
                <?php endif; ?>

            </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <!-- NAVBAR END -->

    <div class="container">
        <!-- Flash messages -->
        <?php if($this->session->flashdata('user_registered')): ?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('user_loggedin')): ?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('login_failed')): ?>
            <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
        <?php endif; ?>


    </div>