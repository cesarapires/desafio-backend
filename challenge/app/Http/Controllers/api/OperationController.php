<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Operation as Operation;
use App\Models\User as User;
use Auth;


use Illuminate\Http\Request;
use App\Http\Resources\Operation as OperationResource;

class OperationController extends Controller
{


    public function index()
    {
        
    }

    public function store(Request $request)
    { 
        Operation::create([
            'user_id' => $request->user_id,
            'type'=>$request->type,
            'value'=>$request->value,
        ]); 
        return ["code"=>201,
        "status"=>"Created",
        "message"=>"Operação cadastrada com sucesso"];
    }   

    public function destroy($operation_id)
    {
        if(Operation::where('operation_id','=',$operation_id)->first()===null){
            return ["code"=>404,
            "status"=>"Not Found",
            "message"=>"Operação não encontrada"];
        }
        else{
            Operation::where('operation_id','=',$operation_id)->delete();   
            return ["code"=>200,
            "status"=>"Removed",
            "message"=>"Operação removida com sucesso"];    
        }   
    }

    public function balance($user_id){
        if(User::where('user_id', '=', $user_id)->first() == null){
            return ["code"=>404,
            "status"=>"Not Found",
            "message"=>"Usuário não encontrado"];
        }
        else{
            $user = User::where('user_id', '=', $user_id)->first();
            $balanceC = Operation::where('user_id', '=', $user_id)->where('type','=','C')->sum('value');
            $balanceD = Operation::where('user_id', '=', $user_id)->where('type','=','D')->sum('value');
            $balanceE = Operation::where('user_id', '=', $user_id)->where('type','=','E')->sum('value');
            $balance_current = $user->balance+$balanceC-$balanceD+$balanceE;
            return["Nome"=>$user->name,
            "balance"=>$user->balance,
            "current_balance"=>$balance_current];
        }
    }

    public function listOperation($user_id){
        if(User::where('user_id', '=', $user_id)->first() == null){
            return ["code"=>404,
            "status"=>"Not Found",
            "message"=>"Usuário não encontrado"];
        }
        else{
            $user = User::where('user_id', '=', $user_id)->first();
            $operation = Operation::where('user_id', '=', $user_id)->get();
            return["User"=>$user,
            "Operation"=>$operation];
        }
    }
}