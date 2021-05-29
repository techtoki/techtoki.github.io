
<link rel="stylesheet" href="/ecommerce/widgets/product_card/product_card_horizontal.css">
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
            <div class="card-container mb-2 w-100 $added_class $sp_clas" id="$product->id"s>
                <div class="d-block d-md-flex flexx-row justify-content-between w-100">
                    <div class="d-flex flex-row justify-content-start">
                        <div class="image-container" style="height:100px;width:100px">
                            <img class="card-img-top" style="height:100px;width:100px" src="$image" alt="">
                        </div>
                        <div class="d-flex flex-column justify-content-start">
                            <div class="d-flex ms-2 justify-content-start p-0">
                                $rating_html
                            </div>
                            <div class="card-tittle">$product->name</div>
                            <div class="description">$product->description</div>
                            <div class="d-flex flex-column W-100 ms-2" id="hover-price-info"> 
                                <div class="card-text" id="price">$price</div>
                                <div class="card-text">
                                    <div class="d-flex">
                                        <div id="discount">$original_price </div>
                                        <div class="ms-2" id="discount-percent">-$product->discount%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center mx-2">
                        <button class="btn btn-dark action-button" id="$product->id">
                        <i class="bi bi-pencil-square"></i> Modify
                        </button>
                    </div>
                </div>
            </div>
            EOT;
            $index++;
            echo $product_card;
        }
    }
    
    ?>