<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Email;
use App\Models\EmailConfig;
use Auth;

class HomeController extends Controller
{
    public function principal()
    {
        $enviados = Email::where('sender', Auth::user()->email)->orderByDesc('created_at')->get();
        $recebidos = Email::where('recipient', Auth::user()->email)->orderByDesc('created_at')->get();
        return view('principal', ['enviados' => $enviados, 'recebidos' => $recebidos]);
    }

    public function mensagem($id)
    {
        $email = Email::find(Crypt::decrypt($id));
        if($email->sender == Auth::user()->email || $email->sender_readed == 0)
        $email->sender_readed = 1;
        if($email->recipient == Auth::user()->email || $email->recipient_readed == 0)
        $email->recipient_readed = 1;
        $email->save();
        return view('mensagem', ['email' => $email]);
    }

    public function config()
    {
        $config = EmailConfig::where('user_id', Auth::user()->id)->first();
        return view('config', ['config' => $config]);
    }
}
