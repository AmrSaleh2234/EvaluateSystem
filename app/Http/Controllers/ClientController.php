<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Motion;

class ClientController extends Controller
{

    public static function getall($img)
    {
        $id =auth()->user()->id;
        $response = Http::post('http://127.0.0.1:105/verifyImage', [
            'data' => $img,
            'uid'=>"$id",

        ]);
        return $response;

    }
}
