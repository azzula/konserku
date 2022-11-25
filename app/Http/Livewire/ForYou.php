<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ticket;

class ForYou extends Component
{
    public $buy_id, $nama, $jenis_kelamin, $phone, $code, $tanggal_lahir;

    // modal
    public $confirmingBuy = false;

    // identitas page
    public $identity = 'foryou';

    public function render()
    {
        $tiket = Ticket::get();
        return view('livewire.for-you', ['tiket' => $tiket]);
    }

    public function confirmBuy() 
    {
        $this->resetBuyForm();
        $this->confirmingBuy = true;
    }

    private function resetBuyForm()
    {
        // $this->id_konser       = $id;
        $this->buy_id          = null;
        $this->nama            = null;
        $this->jenis_kelamin   = null;
        $this->phone           = null;
        $this->code            = null;
        $this->tanggal_lahir   = null;
    }

    public function storeBuy()
    {
        try
        {
            $this->validate([
                'nama'               => 'required',
                'jenis_kelamin'      => 'required',
                'phone'              => 'required',
                'tanggal_lahir'      => 'required',
            ]);
            
            Visitor::create([
                'nama'             => $this->nama,
                'jenis_kelamin'    => $this->jenis_kelamin,
                'phone'            => $this->phone,
                'code'             => rand(1111111111,9999999999),
                'tanggal_lahir'    => $this->tanggal_lahir,
                'kehadiran'        => 'th',
            ]);

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Tiket berhasil dibuat."
            ]);

            $this->resetBuyForm();
            $this->confirmingBuy = false;
            return redirect()->route('foryou');
        }
        
        catch(\Exception $e)
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Tiket gagal dibuat."
            ]);

            $this->resetBuyForm();
            $this->confirmingBuy = false;
            return redirect()->route('foryou');
        }
    }
}
