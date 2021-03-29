<?php
    include_once 'db.class.php';

    class Trips extends DB{
        function add_trip($destination_id,$bus_id,$take_off_time_id,$amount){
            return DB::execute("INSERT INTO trips(destination_id,bus_id,take_off_time_id,amount) VALUES(?,?,?,?)", [$destination_id,$bus_id,$take_off_time_id,$amount]);
        }
        function fetch_trips(){
            return DB::fetchAll("SELECT *,trips.id FROM trips
                JOIN buses ON buses.id = trips.bus_id
                JOIN destinations ON destinations.id = trips.destination_id                
                JOIN take_off_times ON take_off_times.id = trips.take_off_time_id
                ",[]);
        }
        function fetch_trip($id){
            return DB::fetch("SELECT *,trips.id FROM trips                 
                JOIN buses ON buses.id = trips.bus_id
                JOIN destinations ON destinations.id = trips.destination_id
                JOIN take_off_times ON take_off_times.id = trips.take_off_time_id

                WHERE id = ? ",[$id] );
        }
        function delete_trip($id){
            return DB::execute("DELETE FROM trips WHERE id ? ",[$id]);
        }

        function trips_num($id){
            return DB::num_row("SELECT id FROM trips",[$id] );
        }

        function fetch_destination_details($destination_id)
        {
            return DB::fetchAll("SELECT *,trips.id FROM trips
                JOIN buses ON buses.id = trips.bus_id
                JOIN take_off_times ON take_off_times.id = trips.take_off_time_id
                WHERE destination_id = ?
                ",[$destination_id]);
        }

        function fetch_trip_details($destination_id,$bus_id,$take_off_time_id)
        {
            return DB::fetch("SELECT *,trips.id FROM trips WHERE destination_id = ? AND bus_id = ? AND take_off_time_id = ?
                ",[$destination_id,$bus_id,$take_off_time_id]);
        }
    }
?>