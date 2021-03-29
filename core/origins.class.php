<?php
    include_once 'db.class.php';

    class Origins extends DB{

        function add_origin($origin){
            return DB::execute("INSERT INTO origins(origin) VALUES(?)", [$origin]);
        }
        function fetch_origins(){
            return DB::fetchAll("SELECT * FROM origins",[]);
        }
        function fetch_origin($id){
            return DB::fetch("SELECT * FROM origins WHERE id = ? ",[$id] );
        }
        function delete_origin($id){
            return DB::execute("DELETE FROM origins WHERE id ? ",[$id]);
        }

        function origin_students_num($id){
            return DB::num_row("SELECT id FROM students WHERE origin_id = ? ",[$id] );
        }
    }
?>