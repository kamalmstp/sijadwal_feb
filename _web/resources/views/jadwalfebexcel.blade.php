<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Export Laporan Excel Pada Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
 
    <div class="container">
        <table class='table table-bordered' >
            <thead>
                <tr >
                    <th colspan="9" style="text-align: center; font-family: arial; font-size: 10px; font-weight: bold; ; ">
                    JADWAL KULIAH SEMESTER {{$id_tahunajaran->semester}} TAHUN  AJARAN {{$id_tahunajaran->tahun_ajaran}} PROGRAM S1 REGULER FAKULTAS EKONOMI DAN BISNIS ULM
                    </th>
                </tr>
                <tr >
                    <th colspan="9" style="text-align: center; font-family: arial; font-size: 10px; font-weight: bold;">
                     BERLAKU MULAI {{$jadwalguest->tgl_berlaku}}
                    </th>
                </tr>
                <tr style="text-align: center; font-family: arial; font-size: 10px;">
                    <td colspan="9"></td>
                </tr>  
                   
                <tr>
                    <th style="width:10px; text-align:center; font-weight:bold;">Hari</th>
                    <th style="width:20px; text-align:center; font-weight:bold;">Jam</th>
                    <th style="width:45px; text-align:center; font-weight:bold;">Mata Kuliah</th>
                    <th style="width:7px; text-align:center; font-weight:bold;">Kelas</th>
                    <th style="width:5px; text-align:center; font-weight:bold;">Sks</th>
                    <th style="width:7px; text-align:center; font-weight:bold;">Ruang</th>
                    <th style="width:25px; text-align:center; font-weight:bold;">PRODI</th>
                    <th style="width:13px; text-align:center; font-weight:bold;">Semester</th> 
                </tr>                              
            </thead>
            <tbody>
                @foreach ($jadwalfeb as $rows)
                <tr>
                    <td style="text-align:center;">{{$rows->hari}}</td>
                    <td style="text-align:left;">{{$rows->jam}} - {{$rows->jam_selesai}}</td>
                    <td style="text-align:left;">{{$rows->nama_matkul}}</td>
                    <td style="text-align:left;">{{$rows->kelas}}</td>
                    <td style="text-align:left;">{{$rows->sks}}</td>
                    <td style="text-align:left;">{{$rows->ruangan}}</td>
                    <td style="text-align:left;">{{$rows->prodi}} - {{$rows->program}}</td>
                    <td style="text-align:left;">{{$rows->semester}}</td>                            
                </tr>
                @endforeach


                <tr style="text-align: center; font-family: arial; font-size: 10px;">
                    <td colspan="9"></td>
                </tr> 

                <tr style="text-align: center; font-family: arial; font-size: 10px;">
                    <td colspan="6">KETERANGAN:</td>
                    <td colspan="2">{{$jadwalguest->tgl_ttd}}</td>
                </tr>       

                <tr style="text-align: center; font-family: arial; font-size: 10px;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td> 
                    <td colspan="2">Dekan,</td>                   
                </tr>    

                <tr style="text-align: center; font-family: arial; font-size: 10px;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>ub.  Wakil Dekan Bidang Akademik</td>
                </tr>  

                <tr style="text-align: center; font-family: arial; font-size: 10px;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>   
                    <td></td>
                    <td></td>                      
                </tr>   
                
                <tr style="text-align: center; font-family: arial; font-size: 10px;">
                    <td colspan="2"></td>                 
                </tr>

                <tr style="text-align: center; font-family: arial; font-size: 10px;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$jadwalguest->dekan}}</td>
                </tr>                                                                      
                <tr style="text-align: center; font-family: arial; font-size: 10px;">
                    <td colspan="1">dst</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="2">NIP. {{$jadwalguest->nip_dekan}}</td>
                </tr>

                <tr style="text-align: center; font-family: arial; font-size: 10px;">

                </tr>

                <tr style="text-align: center; font-family: arial; font-size: 10px;">
                    <td colspan="1"></td>
                </tr>                

            </tbody>
        </table>
    </div>
 
</body>
</html>