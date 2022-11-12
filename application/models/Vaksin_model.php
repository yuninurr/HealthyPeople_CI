<?php

class Vaksin_model extends CI_model
{
    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function destroy_vaksin($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function ambil_id_vaksin($id)
    {
        $hasil = $this->db->where('id_vaksin', $id)->get('vaksin');
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return false;
        }
    }
    public function getAllVaksin()
    {
        return $query = $this->db->get('vaksin')->result_array();
    }
}
