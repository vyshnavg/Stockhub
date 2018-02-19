<h2 style="padding-left:20px;"> <?= $title ?> </h2>

<div class="row" id="accordion">

    <div class="col-md-2 col-sm-4">
    <div class="list-group" id="listInUserTender">
        <a href="#active" class="list-group-item active" data-toggle="collapse" data-parent="#accordion" >Active Tenders<span class="badge">0</span></a>
        <a href="#ongoing" class="list-group-item" data-toggle="collapse" data-parent="#accordion">Ongoing Tenders<span class="badge">0</span></a>
        <a href="#completed" class="list-group-item" data-toggle="collapse" data-parent="#accordion">Completed Tenders<span class="badge">0</span></a>
    </div>
    </div>


    <div class="col-md-10 col-sm-8" >
        
        <div class="row collapse in" id="active">

            <h3 style="padding-left:20px;" >Active Tenders</h3>

            <?php foreach($openTenders as $open): ?>

                 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="clickableTenders">  <!-- for making it clickable -->
                    <div class="well well-lg">
                        
                        <div class="row">

                            <div class="col-xs-2">
                                
                                <img class="post-thumb-view img-circle" src="<?php echo asset_url().'images/materials/'.$open['rm_pic'];?>" >
                            </div>

                            <div class="col-xs-10">
                                <dl class="dl-horizontal" >
                                    <dt>Item</dt>
                                    <dd><?php echo ($open['rm_name']); ?></dd>
                                    <dt>Quantity</dt>
                                    <dd><?php echo ($open['tender_quantity']." ".$open['tender_quantity_unit']);?></dd>
                                    <dt>Estimated Price</dt>
                                    <dd><?php echo ("₹ ".$open['estimated_price']);?></dd>
                                    <dt>Posted On</dt>
                                    <dd><?php
                                    
                                    $subdate = $open['date_of_submission'];
                                    $subtime = $open['time_submission'];
                                    $sub = date('Y-m-d H:i:s', strtotime("$subdate $subtime "));
                                    
                                    $datetime2 = new DateTime($sub);
                                    echo $sub;
                                    
                                    ?></dd>
                                    <dt>Time till Expiry</dt>
                                    <dd><?php
                                                
                                                $expdate = $open['date_expire'];
                                                $exptime = $open['time_expire'];
                                                $exp = date('Y-m-d H:i:s', strtotime("$expdate $exptime "));
                                                $temp=0;
                                                $datetime1 = new DateTime();
                                                $datetime2 = new DateTime($exp);
                                                if ( $datetime1 >  $datetime2){
                                                    echo("Expired");
                                                    $temp=1;
                                                }
                                                else{
                                                    $interval = $datetime1->diff($datetime2);
                                                echo $interval->format('%d day %h hours %i minutes');
                                                }
                                                
                                            ?>
                                    </dd>
                                    <a style="display:none;" href="<?php echo base_url(); ?>tenders/view/<?php echo($open['tender_id']); ?>" >View</a>
                                </dl>
                            </div>

                        </div>

                    </div>
                </div>

            <?php endforeach ?>

        </div>


        <div class="row collapse" id="ongoing">

            <h3 style="padding-left:20px;">Ongoing Tenders</h3>

            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="well well-lg">
                    sadasdasdLook, I'm in a large well!
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="well well-lg">
                    sadasdasdaLook, I'm in a large well!
                </div>
            </div>
        </div>


        <div class="row collapse" id="completed">

            <h3 style="padding-left:20px;">Completed Tenders</h3>

            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="well well-lg">
                    sadasdasdLook, I'm in a large well!
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="well well-lg">
                    sadasdasdaLook, I'm in a large well!
                </div>
            </div>
        </div>


    </div>

</div>