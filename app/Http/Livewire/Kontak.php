<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kontak as Kontakku;
class Kontak extends Component
{
        public $nama, $keterangan, $kontakId, $search = '';

    public function render()
    {
        $kontak = Kontakku::where('nama', 'like', "%{$this->search}%")
            ->orWhere('keterangan', 'like', "%{$this->search}%")
            ->orderBy('id', 'desc')
            ->get();

        return view('livewire.kontak', ['kontak' => $kontak]);
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        Kontakku::updateOrCreate(
            ['id' => $this->kontakId],
            ['nama' => $this->nama, 'keterangan' => $this->keterangan]
        );

        $msg = $this->kontakId ? 'Kontak berhasil diperbarui!' : 'Kontak berhasil ditambahkan!';

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('swal:success', ['message' => $msg]);
    }

    public function edit($id)
    {
        $kontak = Kontakku::findOrFail($id);
        $this->kontakId = $id;
        $this->nama = $kontak->nama;
        $this->keterangan = $kontak->keterangan;
    }

    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'id' => $id,
            'message' => 'Apakah Anda yakin ingin menghapus data ini?',
        ]);
    }

    public function delete($id)
    {
        Kontakku::find($id)->delete();
        $this->dispatchBrowserEvent('swal:success', ['message' => 'Kontak berhasil dihapus!']);
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->kontakId = null;
        $this->nama = '';
        $this->keterangan = '';
    }
}