<div class="container">

<h3><?php echo $material['rm_name']; ?></h3>

        <div class="row">
                <div class="col-md-3">
                <img class="post-thumb-view thumbnail" src="<?php echo asset_url().'images/materials/'.$material['rm_pic'];?>" >
                </div>
                <div class="col-md-9">
                    <small class="material-date">Posted on: <?php echo $material['rm_created_at']; ?> in <strong><?php echo $material['subcat_name'];?></strong></small><br>
                    <?php echo $material['rm_desc']; ?>
                <br><br>
                </div>
</div></div>