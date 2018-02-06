<div class="container">

<h3>Tender Reference No: # <?= $title?></h3>

        <div class="row">
                <div class="col-md-3">
                <img class="post-thumb-view thumbnail" src="<?php echo asset_url().'images/materials/'.$tender['rm_pic'];?>" >
                </div>
                <div class="col-md-8">
                    
                    <small class="material-date">Posted on: 

                    <?php
                                    
                                    $subdate = $tender['date_of_submission'];
                                    $subtime = $tender['time_submission'];
                                    $sub = date('Y-m-d H:i:s', strtotime("$subdate $subtime "));
                                    
                                    $datetime2 = new DateTime($sub);
                                    echo $sub;
                                    
                                ?>
                    </small><br>
                    
                    <dl class="dl-horizontal">
                        <dt>Manufacturer</dt>
                        <dd><?php echo ($tender['m_firstname']." ".$tender['m_lastname']); ?></dd>
                        <dt>Quantity</dt>
                        <dd><?php echo ($tender['tender_quantity']." ".$tender['tender_quantity_unit']);?></dd>
                        <dt>Time till Expiry</dt>
                        <dd><?php
                                    
                                    $expdate = $tender['date_expire'];
                                    $exptime = $tender['time_expire'];
                                    $exp = date('Y-m-d H:i:s', strtotime("$expdate $exptime "));
                                    
                                    $datetime1 = new DateTime();
                                    $datetime2 = new DateTime($exp);
                                    $interval = $datetime1->diff($datetime2);
                                    echo $interval->format('%d day %h hours %i minutes');
                                    
                                ?>
                        <dd>
                        <dt>Estimated Price</dt>
                        <dd><?php echo ("₹ ".$tender['estimated_price']);?><dd>
                        <dt>Requirements</dt>
                        <dd><?php echo ($tender['extra_info']);?><dd>
                    </dl>

                    <hr>

                    <dl class="dl-horizontal">
                        <dt>Raw Material</dt>
                        <dd><?php echo ($tender['rm_name']);?><dd>
                        <dt>Category</dt>
                        <dd><?php echo ($tender['subcat_name']);?><dd>
                        <dt>Desciption</dt>
                        <dd><?php echo $tender['rm_desc']; ?></dd>
                    </dl>
                <br><br>
                <a class="btn btn-primary" role="button" href="<?php echo site_url('/tenderOpen/'.$tender['rm_slug']); ?>">Send Request <span class="glyphicon glyphicon-send" aria-hidden="true"></span></a>
                <a class="btn btn-default" role="button" href="<?php echo site_url('/tenders'); ?>">Go Back</a>
                </div>
</div></div>