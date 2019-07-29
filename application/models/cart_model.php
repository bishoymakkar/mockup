<?php
Class Cart_model extends CI_Model{

	function get_user_cart( $user_id )
	{
		$sql = "SELECT cart.id AS cart_id FROM cart WHERE user_id = $user_id AND status = 'pending'";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}

	function get_cart_items( $cart_id )
	{
		$sql = "SELECT object.id AS item_id, object.title AS item_name, object.img AS item_img, object.price AS item_price, cart_items.qty AS item_qty FROM cart_items JOIN object ON object.id = cart_items.item_id WHERE cart_items.cart_id = $cart_id";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}

	function create_cart( $user_id )
	{
		$date = date( 'Y-m-d H:i:s' );
		$sql = "INSERT INTO cart ( user_id, status, modified ) VALUES ( $user_id, 'pending', '$date' )";
		$this->db->query( $sql );
		// GET CART ID ..
		return $this->db->insert_id();
	}

	function remove_cart_item( $cart_id, $item_id )
	{
		$sql = "DELETE FROM cart_items WHERE item_id = $item_id AND cart_id = $cart_id";
		$query = $this->db->query( $sql );
		return TRUE;
	}

	function update_cart_item( $cart_id, $item_id, $qty )
	{
		$sql = "UPDATE cart_items SET qty = $qty WHERE cart_id = $cart_id AND item_id = $item_id";
		$this->db->query( $sql );
		return TRUE;
	}

	function check_cart_item_exists( $cart_id, $item_id )
	{
		$sql = "SELECT * FROM cart_items WHERE item_id = $item_id AND cart_id = $cart_id";
		$query = $this->db->query( $sql );
		return $query->num_rows();
	}

	function add_item_to_cart( $cart_id, $id )
	{
		$date = date( 'Y-m-d H:i:s' );
		$sql = "INSERT INTO cart_items ( cart_id, item_id, qty, status, modified ) VALUES ( $cart_id, $id, 1, 'pending', '$date' )";
		$this->db->query( $sql );
		return TRUE;
	}
}