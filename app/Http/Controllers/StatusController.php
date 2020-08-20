<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Client;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function __invoke($id)
    {
        try {
            $client = Client::findOrFail($id);
            
            if ($client->client_status == 0) 
            {
                $client->client_status = 1;
            }
            else
            {
                $client->client_status = 0;
            }
            $client->save();

            return redirect('Cliente');
        } catch (Throwable $e) {

            report($e);

            return view('Erro', ['e' => $e]);
        }
    }
}
