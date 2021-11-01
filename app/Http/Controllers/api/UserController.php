<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User as User;
use Auth;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{

    public function index()
    {
        return User::orderByDesc('created_at')->get();
    }

    public function store(Request $request)
    {
        $birthday  = new \DateTime($request->birthday);
        $today    = new \DateTime(date('Y-m-d'));
        $age = $birthday->diff($today);

        if($age->y<18){
            return ["code"=>401,
            "status"=>"Unauthorized",
            "message"=>"Usuário com idade inferior a 18 anos"];
        }
        else{
            try{
                User::create([
                    'name' => $request->name,
                    'birthday'=>$request->birthday,
                    'cpf'=>$request->cpf,
                    'balance'=>$request->balance,

                    'email' => $request->email,
                    'password' => $request->password,
                ]); 
                return ["code"=>201,
                "status"=>"Created",
                "message"=>"Usuário cadastrado com sucesso"];
            }
            catch(Exception $e){
                return ["status"=>$e->getMessage()];
            }
        }                
    }

    public function show($userId)
    {
        if(User::where('user_id','=',$userId)->first()===null){
            return ["code"=>404,
            "status"=>"Not Found",
            "message"=>"Usuário não encontrado"];
        }
        else{
            return User::where('user_id','=',$userId)->firstOrFail();       
        }    
    }

    public function update(Request $request, $userId)
    {
        if(User::where('user_id','=',$userId)->first()===null){
            return ["code"=>404,
            "status"=>"Not Found",
            "message"=>"Usuário não encontrado"];
        }
        else{

        }
    }

    public function destroy($userId)
    {
        if(User::where('user_id','=',$userId)->first()===null){
            return ["code"=>404,
            "status"=>"Not Found",
            "message"=>"Usuário não encontrado"];
        }
        else{
            User::where('user_id','=',$userId)->delete();   
            return ["code"=>200,
            "status"=>"Removed",
            "message"=>"Usuário removido com sucesso"];    
        }     
    }

    public function login(Request $request){
        if(User::where('email','=',$request->email)->first()===null){
            return ["code"=>404,
            "status"=>"Not Found",
            "message"=>"Usuário não encontrado"];
        }
        else{
            $user = User::where('email','=',$request->email)->first();
        }
        if($request->password == $user->password){
            Auth::login($user);
            return ["code"=>200,
            "status"=>"Confirmed",
            "message"=>"Usuário autenticado"];
        }
        else{
            return ["code"=>404,
            "status"=>"Not Found",
            "message"=>"Senha Incorreta",
            "Senha Salva"=>$request->password,
            "Senha"=>$user->password];
        }
    }

    public function updatebalance(Request $request, $user_id)
    {
        User::where('user_id','=', $user_id)
      ->update(['balance' => $request->balance]);
    }
}