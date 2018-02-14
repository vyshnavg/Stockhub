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
        <span> Breakdown and Procurement</span>
    </div>
</div>


<div id="howitworks" class="howitworks bgimg-2">
     <div class="container">
         <h1 class="wow fadeInUp">How it works</h1>
         
        	     <h2>Searching for Space</h2>
				<hr>

				<div class="row">
					<div class="col-lg-4 col-md-4 wow flipInY">
						<i class="fas fa-user fa-3x" aria-hidden="true"></i>
						<h3>Find space<br>near your location</h3>
					</div>
					<div class="col-lg-4 col-md-4 wow flipInY">
						<i class="far fa-user fa-3x" aria-hidden="true"></i>
						<h3>Contact the storage provider<br>and book your space</h3>
					</div>
					<div class="col-lg-4 col-md-4 wow flipInY">
						<i class="fab fa-github-square fa-3x" aria-hidden="true"></i>
						<h3>Move your items<br>to the booked space</h3>
					</div>
				</div>
     </div>
</div>

<!-- <div id="container">
<input type="text" name="search" id="search" />
<ul id="finalResult"></ul>
</div> -->

