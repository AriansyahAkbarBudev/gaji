<?php

namespace App\Http\Livewire\Pegawai;

use App\Models\GajiPegawai;
use App\Models\totalgaji;
use App\Models\Pegawai;
use Livewire\Component;
use Illuminate\Support\Str;

class PegawaiLivewire extends Component
{
    public $namapegawai;
    public $totalgaji;

    protected $rules = [

        'namapegawai' => ['required', 'min:3', 'max:10', 'unique:pegawais'],
        'totalgaji' => ['required', 'numeric', 'min:4000000', 'max:10000000'],
    ];

    protected $messages = [
        'namapegawai.required' => 'Nama Tidak Boleh Kosong',
        'namapegawai.min' => 'Minimal Nama pegawai 3 Huruf termasuk spasi dan simbol',
        'namapegawai.max' => 'Maksimal Nama Pegawai 10 Huruf termasuk spasi dan simbol',
        'totalgaji.required' => 'Gaji Tidak Boleh Kosong',
        'totalgaji.numeric' => 'Inputan Harus Angka',
        'totalgaji.min' => 'Minimal Gaji 4.000.000',
        'totalgaji.max' => 'Maksimal Gaji 10.000.000',
    ];

    protected function clearAll()
    {
        $this->namapegawai = '';
        $this->totalgaji = '';
    }


    public function createPegawai()
    {
        $validatedData = $this->validate();
        $validatedData['namapegawai'] = Str::upper($this->namapegawai);

        $createPegawai = Pegawai::insertGetId($validatedData);
        $arrayGaji = [
            'pegawai_id' => $createPegawai,
            'totalditerima' => $validatedData['totalgaji'],
            'created_at' => now(),
            'updated_at' => now(),
        ];
        GajiPegawai::create($arrayGaji);
        $this->clearAll();
        $this->emit('createdPegawai');
        return session()->flash('message', 'Data Berhasil Di Simpan.');
    }

    public function render()
    {
        return view('livewire.pegawai.pegawai-livewire');
    }
}
