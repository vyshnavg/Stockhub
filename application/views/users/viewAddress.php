<?php echo form_open('users/newAddress',' id="address_form"'); ?>
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <p  class="text-center"> <?php echo validation_errors(); ?></p>



            <div class="form-group">
                <label>Building/Flat No: </label>
                    <input type="text" class="form-control" id="buildno" name="buildno" maxlength="24" value="<?php echo ($address_arr['building_no'])?>" required/>
            </div>

            <div class="form-group">
                <label>Street: </label>
                <input class="form-control" type="text" id="street" name="street" placeholder="Max 100 characters" maxlength="100" value="<?php echo ($address_arr['street'])?>"/>

            </div>

            <div class="form-group">
                <label>Pincode No: </label>
                    <input type="number" class="form-control" id="pincode" name="pincode"  min="100000" max="999999" value="<?php echo ($address_arr['pincode'])?>" required/>
            </div>

            <div class="form-group">
                <label>Landmark (Optional): </label>
                    <input type="text" class="form-control" id="landmark" name="landmark" maxlength="49" value="<?php echo ($address_arr['land_mark'])?>" />
            </div>

            <div class="form-group">
                <label>State: </label>
                <select class="form-control" id="listBox" name="listBox" maxlength="24" onchange='selct_district(this.value)'></select>
            </div>

            <div class="form-group">
                <label>City: </label>
                <select class="form-control" id='secondlist' maxlength="29" name="secondlist"></select>
            </div>

            <div class="form-group">
                <label>Country: </label>
                <input type="text" class="form-control" value="India" id="country" name="country" data-toggle="popover" data-trigger="hover" data-content="Only available in India now." readonly="readonly" value="<?php echo ($address_arr['country'])?>"/>
            </div>




            
            <button type="submit" class="btn btn-success btn-block">Submit</button>

        </div>

    </div>
    
<?php echo form_close(); ?>