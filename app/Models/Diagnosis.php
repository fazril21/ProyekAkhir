<?php
namespace App\Models;
use CodeIgniter\Model;

class Diagnosis extends Model
{
    protected $table            = 'diagnosis';
    protected $allowedFields    = ['usia','gender','kecamatan','penyakit'];

}
