<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class UserController extends Controller
{
   /**
 * @OA\Get(
 *     path="/api/items",
 *     @OA\Response(response="200", description="Fetch items")
 * )
 */
    public function index(){
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request){
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        return response()->json([
            "message"=>"User added."
        ],201);
    }

    public function show($id){
        $user=User::find($id);
        if(!empty($user)){
            return response()->json($user);
        }
        else{
            return response()->json([
                "message"=>"User not found."
            ],404);
        }
    }

    public function update(Request $request, $id){
        if(User::where('id',$id)->exists()){
            $user=User::find($id);
            $user->name = is_null($request->name) ? $user->name : $request->name;
            $user->email = is_null($request->email) ? $user->email : $request->email;
            $user->password = is_null($request->password) ? $user->password : $request->password;
            $user->save();
            return response()->json([
                "message"=>"User Updated."
            ],200); 
        } else{
            return response()->json([
                "message"=>"User Not Found."
            ],404);
        }
    }

    public function destroy($id){
        if(User::where('id',$id)->exists()){
            $user = User::find($id);
            $user->delete();

            return response()->json([
                "message"=>"User deleted."
            ],200);
        } else{
            return response()->json([
                "message"=>"User not found."
            ],404);
        }
    }
}
