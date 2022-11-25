<?php

namespace App\Http\Livewire;

// use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Illuminate\Support\Facades\Storage;

class Tiket extends LivewireDatatable
{
    use WithFileUploads;

    public $konser_id, $nama, $penyanyi, $tempat, $tanggal, $harga, $gambar, $file;

    // modal
    public $confirmingAdd = false;
    public $confirmingEdit = false;

    // identitas page
    public $identity = 'tiket';

    // datatable livewire
    public function builder()
    {
        return Ticket::latest();
    }

    public function columns()
    {
        return [
            Column::name('id')
                ->label('ID Konser')
                ->alignCenter(),

            // laporan

            Column::name('nama')
                ->label('Nama Konser')
                ->unsortable()
                ->alignCenter()
                ->searchable()
                ->editable(),

            Column::name('penyanyi')
                ->label('Penyanyi')
                ->unsortable()
                ->alignCenter()
                ->searchable()
                ->editable(),

            Column::name('tempat')
                ->label('Tempat Konser')
                ->unsortable()
                ->alignCenter()
                ->filterable()
                ->editable(),

            DateColumn::name('tanggal')
                ->label('Tanggal Konser')
                ->unsortable()
                ->alignCenter()
                ->filterable()
                ->editable(),

            Column::name('harga')
                ->label('Harga Konser')
                ->unsortable()
                ->alignCenter()
                ->editable(),

            Column::name('gambar')
                ->label('Gambar')
                ->view('livewire.components.gambar')
                ->unsortable()
                ->alignCenter(),

            Column::callback(['id', 'nama'], function ($id, $nama) {
                    return view('table-actions', ['id' => $id, 'nama' => $nama]);
                })->unsortable()
        ];
    }
    
    public function confirmAdd() 
    {
        $this->resetCreateForm();
        $this->confirmingAdd = true;
    }

    private function resetCreateForm()
    {
        $this->konser_id        = null;
        $this->nama             = null;
        $this->penyanyi         = null;
        $this->tempat           = null;
        $this->tanggal          = null;
        $this->harga            = null;
        $this->file             = null;
    }

    public function storeKonser()
    {
        try
        {
            $this->validate([
                'nama'                  => 'required',
                'penyanyi'              => 'required',
                'tempat'                => 'required',
                'tanggal'               => 'required',
                'harga'                 => 'required',
                'file'                  => 'required|file|mimes:jpg,jpeg,png|max:2048',
            ]);

            $path = $this->file->store('images', 'public');
            $this->file->delete();
            
            Ticket::create([
                'nama'        => $this->nama,
                'penyanyi'    => $this->penyanyi,
                'tempat'      => $this->tempat,
                'tanggal'     => $this->tanggal,
                'harga'       => $this->harga,
                'gambar'      => $path,
            ]);

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Konser berhasil dibuat."
            ]);

            $this->resetCreateForm();
            $this->confirmingAdd = false;
            return redirect()->route('tiket');
        }
        
        catch(\Exception $e)
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Konser gagal dibuat."
            ]);

            $this->resetCreateForm();
            $this->confirmingAdd = false;
            return redirect()->route('tiket');
        }
    }
}
