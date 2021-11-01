<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as User;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\DB;

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
                User::create($request->all()); 
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
        if(User::where('idUser','=',$userId)->first()===null){
            return ["code"=>404,
            "status"=>"Not Found",
            "message"=>"Usuário não encontrado"];
        }
        else{
            return User::where('idUser','=',$userId)->firstOrFail();       
        }    
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($userId)
    {
        if(User::where('idUser','=',$userId)->first()===null){
            return ["code"=>404,
            "status"=>"Not Found",
            "message"=>"Usuário não encontrado"];
        }
        else{
            User::where('idUser','=',$userId)->delete();   
            return ["code"=>200,
            "status"=>"Removed",
            "message"=>"Usuário removido com sucesso"];    
        }     
    }
}