<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Auth;

class ValidateMessages {

    public static function messages(){
        return [
            'mimes' => ':attribute tipe yang diterima: :values',
            'max' => 'Ukuran maksimal :attribute 2 Mb',
            'required' => ':attribute tidak boleh kosong'
        ];
    }
}

?>