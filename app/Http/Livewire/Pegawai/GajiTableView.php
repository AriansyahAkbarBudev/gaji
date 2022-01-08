<?php

namespace App\Http\Livewire\Pegawai;

use App\Filters\CreatedFilter;
use App\Models\GajiPegawai;
use LaravelViews\Views\TableView;

class GajiTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = GajiPegawai::class;
    public $searchBy = ['pegawai.namapegawai'];
    protected $listeners = [
        'createdPegawai' => '$refresh',
    ];


    public function headers(): array
    {
        return [
            'Waktu',
            'Nama Pegawai',
            'Total Di Terima',
        ];
    }

    public function row($model): array
    {
        return [
            date("D/M/Y", strtotime($model->created_at)),
            $model->pegawai->namapegawai,
            $model->totalditerima,
        ];
    }
}
