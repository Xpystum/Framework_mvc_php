<?php 
	require_once("app/core/Model.php");
	
	//helper
	require_once("app/Helpers/dd.php");

	class OrdersModel extends Model{

		public function selectPayment($order_id, $user_id = null){

            if($user_id == null){

                $sql = "SELECT 
                    payment_details.amount,
                    payment_details.date,

                    status.name

                FROM `status` INNER JOIN `payment_details` ON status.id = payment_details.status_id
                WHERE payment_details.order_id = ".$order_id;


            }else{

                $sql = "SELECT 
                payment_details.amount,
                payment_details.date,
                status.name

                FROM `status` INNER JOIN `payment_details` ON status.id = payment_details.status_id
                INNER JOIN orders ON orders.id = payment_details.order_id
                WHERE orders.user_id = ".$user_id;

            }
            

        }

    }
		