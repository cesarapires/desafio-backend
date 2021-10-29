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
        //$user = User::paginate(15);
        return User::all();
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $birthday  = new \DateTime($request->birthday);
        $today    = new \DateTime(date('Y-m-d'));
        $age = $birthday->diff($today);

        if($age->y<18){
            return ["status"=>404,
            "error"=>"Unauthorized",
            "message"=>"Usuário com idade inferior a 18 anos"];
        }
        else{
            try{
                User::create($request->all()); 
                return ["status"=>201,
                "error"=>"Created",
                "message"=>"Usuário cadastrado com sucesso"];
            }
            catch(Exception $e){

            }
        }                
    }

    public function show($id)
    {
        return  User::where('idUser', '=', $id)->firstOrFail();;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
