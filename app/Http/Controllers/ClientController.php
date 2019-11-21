<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\ValidAdult;
use App\ClientModel;

class ClientController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("America/Bahia");
        $this->validatorClient($request->all())->validate();
        $date = date('Y-m-d H:i:s');
        $array = [
            'name'             => $request->name,
            'cpf'              => $request->cpf,
            'rg'               => $request->rg,
            'created_at'       => $date,
            'updated_at'       => $date,
            'id_user_register' => Auth::user()->id,
            'id_user_update'   => Auth::user()->id,
            'date_of_birth'    => $request->date_of_birth,
            'phone'            => $request->phone,
            'birthplace'       => $request->birthplace
        ];
        $insert = ClientModel::create($array)->id;
        return view('home');

    }

    protected function validatorClient(array $data)
    {
        $array = [
            'name'          => ['required', 'string', 'max:255'],
            'cpf'           => ['required', 'string', 'min:11', 'max:11'],            
            'date_of_birth' => ['required', 'date'],
            'phone'         => ['required', 'string', 'min:9', 'max:11'],
            'birthplace'   => ['required', 'string', 'min:2','max:2']
        ];
        if($data['birthplace'] == 'SP'){
            $array['rg'] = ['required', 'numeric', 'min:10', 'max:10'];
        }else{
            $array['date_of_birth'] = ['required', 'date', new ValidAdult()];
        }
        return Validator::make($data, $array);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
