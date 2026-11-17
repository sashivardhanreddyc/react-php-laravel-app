<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;
    
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    // GET  /api/users
    public function index(){
        $users = $this->userService->getAllUsers();
        return response()->json([
            "success"=>true,
            "message"=>"All users retrieved",
            "users"=>$users,
        ], 200);
    }

    // GET  /api/users/{id}
    public function show($id){
        return response()->json([
            "success"=>true,
            "message"=>"User Records fetched Successfully",
            "user_id"=> $id
        ]);
    }

    // POST /api/users
    public function store(Request $request){
        return response()->json([
            'success'=> true,
            'message'=> 'User Created',
            'data'=> $request->all()
        ]);
    }

    // PUT /api/users/{id}
    public function update(Request $request, $id){
        return response()->json([
            'success'=> true,
            'message'=> 'User Updated',
            'user_id'=>$id,
            'data'=> $request->all()
        ]);
    }

    // DELETE /api/users/{id}
    public function destroy($id){
        return response()->json([
            'success'=> true,
            'message'=> 'User deleted',
            'user_id'=>$id,
        ]);
    }
}
