<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prodi;
use App\Berita;
use App\ruangan;
use App\Jadwalguest;
use App\tahun_ajaran;
use App\Jadwalfeb;
use DB;
use App\Mahasiswa;
use App\Organisasi;
use App\Jam;
class GuestController extends Controller
{
    //
    public function index(){
        $berita = Berita::orderBy('created_at', 'desc')->paginate(5);
        $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
        );
        return view('welcome', compact('berita','bulan'));
    }

    public function pengumuman($id){
        $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
        );
        $berita = Berita::where('id_berita', '=' , $id)->first();
        return view('guest.pengumuman', compact('berita','bulan'));
    }

    public function jadwal(){
        date_default_timezone_set('Asia/Jakarta');
        $hari = array ( 1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );
        $tgl=date('d-m-Y');
        $tes = $hari[ date('N') ];

        $prodi = Prodi::orderBy('created_at', 'asc')->get();
        $ruangan = ruangan::orderBy('created_at', 'asc')->get();
        $tahun_ajaran = tahun_ajaran::orderBy('created_at', 'asc')->get();
        $jadwalguest = Jadwalguest::orderBy('created_at', 'asc')->first();
        $data = Jadwalfeb::where('id_tahunajaran', $jadwalguest->id_tahunajaran)->orderBy('hari', 'desc')->get();
        $datark = Jadwalfeb::where('id_tahunajaran', $jadwalguest->id_tahunajaran)->where('hari',$tes)->orderBy('ruangan', 'desc')->distinct()->get(['ruangan']);
        $jam = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = 'PPAK') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");
        $jam11 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = '11') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");   
        $jam12 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = '12') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");     
        $jam13 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = '13') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");      
        $jam14 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = '14') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");    
        $jam15 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = '15') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");   
        $jam16 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = '16') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");     
        $jam17 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = '17') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");   
        $jam18 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = '18') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");      
        $jam2 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = '2') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");  
        $jam3 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = '3') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");  
        $jam4 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = '4') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");  
        $jam5 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = '5') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");    
        $jam6 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = '6') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");  
        $jam7 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = '7') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");     
        $jam8 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = '8') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'"); 
        $jamA = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = 'A') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");     
        $jamAula = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = 'Aula') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");                                  
        $jamGB2 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = 'GB2') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");    
        $jamGB1a = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = 'GB1a') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");      
        $jamGB1b = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = 'GB1b') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");     
        $jamGB3 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = 'GB3') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");  
        $jamLAB = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = 'LAB') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");
        $jamPGC1 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = 'PG C-1') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");
        $jamPGC2 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = 'PG C-2') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");     
        $jamPGC3 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = 'PG C-3') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");   
        $jamPGC4 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = 'PG C-4') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");     
        $jamPGC6 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = 'PG C-6') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");     
        $jamPGC7 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = 'PG C-7') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");     
        $jamPGC8 = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari != 'Jumat' AND hari = '$tes' AND ruangan = 'PG C-8') AND nama_jam != '09:50:00' AND nama_jam != '14:00:00'");                                                        
        $jamjumat = Db::select(
            "SELECT * FROM tb_jam WHERE nama_jam NOT IN (SELECT jam
            FROM jadwalfeb WHERE id_tahunajaran = $jadwalguest->id_tahunajaran AND hari = 'Jumat') AND nama_jam != '10:30:00' AND nama_jam != '13:30:00'");
    	return view('guest.jadwal', compact('prodi','data','datark','hari','tgl','ruangan','tes','jam','jam','jam11','jam12','jam13','jam14','jam15','jam16','jam17','jam18','jam2','jam3','jam4','jam5','jam6','jam7','jam8','jamA','jamAula','jamGB2','jamGB1a','jamGB1b','jamGB3','jamLAB','jamPGC1','jamPGC2','jamPGC3','jamPGC4','jamPGC6','jamPGC7','jamPGC8','jam11','jamjumat','jadwalguest','tahun_ajaran'));
    }

    public function layarfulljadwal(){
        date_default_timezone_set('Asia/Jakarta');
        $hari = array ( 1 =>    'Senin',
              'Selasa',
              'Rabu',
              'Kamis',
              'Jumat',
              'Sabtu',
              'Minggu'
            );
        $tes = $hari[ date('N') ];
        $tgl=date('d-m-Y');
        $tglberita=date('Y-m-d');
        $jadwalguest = Jadwalguest::orderBy('created_at', 'asc')->first();
        $data = Db::select(
              "SELECT * FROM jadwalfeb WHERE hari = '$tes' and id_tahunajaran=$jadwalguest->id_tahunajaran ORDER BY hari, jam, prodi, semester DESC LIMIT 10 OFFSET 0"
        );
        $data2 = Db::select(
              "SELECT * FROM jadwalfeb WHERE hari = '$tes' and id_tahunajaran=$jadwalguest->id_tahunajaran ORDER BY hari, jam, prodi, semester
              LIMIT 10 OFFSET 10"
        );
        $data3 = Db::select(
              "SELECT * FROM jadwalfeb WHERE hari = '$tes' and id_tahunajaran=$jadwalguest->id_tahunajaran ORDER BY hari, jam, prodi, semester LIMIT 10 OFFSET 20"
        );

        $data4 = Db::select(
              "SELECT * FROM jadwalfeb WHERE hari = '$tes' and id_tahunajaran=$jadwalguest->id_tahunajaran ORDER BY hari, jam, prodi, semester LIMIT 10 OFFSET 30"
        );

        $data5 = Db::select(
              "SELECT * FROM jadwalfeb WHERE hari = '$tes' and id_tahunajaran=$jadwalguest->id_tahunajaran ORDER BY hari, jam, prodi, semester LIMIT 10 OFFSET 40"
        );

        $data6 = Db::select(
              "SELECT * FROM jadwalfeb WHERE hari = '$tes' and id_tahunajaran=$jadwalguest->id_tahunajaran ORDER BY hari, jam, prodi, semester LIMIT 10 OFFSET 50"
        );

        $data7 = Db::select(
              "SELECT * FROM jadwalfeb WHERE hari = '$tes' and id_tahunajaran=$jadwalguest->id_tahunajaran ORDER BY hari, jam, prodi, semester LIMIT 10 OFFSET 60"
        );

        $data8 = Db::select(
              "SELECT * FROM jadwalfeb WHERE hari = '$tes' and id_tahunajaran=$jadwalguest->id_tahunajaran ORDER BY hari, jam, prodi, semester
              LIMIT 10 OFFSET 70"
        );

        $jmldata=count($data);
        $jmldata2=count($data2);
        $jmldata3=count($data3);
        $jmldata4=count($data4);
        $jmldata5=count($data5);
        $jmldata6=count($data6);
        $jmldata7=count($data7);
        $jmldata8=count($data8);
    	return view('guest.layarfulljadwal',compact('tgl','tes','hari','data','data2','data3','data4','data5','data6','data7','data8','jmldata','jmldata2','jmldata3','jmldata4','jmldata5','jmldata6','jmldata7','jmldata8'));
    }

    public function layarfullpengumuman(){
        date_default_timezone_set('Asia/Jakarta');
        $hari = array ( 1 =>    'Senin',
              'Selasa',
              'Rabu',
              'Kamis',
              'Jumat',
              'Sabtu',
              'Minggu'
            );
        $tes = $hari[ date('N') ];
        $tgl=date('d-m-Y');
        $tglberita=date('Y-m-d');
        $berita = Db::select("SELECT * FROM berita WHERE '$tglberita' >= dari and '$tglberita' <= sampai ORDER BY isi DESC ");

        $jmlberita = count($berita);

        $berita2 = Db::select("SELECT * FROM berita WHERE dari >= '$tglberita' and '$tglberita' <= sampai LIMIT 5, 10");
        $jmlberita2 = count($berita2);
        $berita3 = Db::select("SELECT * FROM berita WHERE dari >= '$tglberita' and '$tglberita' <= sampai LIMIT 10, 15");
        $jmlberita3 = count($berita3);
        $berita4 = Db::select("SELECT * FROM berita WHERE dari >= '$tglberita' and '$tglberita' <= sampai LIMIT 15, 20");
        $jmlberita4 = count($berita4);
        $berita5 = Db::select("SELECT * FROM berita WHERE dari >= '$tglberita' and '$tglberita' <= sampai LIMIT 20, 25");
        $jmlberita5 = count($berita5);
        $berita6 = Db::select("SELECT * FROM berita WHERE dari >= '$tglberita' and '$tglberita' <= sampai LIMIT 25, 30");
        $jmlberita6 = count($berita6);
    	return view('guest.layarfullpengumuman',compact('tgl','tes','hari','berita','berita2','berita3','berita4','berita5','berita6','jmlberita','jmlberita2','jmlberita3','jmlberita4','jmlberita5','jmlberita6'));
    }

    public function pemesanan_jadwal_ruang_kosong(){
        $mahasiswa = Mahasiswa::orderBy('created_at', 'desc')->get();
        $organisasi = Organisasi::orderBy('created_at', 'desc')->get();
        $ruangan = ruangan::orderBy('created_at', 'asc')->get();
        $jam = Jam::orderBy('created_at', 'asc')->get();
        return view('guest.pemesanan_jadwal_ruang_kosong',compact('mahasiswa','organisasi','ruangan','jam'));
    }

    public function simpanpemesanan_jadwal_ruang_kosong(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
        'asal_organisasi'=>'required',
        'nama_penanggung_jawab'=>'required',
        'kontak'=>'required',
        'email'=>'required',
        'ruangan'=>'required',
        'tanggal'=>'required',
        'dari'=>'required',
        'sampai'=>'required',
        'keterangan'=>'required',
        ]);
        $mahasiswa = Mahasiswa::orderBy('created_at', 'desc')->get();
        foreach($mahasiswa as $mhs){
            if(($request->input('ruangan') == $mhs->ruangan) && ($request->input('tanggal') == $mhs->tanggal) && ($request->input('dari') == $mhs->dari)){
        return redirect('/pemesanan_jadwal_ruang_kosong')->with('flash_message',
             'Gagal Karena Sudah Ada Yang Melakukan Pemesanan Terlebih Dahulu.');
            }
        }
        Mahasiswa::create($input);
        return redirect('/pemesanan_jadwal_ruang_kosong')->with('flash_message',
             'Data Pemesanan Jadwal Ruang Kosong Berhasil Disimpan.');
    }

}
