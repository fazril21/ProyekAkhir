<?php
namespace App\Models;
use CodeIgniter\Model;

class Diagnosis extends Model
{
    protected $table            = 'diagnosis';
    protected $allowedFields    = ['usia','gender','kecamatan','penyakit'];

    public function sumDiagnosis()
    {
        return $this->selectSum('kecamatan')->first();
    }

    // public function get_data_count($keyword) {
    //     $this->db->like('kecamatan', $keyword); // Ganti 'nama_kolom' dengan nama kolom Anda
    //     return $this->db->count_al();
    // }
}
