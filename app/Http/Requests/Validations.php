<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Validations extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public static function cadastrar()
    {
        return [
            'name'    => 'required|min:2|max:12',
            'email'    => 'required|unique:users,email|email:rfc,dns',
            'password' => 'required|min:6|max:12'
        ];
    }

    public static function enviarEmail()
    {
        return [
            'recipient' => 'required|email:rfc,dns',
            'subject'   => 'required',
            'body'      => 'required',
        ];
    }

    public static function enviarConfig()
    {
        return [
            'driver'      => 'required|max:4|in:SMTP,smtp,IMAP,imap,POP,pop',
            'host'        => 'required',
            'port'        => 'required|numeric',
            'encryption'  => 'required|in:TLS,tls,SSL,ssl',
            'password'    => 'required',
            'sender_name' => 'required|max:12',
        ];
    }
}
