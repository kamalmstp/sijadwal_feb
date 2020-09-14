<?php

namespace App\Imports;

use App\Jadwalfeb;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; //TAMBAHKAN CODE INI
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
class JadwalImport implements ToModel, WithHeadingRow, WithMultipleSheets // USE CLASS YANG DIIMPORT
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function sheets(): array
    {
        return [
            0 => $this,
        ];
    }

    public function model(array $row)
    {
        return new Jadwalfeb([
            'id_tahunajaran' => $row['id_tahunajaran'],
            'prodi' => $row['prodi'],
            'program' => $row['program'],
            'kode_matkul' => $row['kode_matkul'],
            'nama_matkul' => $row['nama_matkul'],   
            'sks' => $row['sks'], 
            'kelas' => $row['kelas'],
            'semester' => $row['semester'],
            'hari' => $row['hari'],  
            'jam' => $row['jam'],
            'jam_selesai' => $row['jam_selesai'],   
            'ruangan' => $row['ruangan'],
            'dosen1' => $row['dosen1'],
            'dosen2' => $row['dosen2'],
            'dosen3' => $row['dosen3'],
            'dosen4' => $row['dosen4'],
            'dosen5' => $row['dosen5']
        ]);
    }
  
}
