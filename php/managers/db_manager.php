<?php
    //This class will handle the queries for much simplier way of handling the data from sql
    //This will be inherit from other data_manager class
    class DatabaseManager{
        public static function &connect():mysqli {
            $servername = "remotemysql.com";
            $username = "7RB0Pwj6g5";
            $password = "kroyJuEKLR";
            $database = "7RB0Pwj6g5";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            return $conn;
           
        }
        
        protected static function getDataWhere(string $table,array $where,array $arguments):array{
            $condition_arguments = self::formatWhereArguments($where,$arguments);//Store coditional arguments to format as fallows - field = argument
            $mysqli =& self::connect();
            $results = [];
            if($condition_arguments=="") {echo "where parameter must be equal to arguments parameter";return[];}
            $result = $mysqli -> query("SELECT * FROM $table WHERE $condition_arguments;");
            if($result){
                while($row = $result -> fetch_row()){
                    array_push($results,$row);
                }
                return $results;
            }
            if ($mysqli -> error) {
                echo $mysqli -> error;
                exit();
            }
                
        }

        protected static function getAllData(string $table):array{
            $mysqli  =& self::connect();
            $results = [];
            if($result = $mysqli-> query("SELECT * FROM $table")){
                while($row = $result -> fetch_row()){
                    array_push($results,$row);
                }
            }
            if ($mysqli -> error) {
                echo $mysqli -> error;
                exit();
            }
            return $results; 
        }

        protected static function updateData(string $table,array $sets,array $values,array $where = [],array $arguments = []):string{
            $set_arguments = self::formatArguments($sets,$values);
            $condition_arguments = self::formatWhereArguments($where,$arguments);
            $mysqli =& self::connect();
            
            if($set_arguments=="") {echo "sets parameter must be equal to values parameter";return "Error";}
            if($condition_arguments==""&&(count($where)>0&&count($arguments)>0)) {echo "where parameter must be equal to arguments parameter";return "Error";}
            
            $where_arguments = ($condition_arguments!="")?"WHERE $condition_arguments":";";
            $mysqli -> query("UPDATE $table SET $set_arguments $where_arguments");
            if ($mysqli -> error) {
                if(mysqli_errno($mysqli) == 1062){
                    return $mysqli -> error;
                }
                return "Error".$mysqli -> error;;
            }
            return "Success";
            
        }

        protected static function insertData(string $table,array $column,array $values):string{
            $mysqli =& self::connect();
            if(count($column)>0 && count($values)>0){
                $column_values = implode(",",self::formatField($column));
                $values_values = implode(",",self::formatValue($values));

                // echo $values_values;
                $mysqli -> query("INSERT INTO $table ($column_values) VALUES ($values_values)");
                if ($mysqli -> error) {
                    if(mysqli_errno($mysqli) == 1062){
                        return $mysqli -> error;
                    }
                    return "Error".$mysqli -> error;
                }
                return "";
            }
        }
        //this will insert a data if id is not exist, else update date if exist.
        //Your column must be a unique or a primary key inorder for this to work,
        //Example: email is unique, so therefore if there is already an email
        //that is similar to the one you want to enter, therefore it will
        //not be inserted, therfore it will just update some values  
        public static function upsertData(string $table,$column,array $values,int $id):string{
            $mysqli =& self::connect();
            if(count($column)>0 && count($values)>0){
                $column_values = implode(",",self::formatField($column));
                $values_values = implode(",",self::formatValue($values));
                $set_arguments = self::formatArguments($column,$values);
                // echo $column_values;
                
                $mysqli -> query("INSERT INTO $table ($column_values) VALUES ($values_values)");
                if ($mysqli -> error) {
                    if(mysqli_errno($mysqli) == 1062){
                        if($id!=-1){
                            $mysqli -> query("UPDATE $table SET $set_arguments WHERE id = $id");
                            if($mysqli -> error)return $mysqli -> error;
                            return "Success";
                        }
                        return "Failed";
                    }
                    return "Error".$mysqli -> error;;
                   
                }
            }
        }
        protected static function deleteData(string $table,array $where,array $arguments):string{
            $mysqli =& self::connect();
            $where_arguments = self::formatWhereArguments($where,$arguments);
            $mysqli -> query("DELETE FROM $table WHERE $where_arguments");
            if ($mysqli -> error) {
                return "Error".$mysqli -> error;;
            }
            return "Success";
        }

        private static function formatValue(array $values):array{
            $result_value = [];
            foreach($values as $value){
                
                if(gettype($value)!="NULL"){
                    array_push($result_value,(gettype($value)=="string")?"'".$value."'":$value);
                }
            }
            // echo implode(",",$result_value);
            
            return $result_value;
        }
        private static function formatField(array $fields):array{
            $result_fields = [];
            foreach($fields as $field){
                if($field!=NULL){
                    array_push($result_fields,$field);
                }
            }
            
            return $result_fields;
        }
        //format arguments to be instert to sql query, Ex. last_name = value,first_name = value
        //this fucntion will return a series 
        //if value is a string then this function will automatically put a single quote
        //if the fields and the value is not the same length/count the it will return an empty string
        private static function formatArguments(array $fields,array $values):string{
            $formated_arguments = "";
            if(count($fields)==count($values)){
                $count = 0;
                foreach($fields as $field){
                    $input_value = (gettype($values[$count])=="string")?"'".$values[$count]."'":$values[$count];//if string type the put single quote
                    if($field!=NULL){
                        if($count<count($values)-1){
                            $formated_arguments .= $field."=".$input_value.",";
                        }
                        else{
                            $formated_arguments .= $field."=".$input_value;
                        }
                    }
                    $count++;
                }
            }
            if($formated_arguments!="")return $formated_arguments;
            return "";
        }
        private static function formatWhereArguments(array $fields,array $values):string{
            $formated_arguments = "";
            if(count($fields)==count($values)){
                $count = 0;
                foreach($fields as $field){
                    $input_value = (gettype($values[$count])=="string")?"'".$values[$count]."'":$values[$count];//if string type the put single quote
                    if($field!=NULL){
                        if($count<count($values)-1){
                            $formated_arguments .= $field."=".$input_value." AND ";
                        }
                        else{
                            $formated_arguments .= $field."=".$input_value;
                        }
                    }
                    $count++;
                }
            }
            if($formated_arguments!="")return $formated_arguments;
            return "";
        }


    }

    // $dbManager = new DatabaseManager();
    // $customer = $dbManager::getAllData('customer');
    // foreach($customer as $value){
    //     echo implode(" ",$value);
    // }
    

?>
