<?php
class Orders extends CI_Model {

        public function get_orders($start, $count)
        {
                $query = $this->db->limit($count, $start)->get('orders');
                return $query;
        }

        public function insert($data)
        {
                $data['status'] = "new";
                $data['unit_price'] = "5";
                $data['total_price'] = $data['unit_price'] * $data['quantity'];
                $this->db->insert('orders', $data);
        }

        public function total_orders()
        {
                return $this->db->count_all('orders');
        }

        public function send_order($id)
        {
                $data['status'] = "sent";
                $this->db->update('orders', $data, array('id' => (int)$id));
        }

        public function delete_order($id)
        {
                $this->db->delete('orders', array('id' => (int)$id));    
        }
}
?>