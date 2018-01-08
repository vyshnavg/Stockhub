<div class="container">
    
    <h2><?= $title ?></h2>
    
    <!-- <?php //foreach($materials as $material) : ?>
        <h3><?php //echo $material['rm_name']; ?></h3>

        <div class="row">
                <div class="col-md-3">
                <img class="post-thumb thumbnail" src="<?php //echo asset_url().'images/materials/'.$material['rm_pic'];?>" >
                </div>
                <div class="col-md-9">
                    <small class="material-date">Posted on: <?php //echo $material['rm_created_at']; ?> in <strong><?php //echo $material['subcat_name'];?></strong></small><br>
                    <?php //echo word_limiter($material['rm_desc'],60); ?>
                <br><br>
                <p><a class="btn btn-default" role="button" href="<?php //echo site_url('/materials/'.$material['rm_slug']); ?>">Read More</a></p>
                </div>
        </div>
    <?php //endforeach; ?> -->

    <div class="row display-flex">
    <?php foreach($materials as $material) : ?>
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img class="post-thumb thumbnail" src="<?php echo asset_url().'images/materials/'.$material['rm_pic'];?>" >
                <div class="caption">
                    <h3 class="h3-margin-top-change"><?php echo $material['rm_name']; ?></h3>
                    <small class="material-date">Posted on: <?php echo $material['rm_created_at']; ?> in <strong><?php echo $material['subcat_name'];?></strong></small>
                    <p><?php echo word_limiter($material['rm_desc'],40); ?></p>
                    <p>
                        <a href="#" class="btn btn-primary" role="button">Put a Tender</a>  
                        <a class="btn btn-default" role="button" href="<?php echo site_url('/materials/'.$material['rm_slug']); ?>">Read More</a>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>

</div>