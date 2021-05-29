
<link rel="stylesheet" href="/ecommerce/widgets/product_card/product_card.css">
<?php

    include_once("../../php/managers/product_manager.php");
    $products = "";
   
    if(isset($_POST['product_category'])){
        $index = 0;
        $specified_class = isset($_POST["specified_class"])?$_POST["specified_class"]:[];
        $added_class = implode("",isset($_POST["add_class_all"])?$_POST["add_class_all"]:[]);
        if($_POST['product_category']!="all"){
            $products = Product::getProductWhere(['category'],$_POST['product_category']);
        }
        else{
            $products = Product::getAllProducts(['category'],$_POST['product_category']);
        }
        shuffle($products);
        foreach($products as $product){
            $discount_price = $product->price-($product->price*($product->discount/100));
            $original_price = "₱".number_format(floatval($product->price), 2);
            $price = "₱".number_format(floatval($discount_price), 2);
            $headers = @get_headers($product->image_url);
            $image = "";
            $rating = $product->rating;
            $star = <<<EOT
                <span class="bi bi-star-fill checked"></span>
                EOT;
            $star_none = <<<EOT
                <span class="bi bi-star-fill un-checked"></span>
                EOT;
            $rating_html="";
            for($i = 1;$i<=$rating;$i++){
                $rating_html.=$star;
            }
            for($i=5-$rating;$i!=0;$i--){
                $rating_html.=$star_none;
            }

            if($headers && strpos( $headers[0], '200')){
                $image = $product->image_url;
            }
            else {
                $image = "/ecommerce/assets/images/techtoki_full_logo.svg";
            }
            $sp_clas = "";
            if($specified_class!==[]){
                try{
                    $keys = array_keys($_POST["specified_class"]);
                    foreach($keys as $i){
                        if($index===$i){
                            $sp_class = $_POST["specified_class"][$index];
                        }
                    }
                    
                }catch(Exception $e){
                    $sp_clas = "";
                }
                
                
            }

           
            $product_card = <<<EOT
            <div class="card-container $added_class $sp_clas" id="$product->id"s>
                <div class="card m-1" style="width: 18rem;height:100%" >
                    <div class="w-100 image-container" style="height:200px">
                        <img class="card-img-top" style="height:100%" src="$image" alt="">
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between w-100">
                        <div> 
                            <h5 class="card-title p-0 m-0">$product->name</h5>
                            <p class="card-text description" id="description">$product->description</p>
                        </div>
                        
                        <div>
                            <div class="d-flex flex-column W-100" id="price-info"> 
                                <div class="card-text" id="price">$price</div>
                                <div class="card-text">
                                    <div class="d-flex">
                                        <div id="discount">$original_price </div>
                                        <div class="ms-2" id="discount-percent">-$product->discount%</div>
                                    </div>
                                </div>
                                <div class="d-flex m-0 justify-content-start p-0">
                                    $rating_html
                                </div>
                            </div>
                            
                            <div class="d-none flex-column W-100" id="hover-price-info"> 
                                <div class="card-text" id="price">$price</div>
                                <div class="card-text">
                                    <div class="d-flex">
                                        <div id="discount">$original_price </div>
                                        <div class="ms-2" id="discount-percent">-$product->discount%</div>
                                    </div>
                                </div>
                                <div class="d-flex m-0 justify-content-start p-0">
                                    $rating_html
                                </div>
                            </div>
                            
                            <div class="d-none flex-row justify-content-between" id="action-buttons">
                                <a href="#" class="btn round-0 mt-1 btn-primary w-100  mr-2 buy-now" id="buy-now">Buy now</a>
                                <a href="#" class="btn round-0 mt-1 btn-primary w-100 ms-2 add-cart" id="add-cart">Add to basket</a>
                            </div>

                            
                        </div>
                    </div>
                </div>
            
            </div>
            
            EOT;
            $index++;
            echo $product_card;
        }
    }
    
    ?>