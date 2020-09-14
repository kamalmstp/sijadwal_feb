<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Jadwalfeb;
use App\Jadwalguest;
use App\tahun_ajaran;
Use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
class JadwalExport implements FromView, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function registerEvents(): array
    {
        return [

            AfterSheet::class    => function(AfterSheet $event) {
            $a = DB::table('jadwalfeb')->where('id_tahunajaran', $this->id)->count();
           $b = $a + 4;
                $event->sheet->styleCells(
                    'A4:H'.$b,
                    [
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '000'],
                            ],
                        ]
                    ]
                );
            },
        ];
    }

    public function view(): View
    {
        return view('jadwalfebexcel', [
            'jadwalfeb' => Jadwalfeb::where('id_tahunajaran', $this->id)->orderBy('hari', 'desc')->orderBy('jam', 'asc')->get(),
            'id_tahunajaran' => tahun_ajaran::where('id_tahunajaran', $this->id)->first(),
            'jadwalguest' => Jadwalguest::where('id', 1)->first()   
        ]);
    }
}
