<?php
    include_once 'db.class.php';

    class Buses extends DB{
        function add_bus($bus,$seats){
            return DB::execute("INSERT INTO buses(bus,seats) VALUES(?,?)", [$bus,$seats]);
        }
        function fetch_buses(){
            return DB::fetchAll("SELECT * FROM buses",[]);
        }
        function fetch_bus($id){
            return DB::fetch("SELECT * FROM buses WHERE id = ? ",[$id] );
        }
        function check_bus_existence($bus){
            return DB::fetch("SELECT * FROM buses WHERE bus = ? ",[$bus] );
        }
        function delete_bus($id){
            return DB::execute("DELETE FROM buses WHERE id ? ",[$id]);
        }

        function buses_num(){
            return DB::num_row("SELECT id FROM buses ",[] );
        }
    }
?>