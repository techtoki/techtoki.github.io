<?php
    include_once("db_manager.php");
    class User extends DatabaseManager{
        public $id;
        public $email_address;
        public $first_name;
        public $last_name;
        public $password;
        public $phone;
        public $billing_address;

        public function __construct(
            string $password,
            string $email_address,
            string $first_name,
            string $last_name,
            string $billing_address,
            string $phone,
            int $id = -1,//this will be the default id in which if we insert user, this id will no be inserted bacuase it is auto incremented
            )
            {
                $this->password = $password;
                $this->email_address = $email_address;
                $this->first_name = $first_name;
                $this->last_name = $last_name;
                $this->phone = $phone;
                $this->billing_address = $billing_address;
                $this->id = $id; 
            }
        
        public static function getAllUsers():array{
            $users = self::getAllData("users");
            $return_customers = [];
            foreach($users as $user){
                array_push($return_customers,new User($user[2],$user[1],
                $user[5],$user[6],$user[4],$user[3],$user[0]
                   
                ));
            }
            return $return_customers;
        }
        
        public static function getUsersWhere(array $where,array $arguments):array{
            $users = self::getDataWhere("users",$where,$arguments);
            $return_customers = [];
            foreach($users as $user){
                array_push($return_customers,new User($user[2],$user[1],
                $user[5],$user[6],$user[4],$user[3],$user[0]
                ));
            }
            return $return_customers;
        }
        
        public static function updateUser(array $sets,array $values,array $where = [],array $arguments = []):string{
            return self::updateData("users",$sets,$values,$where,$arguments);
        }
        
        public static function insertUser(User $user):string{
           
            return self::insertData('users',[
                "password",
                "email_address",
                "firstname",
                "lastname",
                "billing_address",
                "phone"
            ],[
                $user->password,
                $user->email_address,
                $user->first_name,
                $user->last_name,
                $user->billing_address,
                $user->phone,
            ]);
        }
        public static function upsertUser(User $user):string{
            return self::upsertData('users',[
                ($user->id!=-1)?"id":NULL,
                "password",
                "email_address",
                "first_name",
                "last_name",
                "billing_address",
                "country",
                "phone"
            ],[
                ($user->id!=-1)?$user->id:NULL,
                $user->password,
                $user->email_address,
                $user->first_name,
                $user->last_name,
                $user->billing_address,
                $user->phone,
            ], $user->id);
        }
        public static function deleteUser(array $where,array $arguments){
            self::deleteData("user",$where,$arguments);
        }
    }

?>