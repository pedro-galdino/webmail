<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\EmailConfig;
use App\Http\Requests\Validations;
use Auth;

class ConfigController extends Controller
{
    public function enviarConfig(Request $request)
    {
        $request->validate(Validations::enviarConfig());
        $config = EmailConfig::where('user_id', Auth::user()->id);
        $request->cookie();

        if($request->sender_name != Auth::user()->name){
            User::find(Auth::user()->id)->update(['name' => $request->sender_name]);
        }

        if($config->exists()){
            $config->update([
                "driver"       => $request->driver,
                "host"         => $request->host,
                "port"         => $request->port,
                "encryption"   => $request->encryption,
                "user_name"    => Auth::user()->email,
                "password"     => Crypt::encrypt($request->password),
                "sender_name"  => $request->sender_name,
                "sender_email" => Auth::user()->email
            ]);
            return back()->with("success", "Configuração alterada com sucesso.");
        }

        $config = EmailConfig::create([
            "user_id"      => Auth::user()->id,
            "driver"       => $request->driver,
            "host"         => $request->host,
            "port"         => $request->port,
            "encryption"   => $request->encryption,
            "user_name"    => Auth::user()->email,
            "password"     => Crypt::encrypt($request->password),
            "sender_name"  => $request->sender_name,
            "sender_email" => Auth::user()->email
        ]);

        if($config) {
            return back()->with("success", "Configurado com sucesso.");
        }
        return back()->with("error", "Falha ao concluir a configuração.");
    }

    public function configurar()
    {
        $config = EmailConfig::where('user_id', Auth::user()->id)->first();
        $data = [
            'driver'     =>  $config->driver,
            'host'       =>  $config->host,
            'port'       =>  $config->port,
            'encryption' =>  $config->encryption,
            'username'   =>  $config->user_name,
            'password'   =>  Crypt::decrypt($config->password),
            'from'       =>  ['address' => $config->sender_email, 'name' => $config->sender_name]
        ];
        config(['mail' => $data]);
    }
}
