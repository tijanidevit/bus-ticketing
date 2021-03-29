<?php
    include_once 'db.class.php';

    class Payments extends DB{

        function add_payment($student_id,$payment_type_id,$amount_paid,$reference_no){
            return DB::execute("INSERT INTO payments(student_id,payment_type_id,amount_paid,reference_no) VALUES(?,?,?,?)", [$student_id,$payment_type_id,$amount_paid,$reference_no]);
        }
        function fetch_payments(){
            return DB::fetchAll("SELECT *,payments.id FROM payments
                JOIN students ON students.id = payments.student_id
                JOIN payment_types ON payment_types.id = payments.payment_type_id
                ORDER BY payments.id DESC",[]);
        }
        function fetch_student_payments($student_id){
            return DB::fetchAll("SELECT *, payments.id FROM payments 
                JOIN payment_types ON payment_types.id = payments.payment_type_id
                JOIN students ON students.id = payments.student_id
                JOIN departments ON departments.id = students.department_id
                WHERE payments.student_id = ? 
                ORDER BY payments.id DESC ",[$student_id]);
        }
        function fetch_student_last_payment($student_id){
            return DB::fetch("SELECT * FROM payments WHERE student_id = ? ORDER BY id DESC ",[$student_id]);
        }
        function fetch_payment($id){
            return DB::fetch("SELECT * FROM payments
                JOIN students ON students.id = payments.student_id
                JOIN payment_types ON payment_types.id = payments.payment_type_id
                WHERE payments.id = ? ",[$id] );
        }
        function update_payment($payment_type_id,$amount_paid,$id){
            return DB::execute("UPDATE payments SET payment_type_id =?,amount_paid =? WHERE id = ? ", [$payment_type_id,$amount_paid,$id]);
        }
        function update_payment_status($status,$id){
            return DB::execute("UPDATE payments SET status =? WHERE id = ? ", [$status,$id]);
        }
        function delete_payment($id){
            return DB::execute("DELETE FROM payments WHERE id = ? ",[$id]);
        }


        //Payment Types

        function fetch_payment_types(){
            return DB::fetchAll("SELECT * FROM payment_types ORDER BY id",[]);
        }
    }
?>