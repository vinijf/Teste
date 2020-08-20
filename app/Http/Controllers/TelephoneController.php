<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Client;
use App\Models\Telephone;
use App\Http\Requests\TelephoneRequest;

class TelephoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        try {
            $id = Client::findOrFail($id);

            return view(
                'Telefone.Telefone_Criar',
                [
                    'id' => $id,
                ]
            );
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
    public function store(TelephoneRequest $request, $id)
    {
        try {
            $telephone = new Telephone;

            $client_id = Client::findOrFail($id);

            $telephone->client_id = $client_id->id;
            $telephone->telephone_number = $request->telephone_number;

            $telephone->save();

            return redirect('Cliente/' . $id);
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
        //
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
            $telephone = Telephone::findOrFail($id);

            return view(
                'Telefone.Telefone_Editar',
                [
                    'telephone' => $telephone,
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
    public function update(TelephoneRequest $request, $id)
    {
        try {
            $telephone = Telephone::findOrFail($id);

            $telephone->telephone_number = $request->telephone_number;

            $telephone->save();

            return redirect('Cliente/'.$telephone->client_id);
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
            $telephone = Telephone::findOrFail($id);

            $telephone->delete();

            return redirect('Cliente/'.$telephone->client_id);
        } catch (Throwable $e) {

            report($e);

            return view('Erro', ['e' => $e]);
        }
    }
}
