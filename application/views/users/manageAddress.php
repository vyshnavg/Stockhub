<div class="container"> 
    <h2> <?= $title ?> </h2>

    <div class="row display-flex">

        <?php foreach($addresses_arr as $address_arr) : ?>
        <div class="col-sm-6 col-md-3">
            <div class="well">
                <div class="caption">
                    <h3 class="h3-margin-top-change"><?php echo ($address_arr['building_no']." , ".$address_arr['street']." , ".$address_arr['city']." , ".$address_arr['state']." , ".$address_arr['country'].". Pincode : ".$address_arr['pincode']); ?></h3>
                        
                        <div class="col-md-6">
                            <a class="btn btn-warning" role="button" href="#">Edit</a> 
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-danger" role="button" href="#" title="Do you want to delete the Address?" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="<a class='btn btn-danger' href='#'>Yes</a><a class='btn btn-info' href='#'>No</a>">Delete</a>
                        </div>

                </div>
            </div>

        </div>
        <?php endforeach; ?>


        <div class="col-sm-6 col-md-3">

            <!-- <div class="well">
                <div class="caption">
                    <h3 class="h3-margin-top-change">ADD</h3> -->
                    <a class="btn btn-info" role="button" href="#" style="height:200px; font-size:100px; align-content: space-around; align-items:center"><i class="glyphicon glyphicon-plus"></i></a>  
                <!-- </div>
            </div> -->
            
        </div>

    </div>
</div>
