<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Client;
use App\Models\Email;
use App\Models\Telephone;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\TelephoneRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $client_filter = $request->query('client_filter', '');

            $client_search = $request->query('client_search', '');

            $clients = Client::where('client_status', 'like', '%' . $client_filter . '%')
            ->where(function ($query) use ($client_search) {
                $query->where('client_name', 'like', '%' . $client_search . '%');})
                ->paginate('10');

            return view(
                'Cliente.Cliente_Indice',
                [
                    'clients' => $clients,
                    'client_filter' => $client_filter,
                    'client_search' => $client_search
                ]
            );
        } catch (Throwable $e) {

            report($e);

            return view('Erro', ['e' => $e]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('Cliente.Cliente_Criar');
        } catch (Throwable $e) {

            report($e);

            return view('Erro', ['e' => $e]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $client_request, EmailRequest $email_request, TelephoneRequest $telephone_request)
    {
        try {

            $client = new Client;

            $client->client_name = $client_request->client_name;

            $client->save();

            $email = new Email;

            $email->client_id = $client->id;
            $email->email_address = $email_request->email_address;

            $email->save();

            $telephone = new Telephone;

            $telephone->client_id = $client->id;
            $telephone->telephone_number = $telephone_request->telephone_number;

            $telephone->save();

            return redirect('Cliente');
        } catch (Throwable $e) {

            report($e);

            return view('Erro', ['e' => $e]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $client = Client::findOrFail($id);

            $emails = Email::where(['client_id' => $id])->get();

            $telephones = Telephone::where(['client_id' => $id])->get();

            return view(
                'Cliente.Cliente_Mostrar',
                [
                    'client' => $client,
                    'emails' => $emails,
                    'telephones' => $telephones
                ]
            );
        } catch (Throwable $e) {

            report($e);

            return view('Erro', ['e' => $e]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $client = Client::findOrFail($id);

            return view(
                'Cliente.Cliente_Editar',
                [
                    'client' => $client
                ]
            );
        } catch (Throwable $e) {

            report($e);

            return view('Erro', ['e' => $e]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        try {
            $client = Client::findOrFail($id);

            $client->client_name = $request->client_name;
            $client->client_status = $request->client_status;

            $client->save();

            return redirect('Cliente/'.$id);
        } catch (Throwable $e) {

            report($e);

            return view('Erro', ['e' => $e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $client = Client::findOrFail($id);

            $client->delete();

            return redirect('Cliente');
        } catch (Throwable $e) {

            report($e);

            return view('Erro', ['e' => $e]);
        }
    }
}
