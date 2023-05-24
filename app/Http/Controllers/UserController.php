<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();

        

        if ($users){

            $statusCode = 200;
            $message = 'Success!';

        } else {

            $statusCode = 500;
            $message = 'Sorry. We could not find users in our database.';
        }

        $headers = [
            'Users' => $users,
            'Status' => $statusCode,
            'Message' => $message,
        ];

        return response()
        ->json([$headers]);
    }


    public function store(Request $request){

        $user = User::create($request->all());

        if ($user->save()){

            $statusCode = 200;
            $message = 'Success!';

        } else {

            $statusCode = 500;
            $message = 'Sorry. We could not create a new user.';
        }

        $headers = [
            'User' => $user,
            'Status' => $statusCode,
            'Message' => $message,
        ];

        return response()
        ->json([$headers]);

    }

    public function show(string $id){
        $user = User::find($id);

        if ($user){

            $statusCode = 200;
            $message = 'Success!';

        } else {
            
            $statusCode = 500;
            $message = 'Sorry. We could not find this user';
        }

        $headers = [
            'User' => $user,
            'Status' => $statusCode,
            'Message' => $message,
        ];

        return response()
        ->json([$headers]);
    }

    public function update(Request $request, string $id){

        $input = $request->all();

        $user = User::find($id);

        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = $input['password'];

        $user->save();

        return response()->json($user, 200);
    }

    public function destroy(User $user){

        $user->delete();
        return response()->json('Success!', 200);
    }
}

