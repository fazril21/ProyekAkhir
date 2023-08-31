<?php

namespace App\Controllers;

use App\Models\Diagnosis; // Ganti YourModel dengan nama model Anda
use CodeIgniter\Controller;


class Import extends BaseController
{

    public function index()
    {
        return view('Dataset/Contoh'); // Ganti 'import_form' dengan nama view formulir Anda
    }

    public function processImport()
    {
        $input = $this->validate([
            'file' => 'uploaded[file]|ext_in[file,csv],'
        ]);
        if (!$input) {
            $data['validation'] = $this->validator;
            return view('Dataset/Contoh', $data);
        } else {
            if ($file = $this->request->getFile('file')) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move('../public/csvfile', $newName);
                    $file = fopen("../public/csvfile/" . $newName, "r");
                    $i = 0;
                    $numberOfFields = 4;
                    $csvArr = array();

                    while (($filedata = fgetcsv($file, 4000, ",")) !== FALSE) {
                        $num = count($filedata);
                        if ($i > 0 && $num == $numberOfFields) {
                            $csvArr[$i]['usia'] = $filedata[0];
                            $csvArr[$i]['gender'] = $filedata[1];
                            $csvArr[$i]['kecamatan'] = $filedata[2];
                            $csvArr[$i]['penyakit'] = $filedata[3];
                        }
                        $i++;
                    }
                    fclose($file);
                    $count = 0;
                    foreach($csvArr as $userdata){
                        $students = new Diagnosis();
                        $findRecord = $students->where('usia', $userdata['usia'])->countAllResults();
                        if($findRecord == 0){
                            if($students->insert($userdata)){
                                $count++;
                            }
                        }
                    }
                }
            }
        }
    }
}
