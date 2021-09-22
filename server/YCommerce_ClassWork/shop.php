
<?php include ("./_includes/_header.php"); ?>
<?php
    if(!isset($_SESSION['currentUser'])){
        header("Location:login.php?error=please try login first");
    }
?>
        <main>
            <div class="row">
                <div class="col-lg-3 col-md-2 col-sm-12">
                    <div class="leftMenu m-5">
                        <h2><strong>Categories</strong></h2>
                        <ul id="CategoriesList">
                            
                        </ul>
                        <h2><strong>Best Deal</strong></h2>
                        <ul id="PopularProductsList">

                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-10 col-sm-12">
                    <div class="mainContent">
                        <div class="row">
                            <?php 
                                $categoryId = isset($_GET['Category']) ? $_GET['Category'] : "all";
                                $productsList = [];
                                require_once './Models/Products.php';//Non respect du Pattern MVC, vue qu'on fait appel au Model directement depuis la Vue
                                if($categoryId == "all"){
                                    // Metod 2 : using PHP (Non MVC way)
                                    $productsList = Product::getAllProductsList();
                                }
                                else{
                                    $productsList = Product::getProductsByCategory($categoryId);
                                }

                                foreach($productsList as $productData){
                                    ?>
                                    <div class="col-md-4 mb-3">
                                        <div class="bbb_deals">
                                            <div class="bbb_deals_slider_container">
                                                <div class=" bbb_deals_item">
                                                    <div class="bbb_deals_image"><img src="<?php echo $productData[0]->ProductImg ?>" alt="" height="150"></div>
                                                    <div class="bbb_deals_content">
                                                        <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                                            <div class="bbb_deals_item_category"><a href="#"><?= $productData[1]['CategoryName'] ?></a></div>
                                                            <!-- <div class="bbb_deals_item_price_a ml-auto"><strike>?= $productData[0]->ProductPrice ?></strike></div> -->
                                                        </div>
                                                        <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                                            <div class="bbb_deals_item_name"><?= $productData[0]->Name ?></div>
                                                            <div class="bbb_deals_item_price ml-auto"><?= $productData[0]->Price ?></div>
                                                        </div>
                                                        <div class="available">
                                                            <div class="available_line d-flex flex-row justify-content-start">
                                                                <div class="available_title">Available: <span>6</span></div>
                                                                <div class="sold_stars ml-auto"> 
                                                                    <?php
                                                                        for($i = 0; $i < $productData[0]->Rating; $i++) 
                                                                        { ?>

                                                                            </i> <i class="fa fa-star"></i>

                                                                        <?php } ?>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="available_bar"><span style="width:17%"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php 
                                }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </main>
        <button id="bb">Bla</button>

        <script> 
        // Metod 1 : using AJAX: (Correct, recommanded way for using MVC)
        $.ajax({
            url: "products_controller.php?action=listPopularProductsNames"
        })
        .done(function( response ) {
            let item = document.getElementById("PopularProductsList");
            let data = JSON.parse(response);
            item.innerHTML = "";
            for(var i = 0; i < data.length; i++ ){
                item.innerHTML += '<li>'+ data[i] +'</li>';
            }
        });
        
        $.ajax({
            url: "products_controller.php?action=ListCategoriesNames"
        })
        .done(function( response ) {
            let item = document.getElementById("CategoriesList");
            let data = JSON.parse(response);
            console.log(data);
            item.innerHTML = "";
            for(var i = 0; i < data.length; i++ ){
                item.innerHTML += '<li><a href="shop.php?category='+ data[i]['CategoryId'] + '">' + data[i]['CategoryName'] + '</a></li>';
            }
        });
        
        </script>
        
        <?php include ("./_includes/_footer.php") ?>