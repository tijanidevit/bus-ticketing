<?php
    include_once 'db.class.php';

    class Users extends DB{

        function register_user($first_name,$last_name,$email,$password){
            return DB::execute("INSERT INTO users(first_name, last_name, email, password) VALUES(?,?,?,?)", [$first_name,$last_name,$email,$password]);
        }
        function fetch_users(){
            return DB::fetchAll("SELECT * FROM users ",[]);
        }
        function fetch_user($email){
            return DB::fetch("SELECT * FROM users WHERE email = ? OR id = ? ",[$email,$email] );
        }
        function update_user($first_name,$username,$email,$address,$id){
            return DB::execute("UPDATE users SET first_name =? ,username =?,email =?,address =? WHERE id = ? ", [$first_name,$username,$email,$address,$id]);
        }
        function update_password($password,$id){
            return DB::execute("UPDATE users SET password =? WHERE id = ? ", [$password,$id]);
        }
        function users_num(){
            return DB::num_row("SELECT id FROM users ", []);
        }
        function check_email($email){
            return DB::num_row("SELECT id FROM users WHERE email = ? ", [$email]);
        }
        function user_login($email,$password){
            if (DB::num_row("SELECT id FROM users WHERE email = ?   AND password = ? ", [$email,$password]) > 0) {
                return true;
            }
            else{
                return false;
            }
        }


        //Fees


        function fetch_user_school_fees($id){
            return DB::fetch("SELECT * FROM users WHERE id = ? OR id = ? ",[$id,$id] );
        }
    }
?>