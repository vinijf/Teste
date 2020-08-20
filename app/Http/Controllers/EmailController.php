<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Client;
use App\Models\Email;
use App\Http\Requests\EmailRequest;

class EmailController extends Controller
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
                'Email.Email_Criar',
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
    public function store(EmailRequest $request, $id)
    {
        try {
            $email = new Email;

            $client_id = Client::findOrFail($id);

            $email->client_id = $client_id->id;
            $email->email_address = $request->email_address;

            $email->save();

            return redirect('Cliente/'.$id);
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
            $email = Email::findOrFail($id);

            return view(
                'Email.Email_Editar',
                [
                    'email' => $email
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
    public function update(EmailRequest $request, $id)
    {
        try {
            $email = Email::findOrFail($id);

            $email->email_address = $request->email_address;

            $email->save();

            return redirect('Cliente/'.$email->client_id);
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
            $email = Email::findOrFail($id);

            $email->delete();

            return redirect('Cliente/'.$email->client_id);
        } catch (Throwable $e) {

            report($e);

            return view('Erro', ['e' => $e]);
        }
    }
}
