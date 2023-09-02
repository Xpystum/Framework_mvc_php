<?php 
	require_once("app/core/Model.php");
	
	//helper
	require_once("app/Helpers/dd.php");

	class OrderHistoryModel extends Model{

		public function selectOrderHistory($order_id){

            $sql = "SELECT 
            payment_details.amount as pay_amount,
            payment_details.date,

            status.name as `status`,

            orders.id as id_orders,
            user_id,

			order_products.quantity as count,
			order_products.total as total_product,
            order_products.price as general_price,


			products.name,
			products.img,
			products.price as product_price,
			products.old_price as old_product_price


       	 	FROM orders INNER JOIN order_products ON orders.id = order_products.order_id
            INNER JOIN products ON order_products.product_id = products.id
            INNER JOIN payment_details ON payment_details.order_id = orders.id
            INNER JOIN `status` ON status.id = payment_details.status_id
        	WHERE orders.id = $order_id";

            $data = $this->getMultyData($sql);
            return $data;

        }

    }
			