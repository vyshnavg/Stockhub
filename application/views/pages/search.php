<div class="container"> 
    <h1 style="text-align:center;"> StockHUB </h1>
</div>


<div class="container"> 
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="homesearch" id="homesearch" autofocus>
            <span class="input-group-btn">
                <button class="btn btn-default" type="button" ><i class="glyphicon glyphicon-search"></i></button>
            </span>   
            </div>
            <div class="list-group" id="finalResult2"></div>
        </div>
    </div>
    
    <h2 class="text-capitalize"><?php echo($products['product_cat_name']); ?></h2>
    <a href="http://localhost/Stockhub/materials#<?php echo($products['subcat_name']); ?>"><?php echo($products['subcat_name']); ?></a>
    

</div>




