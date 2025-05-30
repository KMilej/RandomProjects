<?php
    require "config.php";

    function dbConnect(){
        $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DBNAME);
        if($mysqli->connect_errno != 0 ) {
            return FALSE;
        }else{
        return $mysqli;
        }
    }

    function getCategories(){
       $mysqli = dbConnect();
       $result = $mysqli->query("SELECT DISTINCT category From products");
       while($row = $result->fetch_assoc()){
        $categories[] = $row;
       }
       return $categories;
    }

    function getHomePageProducts($int){
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT * FROM products order by rand() LIMIT $int");
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }

        return $data;
    }
