<div  class="container"> 
    <h1 style="text-align:center;">StockHUB</h1>
</div>



<div class="container"> 
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" name="homesearch" id="homesearch" class="awesomplete" list="mylist" autofocus>

                <datalist id="mylist">
                <?php foreach($products as $product) : ?>
                    <option><?php echo($product['product_cat_name']);?></option>
                <?php endforeach; ?>
                </datalist>

                <!-- <span class="input-group-btn">
                    <button class="btn btn-default" type="button" ><i class="glyphicon glyphicon-search"></i></button>
                </span>    -->
            </div>

            <!-- <div class="list-group" id="finalResult2"></div> -->

            <!-- <h2 id="homeSearchResultH2">Table</h2>
            <h4 id="homeSearchResultH4">Raw Materials Required : </h4></br>
            <a href="#" class="well well-sm" id="homeSearchResultA">Wood</a> -->

            
            
            <!-- <h2 id="homeSearchResultH2"></h2>
            <h4 id="homeSearchResultH4"></h4></br>
            <a href="#" class="well well-sm" id="homeSearchResultA"></a> -->

        </div>
    </div>
        <div class="list-group" id="finalResult2">
        </div>
        
</div>

<div id="titleHomeDiv" style="text-align:center;" class="container"> 
    <div > 
        Raw Material 
    </div>
    <div> 
        <span> Search &amp; Procure</span>
    </div>
</div>


<div id="howitworks" class="howitworks bgimg-2">
     <div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 text-center">
                        <i class="fas fa-search fa-4x" aria-hidden="true"></i> 
						<h3>Search &amp; find <br>Raw materials <br>according to business needs</h3>
					</div>
					<div class="col-lg-3 col-md-4 text-center">
						<i class="far fa-file-alt fa-4x" aria-hidden="true"></i>
						<h3>Create a Tender for<br>the material</h3>
					</div>
					<div class="col-lg-3 col-md-4 text-center">
						<i class="fas fa-users fa-4x" aria-hidden="true"></i>
						<h3>All the vendors<br>selling that material<br>will be notified</h3>
                    </div>
                    <div class="col-lg-3 col-md-4 text-center">
						<i class="fas fa-truck fa-4x" aria-hidden="true"></i>
						<h3>After the preffered vendor<br>is selected<br>the material will be delivered</h3>
					</div>
                </div>
                
     </div>
</div>

<!-- <div id="container">
<input type="text" name="search" id="search" />
<ul id="finalResult"></ul>
</div> -->

