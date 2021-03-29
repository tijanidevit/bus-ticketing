<?php
    include_once 'db.class.php';

    class Bookings extends DB{

        function add_booking($user_id,$destination_id,$take_off_time_id,$bus_id,$traveling_date,$booked_seats,$amount){
            return DB::execute("INSERT INTO bookings(user_id,destination_id,take_off_time_id,bus_id,traveling_date,booked_seats,amount) VALUES(?,?,?,?,?,?,?)", [$user_id,$destination_id,$take_off_time_id,$bus_id,$traveling_date,$booked_seats,$amount]);
        }

        function check_booked_seats($destination_id,$take_off_time_id,$bus_id,$traveling_date){
            return DB::fetch("SELECT sum(booked_seats) FROM bookings WHERE destination_id = ? AND take_off_time_id = ? AND bus_id = ? AND traveling_date = ?", [$destination_id,$take_off_time_id,$bus_id,$traveling_date]);
        }

        function user_last_booking($user_id){
            return DB::fetch("SELECT * FROM bookings WHERE user_id = ? ORDER BY id DESC LIMIT 1 ", [$user_id]);
        }

        function fetch_limited_active_bookings($limit){
            $today = date('Y-m-d');
            return DB::fetchAll("SELECT * FROM bookings 
                JOIN users ON users.id = bookings.user_id
                JOIN buses ON buses.id = bookings.bus_id
                JOIN destinations ON destinations.id = bookings.bus_id
                JOIN take_off_times ON take_off_times.id = bookings.bus_id
                WHERE traveling_date <= ? LIMIT  $limit ",[$today]);
        }

        function fetch_active_user_bookings($user_id){
            $today = date('y-m-d');
            return DB::fetchAll("SELECT * FROM bookings 
                JOIN buses ON buses.id = bookings.bus_id
                JOIN destinations ON destinations.id = bookings.bus_id
                JOIN take_off_times ON take_off_times.id = bookings.bus_id
                WHERE user_id = ? AND traveling_date <= ? ",[$user_id,$today]);
        }
        
        function fetch_inactive_user_bookings($user_id){
            $today = date('y-m-d');
            return DB::fetchAll("SELECT * FROM bookings 
                JOIN buses ON buses.id = bookings.bus_id
                JOIN destinations ON destinations.id = bookings.bus_id
                JOIN take_off_times ON take_off_times.id = bookings.bus_id
                WHERE user_id = ? AND traveling_date >= ? ",[$user_id,$today]);
        }

        function fetch_bookings(){
            return DB::fetch("SELECT *,bookings.id FROM bookings 
                JOIN buses ON buses.id = bookings.bus_id
                JOIN users ON users.id = bookings.user_id
                JOIN take_off_times ON take_off_times.id = bookings.bus_id
                JOIN destinations ON destinations.id = bookings.bus_id ",[]);
        }

        function fetch_booking($id){
            return DB::fetch("SELECT *,bookings.id FROM bookings 
                JOIN buses ON buses.id = bookings.bus_id
                JOIN users ON users.id = bookings.user_id
                JOIN take_off_times ON take_off_times.id = bookings.bus_id
                JOIN destinations ON destinations.id = bookings.bus_id
                WHERE bookings.id = ? ",[$id]);
        }

        

        function bookings_num(){
            return DB::num_row("SELECT id FROM bookings ",[]);
        }

        

    }
?>