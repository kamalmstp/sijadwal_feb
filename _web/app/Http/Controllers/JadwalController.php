<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tahun_ajaran;
use App\Matkul;
use App\Jadwal;
use App\Jadwalfeb;
use App\Ruangan;
use App\Dosen;
use App\Prodi;
use App\List_history;
use App\Hari;
use App\Jam;
use DB;
use Excel;
use App\Imports\JadwalImport;
use App\Exports\JadwalExport;
use App\Exports\JadwalExportGanjil;
class JadwalController extends Controller
{   

    public function kelolajadwal_tahunajaran()
    {
        $tahun_ajaran = tahun_ajaran::orderBy('created_at', 'asc')->get(); 
        return view('akademik_jadwal.tahun_ajaran', compact('tahun_ajaran'));
    }

    public function kelolajadwal_import()
    {
      return view('akademik_jadwal.import');
    }

    public function storeDatajadwal(Request $request)
    {
        //VALIDASI
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new JadwalImport, $file); //IMPORT FILE 
    $kul = $request->input('nama_matkul');
    $har = $request->input('hari');
    $jm = $request->input('jam');
    $rg = $request->input('ruangan');
    $time = date('H:i');
    $list_history = DB::table('list_history')->insert([
        ['keterangan' => 'Berhasil mengimport data jadwal menggunakan excel', 'waktu' => $time]       
    ]);             
            return redirect()->back()->with(['success' => 'Upload success']);
        }  
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }

    public function kelolajadwal_export($id)
    {
        $id = $id;
        $jadwalfeb = Jadwalfeb::where('id_tahunajaran', $id)->get(); 

        return View('jadwalfeb', compact('jadwalfeb','id'));
    }
 
    public function kelolajadwal_exportsimpan($id)
    {
        $jadwalfeb = tahun_ajaran::where('id_tahunajaran', $id)->first();

        if($jadwalfeb->semester == "GENAP") {
        return Excel::download(new JadwalExport($id), 'jadwalfeb.xlsx');
        }
        else{
        return Excel::download(new JadwalExportGanjil($id), 'jadwalfeb.xlsx');
        }
    }

    public function kelolajadwal(Request $request)
    {
        $input = $request->all();
        $th= $input['id_tahunajaran'];
        $tahun_ajaran = tahun_ajaran::where('id_tahunajaran', $th)->get();    
        $data = Jadwalfeb::where('id_tahunajaran', $th)->get(); 

        return View('akademik_jadwal.kelolajadwal', compact('data','th'));
    }

    public function kelolajadwal2($id_jadwal)
    {
        $th= $id_jadwal;
        $tahun_ajaran = tahun_ajaran::where('id_tahunajaran', $th)->get();    
        $data = Jadwalfeb::where('id_tahunajaran', $th)->get(); 

        return View('akademik_jadwal.kelolajadwal2', compact('data','th'));
    }
    public function tambahkelolajadwal(Request $request)
    {
        $input = $request->all();
        //cara 1

        $th= $request->input('id_tahunajaran');

        $hari = Hari::orderBy('created_at', 'asc')->get();
        $jam = Jam::orderBy('created_at', 'asc')->get();             
        return View('akademik_jadwal.tambahkelolajadwal', compact('hari','jam','th'));
    }

  public function simpankelolajadwal(Request $request)
  {
    $input = $request->all();
    $th = $request->input('id_tahunajaran');

    $validator  = $request->validate([
      'prodi'=>'required',
      'program'=>'required',
      'kode_matkul'=>'required',
      'nama_matkul'=>'required',
      'sks'=>'required',
      'kelas'=>'required',
      'semester'=>'required',
      'hari'=>'required',
      'jam'=>'required',
      'jam_selesai'=>'required',
      'ruangan'=>'required',
      'jumlah_mahasiswa'=>'required',
      'dosen1'=>'required'
    ]);       
    
    $data = Jadwalfeb::where('id_tahunajaran', $th)->get();
    foreach ($data as $dt)
    {
        if(($dt->ruangan == $request->input('ruangan')) and ($dt->jam == $request->input('jam')) and ($dt->hari == $request->input('hari')))
        {
        return redirect()->route('kelolajadwal2',$th)
        ->with('flash_message','Ruangan Tidak Tersedia. GAGAL!!!');
        }
    }
    jadwalfeb::create($input);
    $kul = $request->input('nama_matkul');
    $har = $request->input('hari');
    $jm = $request->input('jam');
    $rg = $request->input('ruangan');
    $time = date('H:i');
    $list_history = DB::table('list_history')->insert([
        ['keterangan' => 'Berhasil menambah data jadwal untuk Mata Kuliah: '.$kul.', Hari: '.$har.', Jam: '.$jm.' Ruangan: '.$rg, 'waktu' => $time]       
    ]); 
    return redirect()->route('kelolajadwal2',$th)
      ->with('flash_message','Data Jadwal Berhasil Disimpan.');

  }

    public function editkelolajadwal($id_jadwal)
    {
        $data = jadwalfeb::where('id', $id_jadwal)->first();
        $th = $data->id_tahunajaran;
        $hari = Hari::orderBy('created_at', 'asc')->get();
        $jam = Jam::orderBy('created_at', 'asc')->get();          
        return View('akademik_jadwal.editkelolajadwal', compact('data','hari','jam','th'));
    }

    public function updatekelolajadwal(Request $request, $id_jadwal)
    {
    $jadwal = jadwalfeb::find($id_jadwal);
    $th = $jadwal->id_tahunajaran;
    $input = $request->all();
    $validator  = $request->validate([
      'prodi'=>'required',
      'program'=>'required',
      'kode_matkul'=>'required',
      'nama_matkul'=>'required',
      'sks'=>'required',
      'kelas'=>'required',
      'semester'=>'required',
      'hari'=>'required',
      'jam'=>'required',
      'jam_selesai'=>'required',
      'ruangan'=>'required',
      'jumlah_mahasiswa'=>'required',
      'dosen1'=>'required'
    ]); 

    $data = Jadwalfeb::where('id_tahunajaran', $th)->get();
    foreach ($data as $dt)
    {
        if(($dt->ruangan == $request->input('ruangan')) and ($dt->jam == $request->input('jam')) and ($dt->hari == $request->input('hari')) and ($dt->id != $id_jadwal))
        {
        return redirect()->route('kelolajadwal2',$th)
        ->with('flash_message','Ruangan Tidak Tersedia. GAGAL!!!');
        }
    }

    $jadwal->update($input);  
    $kul = $request->input('nama_matkul');
    $har = $request->input('hari');
    $jm = $request->input('jam');
    $rg = $request->input('ruangan');
    $time = date('H:i');
    $list_history = DB::table('list_history')->insert([
        ['keterangan' => 'Berhasil mengubah data jadwal untuk Mata Kuliah: '.$kul.', Hari: '.$har.', Jam: '.$jm.' Ruangan: '.$rg, 'waktu' => $time]       
    ]); 
    return redirect()->route('kelolajadwal2',$jadwal->id_tahunajaran)->with('flash_message','Data Berhasil Diubah.');  

    }

    public function deletekelolajadwal(Request $request, $id_jadwal)
    {
        $input = $request->all(); 
        $jadwal = jadwalfeb::find($id_jadwal);    
        $th = $jadwal->id_tahunajaran; 

    $kul = $jadwal->nama_matkul;
    $har = $jadwal->hari;
    $jm = $jadwal->jam;
    $rg = $jadwal->ruangan;
    $time = date('H:i');
    $list_history = DB::table('list_history')->insert([
        ['keterangan' => 'Berhasil menghapus data jadwal untuk Mata Kuliah: '.$kul.', Hari: '.$har.', Jam: '.$jm.' Ruangan: '.$rg, 'waktu' => $time]       
    ]); 

        $jadwal->delete();  

    	return redirect()->route('kelolajadwal2',$th)->with('flash_message','Data Berhasil Dihapus.');
    } 


    public function deletekelolajadwalsemua(Request $request, $id)
    {
        $input = $request->all(); 

        $tahun_ajarans = tahun_ajaran::where('id_tahunajaran', $id)->first(); 

        $kul = $tahun_ajarans->tahun_ajaran;
        $har = $tahun_ajarans->semester;
               
        $list_history = DB::table('list_history')->insert([
        ['keterangan' => 'Berhasil menghapus data jadwal untuk tahun ajaran: '.$kul.', Semester: '.$har]       
        ]); 
        $jadwal = Jadwalfeb::WHERE('id_tahunajaran', $id)->get()->each->delete();

    	return redirect()->route('kelolajadwal2',$id)->with('flash_message','Data Berhasil Dihapus.');
    }

    public function gagalkelolajadwal(Request $request)
    {
        $input = $request->all();
        //cara 1

        $th= $input['id_tahunajaran'];
        dd($th);
        return View('akademik_jadwal.gagaljadwal', compact('th'));
    }    

    public function gagalkelolajadwal2(Request $request)
    {
        $input = $request->all();
        //cara 1

        $th= $input['id_tahunajaran'];

        return View('akademik_jadwal.gagaljadwal2', compact('th'));
    }   

    // akhir kelolajadwal

    // mulai hasiljadwal
    public function hasiljadwal_tahunajaran()
    {
        $tahun_ajaran = tahun_ajaran::orderBy('created_at', 'asc')->get(); 
        return view('akademik_jadwal.hasiljadwal_tahun_ajaran', compact('tahun_ajaran'));
    }


    public function hasiljadwal(Request $request){
    $input = $request->all();
    $th= $input['id_tahunajaran'];
    $tahun_ajaran = tahun_ajaran::where('id_tahunajaran', $th)->get();    
    $data = Jadwalfeb::where('id_tahunajaran', $th)->get(); 

    return view('akademik_jadwal.hasiljadwal', compact('th','tahun_ajaran','data'));
    }    
    // akhir hasiljadwal 
}
