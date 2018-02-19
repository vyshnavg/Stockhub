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
                        <dt>Estimated Price</dt>
                        <dd><?php echo ("₹ ".$tender['estimated_price']);?></dd>
                        <dt>Requirements</dt>
                        <dd><?php echo ($tender['extra_info']);?></dd>
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
                <button class="btn btn-primary" role="button" data-toggle="modal" data-target="#requestModal" <?php if($temp==1){echo("disabled='true'");} ?> >Send Request <span class="glyphicon glyphicon-send" aria-hidden="true"></span></button>
                <a class="btn btn-default" role="button" href="<?php echo site_url('/tenders'); ?>">Go Back</a>

                            <!-- Request Modal -->
                            <div class="modal fade" id="requestModal" role="dialog">
                                <div class="modal-dialog">
                                
                                <!-- Request Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Send Request</h4>
                                    </div>
                                    <div class="modal-body">
                                        
                                        <?php echo form_open('/tenders/tenderRequest/'.$tender['tender_id']); ?>
                                            <div class="row">

                                                <div class="col-md-8 col-md-offset-2">

                                                    <p  class="text-center"> <?php echo validation_errors(); ?></p>
                                                    


                                                    <div class="form-group">
                                                        <label for="inpuFname">Enter the quantity that you can deliver</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
                                                            <input type="number" value="1" class="form-control" min="1" name="tender_quantity"  id="tender_quantity">
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Enter the Quoted Price</label>
                                                        <div class="input-group"> 
                                                            <span class="input-group-addon">₹</span>
                                                            <input type="number" class="form-control" name="quoted-price" id="quoted-price" value="0" min="0" required/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Date of Delivery</label>
                                                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                            <input type="date" class="form-control" name="dod" id="dod" min="<?php echo date("Y-m-d",strtotime('tomorrow')); ?>" required/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Extra Info / Comments (Optional)</label>
                                                        <div class="input-group"> 
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                                                            <textarea class="form-control" rows="5" placeholder="Max 300 characters" maxlength="300" name="extra_info" id="extra_info"></textarea>
                                                        </div>
                                                    </div>




                                                    
                                                    <button type="submit" class="btn btn-success btn-block" >Submit</button>

                                                </div>

                                            </div>
                                            
                                        <?php echo form_close(); ?>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                
                                </div>
                            </div>

                </div>
</div></div>