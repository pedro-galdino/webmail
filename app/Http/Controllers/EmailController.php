<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;
use App\Mail\EnviarEmail;
use App\Http\Requests\Validations;
use Auth;

class EmailController extends Controller
{
    public function enviarEmail(Request $request)
    {
        $request->validate(Validations::enviarEmail());
        $request->cookie();

        if($request->checkbox){
            try{(
                new ConfigController)->configurar();
                \Mail::to($request->recipient)->send(new EnviarEmail($request->only('subject','body')));
            }catch (\Exception $e){
                return back()->with("error", "Falha na autenticação do e-mail. Confira as configurações de envio ou libere o acesso para apps menos seguros no seu e-mail.");
            }
        }
        $request['sender_name'] = Auth::user()->name;
        $request['sender'] = Auth::user()->email;
        $request['sender_guarded'] = Auth::user()->email;
        if($request['recipient'] != Auth::user()->email)
        $request['sender_readed'] = 1;

        Email::create($request->except('checkbox'));
        return back()->with("success", "E-mail enviado com sucesso.");;
    }

    public function excluirEmail($id)
    {
        $email = Email::find($id);
        if(($email->sender == $email->recipient)
        || ($email->sender == Auth::user()->email && $email->recipient == null)
        || ($email->recipient == Auth::user()->email && $email->sender == null)){
            $email->delete();
        }
        else if($email->sender == Auth::user()->email && $email->recipient != null){
            $email->sender = null;
            $email->save();
        }
        else{
            $email->recipient = null;
            $email->save();
        }
        if(request()->is('principal')) return back();
        else return redirect('/principal');
    }

    public function lerEmail($id)
    {
        $email = Email::find($id);
        if($email->sender == $email->recipient){
            $email->sender_readed == 0 ? $email->sender_readed = 1 : $email->sender_readed = 0;
            $email->sender_readed = $email->recipient_readed;
        }
        if($email->sender == Auth::user()->email)
        $email->sender_readed == 0 ? $email->sender_readed = 1 : $email->sender_readed = 0;

        if($email->recipient == Auth::user()->email)
        $email->recipient_readed == 0 ? $email->recipient_readed = 1 : $email->recipient_readed = 0;

        $email->save();
        if(request()->is('principal')) return back();
        else return redirect('/principal');
    }
}
