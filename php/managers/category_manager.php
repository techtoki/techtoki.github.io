<?php
    include_once("db_manager.php");
    class Category extends DatabaseManager{
        public $id;
        public $parent_category_id;
        public $name;
        public $description;

        public function __construct(
            string $name,
            string $description,
            int $parent_category_id,
            int $id = -1,//this will be the default id in which if we insert category, this id will no be inserted bacuase it is auto incremented
            )
            {
                $this->name = $name;
                $this->description = $description;
                $this->parent_category_id = $parent_category_id;
                $this->id = $id;
            }

        public static function getAllCategories():array{
            $categories = self::getAllData("category");
            $return_categories = [];
            foreach($categories as $category){
                array_push($return_categories,new Category(
                    $category[1],$category[2],$category[3],$category[0]
                ));
            }
            return $return_categories;
        }
        
        public static function getCategoryWhere(array $where,array $arguments):array{
            $categories = self::getDataWhere("category",$where,$arguments);
            $return_categories = [];
            foreach($categories as $category){
                array_push($return_categories,new Category(
                    $category[1],$category[2],$category[3],$category[0]
                ));
            }
            return $return_categories;
        }

        public static function updateCategory(array $sets,array $values,array $where = [],array $arguments = []){
            self::updateData("category",$sets,$values,$where,$arguments);
        }
        
        public static function insertCategory(Category $category):string{
            return self::insertData('categories',[
                'name',
                'description',
                'parent_category_id'
            ],[
                $category->name,
                $category->description,
                $category->parent_category_id

            ]);
        }

        public static function upsertCategory(Category $category):string{
            return self::upsertData('categories',[
                ($category->id!=-1)?"id":NULL,
                'name',
                'description',
                'parent_category_id'
            ],[
                ($category->id!=-1)?$category->id:NULL,
                $category->name,
                $category->description,
                $category->parent_category_id
            ],$category->id);
        }

        public static function deleteCategory(array $where,array $arguments){
            self::deleteData("category",$where,$arguments);
        }
    }

    if(isset($_POST["request_product"])){
        $request = $_POST["request_product"];
        
        switch($request[0]){
            case "where":
                echo json_encode(Category::getCategoryWhere($request[1],$request[2]));
            break;
            case "insert":
                $values = $request[1];
                print_r (Category::insertCategory(new Category(
                    $values["name"],
                    $values["description"],
                    $values["parent_category_id"],
                )));
                break;
            case "upsert":
                $values = $request[1];
                print_r(Category::upsertCategory(new Category(
                    $values["name"],
                    $values["description"],
                    $values['id'],
                    $values['parent_category_id'],
                )));
                break;
            case "get":
                echo json_encode (Category::getAllCategories());
                break;
        }
    }


?>