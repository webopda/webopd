<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PengaduanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pengaduan;

    public function __construct($pengaduan)
    {
        $this->pengaduan = $pengaduan;
    }

    public function build()
    {
        return $this->subject('Terima Kasih atas Pengaduan Anda')
                    ->view('emails.pengaduan');
    }
}
