<div class="container">
    <?php if($id[0] === 'V'):?>
        
        <h2 class="text-center"> <?= $userDetails['v_firstname']." ".$userDetails['v_lastname'] ?> (Vendor) </h2>
        

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
                            <dd><a href="<?php echo($userDetails['v_website']); ?>" target="_blank">Click Here</a></dd>
                        <?php endif;?>
                        <?php if($userDetails['v_exprt_mthd']):?>
                            <dt>Export Method</dt>
                            <dd><?php echo($userDetails['v_exprt_mthd']); ?></dd>
                        <?php endif;?>

                        <dt>Address</dt>
                        <dd class="h4-margin-top-change"><?php echo ($address_arr['building_no'].", ".$address_arr['street'].", ".$address_arr['city'].", ".$address_arr['state'].", ".$address_arr['country'].". Pincode : ".$address_arr['pincode'].". Landmark : ".$address_arr['land_mark']); ?></dd>

                    
                    </dl>			
				</div>

                <div class="well">
                    <dl class="dl dl-horizontal">
                        <dt>Ongoing Tenders</dt>
                        <dd><?php echo count($ongoingTenders); ?></dd>
                        <dt>Completed Tenders</dt>
                        <dd><?php echo count($completedTenders); ?></dd>
                    </dl>			
				</div>


                <button class="btn btn-primary btn-block" onclick="location.href='<?php echo base_url(); ?>users/messages/<?php echo ($userDetails['v_id'])?>/<?php echo($userDetails['v_firstname'])?>/<?php echo($userDetails['v_lastname'])?>'">Message</button>
            </div>

        </div>


    <?php else:?>

    <h2 class="text-center"> <?= $userDetails['m_firstname']." ".$userDetails['m_lastname'] ?> (Manufacturer) </h2>
        

        <br>

        <div class="row">
					
            <div class="col-md-6 img-align-center">
                <img class="img-circle" src="<?php echo asset_url().'images/web-req/noimg.png'?>" alt="no image">
            </div>

            <div class="col-md-6">
                <div class="well">
                    <dl class="dl dl-horizontal">

                        <dt>Email</dt>
                        <dd><?php echo($userDetails['m_email']); ?></dd>
                        <dt>Status</dt>
                        <dd><?php echo($userDetails['m_status']); ?></dd>
                        <?php if($userDetails['m_org_name']):?>
                            <dt>Organization</dt>
                            <dd><?php echo($userDetails['m_org_name']); ?></dd>
                        <?php endif;?>

                        <dt>Address</dt>
                        

                        <?php foreach($address_arr as $addresses_arr) : ?>
								<dd class="h4-margin-top-change"> - <?php echo ($addresses_arr['building_no']." , ".$addresses_arr['street']." , ".$addresses_arr['city']." , ".$addresses_arr['state']." , ".$addresses_arr['country'].". Pincode : ".$addresses_arr['pincode']); ?></dd>
                                <br>
                        <?php endforeach; ?>

                    
                    </dl>			
				</div>

                <div class="well">
                    <dl class="dl dl-horizontal">
                        <dt>Active Tenders</dt>
                        <dd><?php echo count($activeTenders); ?></dd>
                        <dt>Ongoing Tenders</dt>
                        <dd><?php echo count($ongoingTenders); ?></dd>
                        <dt>Completed Tenders</dt>
                        <dd><?php echo count($completedTenders); ?></dd>
                    </dl>			
				</div>


                <button class="btn btn-primary btn-block" onclick="location.href='<?php echo base_url(); ?>users/messages/<?php echo ($userDetails['m_id'])?>/<?php echo($userDetails['m_firstname'])?>/<?php echo($userDetails['m_lastname'])?>'">Message</button>
            </div>

        </div>

    <?php endif;?>
</div>