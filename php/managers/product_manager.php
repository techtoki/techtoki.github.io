<?php
    include_once("db_manager.php");
    class Product extends DatabaseManager{
        public $id;
        public $name;
        public $description;
        public $tag;
        public $category_id;
        public $price;
        public $discount;
        public $wish_count;
        public $brand;
        public $rating;
        public $url_from;
        public $image_url;
        public $date_created;

        public function __construct(
            string $name,
            string $description,
            string $tag,
            int $category_id,
            float $price,
            float $discount,
            int $wish_count,
            string $brand,
            int $rating,
            string $url_from,
            string $image_url,
            DateTime $date_created = NULL,
            int $id = -1,//this will be the default id in which if we insert product, this id will no be inserted bacuase it is auto incremented
            )
            {
                $this->name = $name;
                $this->description = $description;
                $this->tag = $tag;
                $this->category_id = $category_id;
                $this->price = $price;
                $this->discount = $discount;
                $this->wish_count = $wish_count;
                $this->brand = $brand;
                $this->rating = $rating;
                $this->url_from = $url_from;
                $this->image_url = $image_url;
                $this->date_created = $date_created;
                $this->id = $id;
            }

        
        
            
        public static function getAllProducts():array{
            $products = self::getAllData("products");
            $return_products = [];
            foreach($products as $product){
                array_push($return_products,new Product(
                    $product[1],$product[2],$product[3],$product[4],
                    $product[5],$product[6],$product[7],
                    $product[8],$product[9],$product[10],
                    $product[11],new DateTime($product[12]),$product[0]
                ));
            }
            return $return_products;
        }
        
        public static function getProductWhere(array $where,array $arguments):array{
            $products = self::getDataWhere("products",$where,$arguments);
            $return_products = [];
            foreach($products as $product){
                array_push($return_products,new Product(
                    $product[1],$product[2],$product[3],$product[4],
                    $product[5],$product[6],$product[7],
                    $product[8],$product[9],$product[10],
                    $product[11],new DateTime($product[12]),$product[0]
                ));
            }
            return $return_products;
        }

        public static function updateProduct(array $sets,array $values,array $where = [],array $arguments = []){
            self::updateData("products",$sets,$values,$where,$arguments);
        }
        
        public static function insertProduct(Product $product):string{
            return self::insertData('products',[
                'name',
                'description',
                'tag',
                'category_id',
                'price',
                'discount',
                'wish_count',
                'brand',
                'rating',
                'url_from',
                'image_url',
            ],[
                $product->name,
                $product->description,
                $product->tag,
                $product->category_id,
                $product->price,
                $product->discount,
                $product->wish_count,
                $product->brand,
                $product->rating,
                $product->url_from,
                $product->image_url,
            ]);
        }

        public static function upsertProduct(Product $product):string{
            return self::upsertData('products',[
                ($product->id!=-1)?"id":NULL,
                'name',
                'description',
                'tag',
                'category_id',
                'price',
                'discount',
                'wish_count',
                'brand',
                'rating',
                'url_from',
                'image_url',
            ],[
                ($product->id!=-1)?$product->id:NULL,
                $product->name,
                $product->description,
                $product->tag,
                $product->category_id,
                $product->price,
                $product->discount,
                $product->wish_count,
                $product->brand,
                $product->rating,
                $product->url_from,
                $product->image_url,
            ],$product->id);
        }

        public static function deleteProduct(array $where,array $arguments){
            self::deleteData("products",$where,$arguments);
        }
    }

    if(isset($_POST["request_product"])){
        $request = $_POST["request_product"];
        
        switch($request[0]){
            case "where":
                echo json_encode(Product::getProductWhere($request[1],$request[2]));
            break;
            case "insert":
                $values = $request[1];
                print_r (Product::insertProduct(new Product(
                    $values["name"],
                    $values["description"],
                    $values['tag'],
                    0,
                    $values['price-input'],
                    $values['discount-input'],0,
                    $values['brand'],0,
                    $values['url-from'],
                    $values['image-url']
                )));
                break;
            case "upsert":
                    $values = $request[1];
                    print_r(Product::upsertProduct(new Product(
                        $values["name"],
                        $values["description"],
                        $values['tag'],
                        $values['category'],
                        $values['price-input'],
                        $values['discount-input'],
                        $values['wish'],
                        $values['brand'],
                        $values['rating'],
                        $values['url-from'],
                        $values['image-url'],
                        new DateTime($values['date-created']["date"]),
                        $values['id'],
                        
                    )));
                    break;
        }
    }


?>