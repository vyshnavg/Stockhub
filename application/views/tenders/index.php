<div class="container">
    
    <h1><?= $title ?></h1>

    <input class="form-control" id="tenderSearchInput" type="text" placeholder="Search..">
    <br>

    <table class="table table-striped table-hover ">
        
        <thead>
            <!-- <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            </tr> -->

            <tr>
                <th>SI No</th>
                <th>tender</th>
                <th>Quantity</th> <!-- quuanitiy and unit combined-->
                <th>Time till Expiry</th>
                <th>Estimated Price (₹)</th>
            </tr>

        </thead>

        <tbody id="tenderSearchTable">
            <!-- <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
            </tr>
            <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>mary@mail.com</td>
            </tr>
            <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@greatstuff.com</td>
            </tr>
            <tr>
                <td>Anja</td>
                <td>Ravendale</td>
                <td>a_r@test.com</td>
            </tr> -->
            <?php $i = 1; ?>
            <?php foreach($tenders as $tender): ?>
                    <tr>
                        <td><?php echo($i++);?></td>
                        <td><?php echo ($tender['rm_name']);?></td>
                        <td><?php echo ($tender['tender_quantity']." ".$tender['tender_quantity_unit']);?> </td>
                        <td>
                        <?php
                            
                            $expdate = $tender['date_expire'];
                            $exptime = $tender['time_expire'];
                            $exp = date('Y-m-d H:i:s', strtotime("$expdate $exptime "));
                            
                            $datetime1 = new DateTime();
                            $datetime2 = new DateTime($exp);
                            $interval = $datetime1->diff($datetime2);
                            echo $interval->format('%d day %h hours %i minutes');
                            
                        ?>
                        </td>
                        <td><?php echo ($tender['estimated_price']);?></td>
                    </tr>
            <?php endforeach; ?>

        </tbody>

    </table> 

</div>
