<?php

namespace App\Http\Livewire\Pegawai;

use App\Models\Pegawai;
use LaravelViews\Views\TableView;

class PegawaiTableView extends TableView
{

    protected $model = Pegawai::class;
    public $searchBy = ['namapegawai'];
    protected $listeners = [
        'createdPegawai' => '$refresh',
    ];
    public function headers(): array
    {
        return [
            'Nama Pegawai',
            'Gaji Di Terima',
        ];
    }

    public function row($model): array
    {
        $namaDepan = explode(" ", $model->namapegawai);
        return [
            $namaDepan[0],
            $model->totalgaji,
        ];
    }
}
