<div class="container">

<h3>Tender Reference No: # <?= $title?></h3>

        <div class="row">
            <div class="col-md-3">
                <img class="post-thumb-view thumbnail" src="<?php echo asset_url().'images/materials/'.$tender['rm_pic'];?>" >
            </div>
            <div class="col-md-9">
                
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

<?php if($this->session->userdata('user_id') != $tender['m_id']): ?>

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
                                        


                                        <!-- <div class="form-group">
                                            <label for="inpuFname">Enter the quantity that you can deliver</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
                                                <input type="number" value="1" class="form-control" min="1" name="tender_quantity"  id="tender_quantity">
                                            </div>
                                        </div> -->

                                        <div class="row">
                                        <label>Enter the quantity that you can deliver</label>
                                            <div class="col-xs-6 col-sm-7 col-md-7">
                                                <div class="form-group">
                                                    <!-- <label for="inpuFname">Quantity</label> -->
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
                                                        <input type="number" value="1" class="form-control" min="1" name="tender_quantity"  id="tender_quantity">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-6 col-sm-5 col-md-5">
                                                <div class="form-group">

                                                    <!-- <label for="sel1">Select Unit:</label> -->
                                                    <select class="form-control" name="tender_quantity_unit" id="tender_quantity_unit">
                                                        <option value="Kilograms">Kilograms</option>
                                                        <option value="Pounds">Pounds</option>
                                                        <option value="Quintals">Quintals</option>
                                                        <option value="Litres">Litres</option>
                                                        <option value="Gallons">Gallons</option>
                                                        <option value="Units">Units</option>
                                                    </select>

                                                </div>
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
        </div>

<?php else: ?>

        </div>
        </div>
        <hr>
        <h3>Tender Requests</h3>
        </br>
                
        <?php if($temp==1): ?>
            <h5 class="text-center text-danger"><i>Tender Expired</i></h5>
        <?php elseif(empty($DiffVendorRequests)): ?>
            <h5 class="text-center text-warning"><i>No Requests</i></h5>
        <?php else: ?>

            <table class="table table-striped table-hover " id="diffVendorTable">
                    
                <thead>
                    <tr>
                        <th>SI No</th>
                        <th onclick="sortTable(0)" >Request ID</th>
                        <th onclick="sortTable(1)" >Vendor Name</th> <!-- quantity and unit combined-->
                        <th onclick="sortTable(2)" >Quantity</th>
                        <th onclick="sortTable(3)" >Quoted Price (₹)</th>
                        <th onclick="sortTable(4)" >Delivery Date</th>
                        <th>Additional Info</th>
                        <th>Operations</th>
                    </tr>
                </thead>

                <tbody id="diffVendoTableBody">
                    <?php $i = 1; ?>
                    <?php foreach($DiffVendorRequests as $DiffVendorRequest): 
                            if($DiffVendorRequest['req_status'] != "declined"): ?>
                            <tr> 
                                <td>  <?php echo($i++);?></td>
                                <td><?php echo ("#".$DiffVendorRequest['request_id']); ?></td>
                                <td><?php echo ($DiffVendorRequest['v_firstname']." ".$DiffVendorRequest['v_lastname']); ?></td>
                                <td><?php echo ($DiffVendorRequest['quantity']." ".$DiffVendorRequest['quantity_unit']);?></td>
                                <td><?php echo ("₹ ".$DiffVendorRequest['quoted_price']);?></td>
                                <td><?php echo ($DiffVendorRequest['delivery_date']); ?></td>
                                <td><?php echo ($DiffVendorRequest['req_desc']); ?></td>
                                <td>
                                    <!-- <button class="btn btn-success" role="button"  ><span class="glyphicon glyphicon-ok"></span></button> -->
                                    <!-- <button class="btn btn-danger" role="button"  ><span class="glyphicon glyphicon-remove"></span></button> -->
                                    <button class="btn btn-success" type="button" title="Do you want to accept this request?" data-toggle="popover" data-trigger="focus" data-placement="right" data-content="<form action='<?php echo base_url(); ?>tenders/acptRequests/<?php echo($DiffVendorRequest['request_id']) ?>'><input class='btn btn-danger btn-block' type='submit' value='Yes' /></form> <button class='btn btn-info btn-block' href='home'>No</button>"><span class=" glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                                    <button class="btn btn-danger" type="button" title="Do you want to decline this request?" data-toggle="popover" data-trigger="focus" data-placement="right" data-content="<form action='<?php echo base_url(); ?>tenders/declRequests/<?php echo($DiffVendorRequest['request_id']) ?>'><input class='btn btn-danger btn-block' type='submit' value='Yes' /></form> <button class='btn btn-info btn-block' href='home'>No</button>"><span class=" glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                </td>
                                
                            </tr>
                            <?php endif;
                        endforeach; ?>
                </tbody>

            </table> 
        <?php endif;?>

<?php endif; ?>

        
        
</div>