<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\SaveUserRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::select(['*', \DB::raw('YEAR(NOW()) - YEAR(birthday) - (DATE_FORMAT(NOW(), "%m%d") < DATE_FORMAT(birthday, "%m%d")) AS age')])
        // ->get()
        // ->toArray();
        // dd($users);
            ->sortable(['created_at' => 'desc'])
            ->paginate();

        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(SaveUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->update($validated);

        $message = ['message.title' => '¡Registro actualizado!', 'message.detail' => 'Proceso realizado exitosamente'];
        return to_route('users.index')->with($message);
    }


    public function destroy(User $user)
    {
        $user->delete();
        return to_route('users.index')->with('message.title', 'Usuario eliminado');
    }

    public function create()
    {
        return view('users.create', ['user' => new User]);
    }

    public function store(SaveUserRequest $request)
    {
        //Nunca pasar el método Model->all() === solo los campos validados === obliga validar todos los campos
        // Se aplica para todos los modelos en: app/Providers/AppServiceProvider.php
        // protected $fillable = []; // deja pasar todos los campos

        $validated = $request->validated();
        User::create($validated);
        $message = ['message.title' => '¡Usuario registrado!', 'message.detail' => 'Proceso realizado correctamente'];
        return to_route('users.index')->with($message);
    }

    public function generate()
    {
        return \App\Models\User::factory(10)->make();
    }

    public function import()
    {
        // Realiza la solicitud HTTP para obtener los datos del API
        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->get(env('_URL_API_USERS'));
        } catch (\Throwable $th) {
            $message = ['message.class' => 'danger', 'message.title' => 'Error obteniendo los usuarios', 'message.detail' => 'No ha sido posible conectarse al API. ' . $th->getMessage()];
            return to_route('users.index')->with($message);
        }
        
        // Decodifica los datos JSON de la respuesta
        $data = json_decode($response->getBody(), true);
        
        // Itera a través de los datos y registra los usuarios en la base de datos
        foreach ($data as $userData) {
            User::create([
                'lastname' => $userData['lastname'],
                'firstname' => $userData['firstname'],
                'birthday' => $userData['birthday'],
            ]);
        }
        
        $message = ['message.title' => '¡Usuarios obtenidos!', 'message.detail' => 'Se han registrado 10 nuevos usuarios'];
        return to_route('users.index')->with($message);
    }


}
