<div class="container">

<h3><?php echo $material['rm_name']; ?></h3>

        <div class="row">
                <div class="col-md-3">
                    <img class="post-thumb-view thumbnail" src="<?php echo asset_url().'images/materials/'.$material['rm_pic'];?>" >
                </div>
                <div class="col-md-8">
                    <small class="material-date">Posted on: <?php echo $material['rm_created_at']; ?> in <strong><?php echo $material['subcat_name'];?></strong></small><br>
                    <?php echo $material['rm_desc']; ?>
                    <br><br>

                    <div class="row well">
                        <div class="col-md-6">
                            <h4 class="text-success">Pros</h4>
                            <p><?php echo $material['rm_adv']; ?></p>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-danger">Cons</h4>
                            <p><?php echo $material['rm_disadv']; ?></p>
                        </div>
                    </div>

                    <a class="btn btn-primary" role="button" href="<?php echo site_url('/tenderOpen/'.$material['rm_slug']); ?>">Create Tender</a>
                    <a class="btn btn-default" role="button" href="<?php echo site_url('/materials'); ?>">Go Back</a>
                </div>
</div></div>