<?php

namespace App\Imports;

use App\Models\Worker;
use Maatwebsite\Excel\Concerns\ToModel;

class WorkerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Worker([
            'nama' => $row[1],
            'nip' => $row[2], 
            'bidang' => $row[3],
            'jabatan' => $row[4],
            'golongan' => $row[5],
        ]);
    }
}
