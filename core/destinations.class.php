<?php
    include_once 'db.class.php';

    class Destinations extends DB{

        function add_destination($destination){
            return DB::execute("INSERT INTO destinations(destination) VALUES(?)", [$destination]);
        }
        function fetch_destinations(){
            return DB::fetchAll("SELECT * FROM destinations",[]);
        }
        function fetch_destination($id){
            return DB::fetch("SELECT * FROM destinations WHERE id = ? ",[$id] );
        }
        function delete_destination($id){
            return DB::execute("DELETE FROM destinations WHERE id ? ",[$id]);
        }

        function destination_students_num($id){
            return DB::num_row("SELECT id FROM students WHERE destination_id = ? ",[$id] );
        }

        function check_destination_existence($destination){
            return DB::num_row("SELECT * FROM destinations WHERE destination = ? ",[$destination] );
        }
    }
?>