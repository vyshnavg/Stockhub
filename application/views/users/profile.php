<div class="container">
    <?php if($id[0] === 'V'):?>
        
        <h2 class="text-center"> <?= $userDetails['v_firstname']." ".$userDetails['v_lastname'] ?> </h2>
        

        <br>

        <div class="row">
					
            <div class="col-md-6 img-align-center">
                <img class="img-circle" src="<?php echo asset_url().'images/web-req/noimg.png'?>" alt="no image">
            </div>

            <div class="col-md-6">
                <div class="well">
                    <dl class="dl dl-horizontal">

                        <dt>Email</dt>
                        <dd><?php echo($userDetails['v_email']); ?></dd>
                        <dt>Status</dt>
                        <dd><?php echo($userDetails['v_status']); ?></dd>
                        <?php if($userDetails['v_org_name']):?>
                            <dt>Organization</dt>
                            <dd><?php echo($userDetails['v_org_name']); ?></dd>
                        <?php endif;?>
                        <?php if($userDetails['v_website']):?>
                            <dt>Website</dt>
                            <dd><a href="<?php echo($userDetails['v_website']); ?>">Click Here</a></dd>
                        <?php endif;?>
                        <?php if($userDetails['v_exprt_mthd']):?>
                            <dt>Export Method</dt>
                            <dd><?php echo($userDetails['v_exprt_mthd']); ?></dd>
                        <?php endif;?>

                        <dt>Address</dt>
                        <dd class="h4-margin-top-change"><?php echo ($address_arr['building_no'].", ".$address_arr['street'].", ".$address_arr['city'].", ".$address_arr['state'].", ".$address_arr['country'].". Pincode : ".$address_arr['pincode'].". Landmark : ".$address_arr['land_mark']); ?></dd>

                    </dl>			
				</div>


                <button class="btn btn-primary btn-block">Message</button>
            </div>

        </div>


    <?php else:?>

    <?php endif;?>
</div>