<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Phone;

class UserController extends Controller
{
    public function index(){

        //Users with their phones
        $users = User::with('phone')->get();

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
        
        $phone = $user->phone()->create([
            'phone' => $request->phone,
        ]);

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
            'Phone:' => $phone,
        ];

        return response()
        ->json([$headers]);

    }

    public function show(string $id){

        $user = User::with('phone')->find($id);


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
            'Phone' => $user->phone,
            
        ];

        return response()
        ->json([$headers]);
    }

    public function update(Request $request, string $id){

        
        $user = User::find($id);

        if($user){

            $input = $request->all();

            $user->name = $input['name'];
            $user->email = $input['email'];
            $user->password = $input['password'];
    
            $user->phone()->update([
                'phone' => $request->phone
            ]);
            

            if ($user->save()){

                $statusCode = 200;
                $message = 'Success!';
    
            } else {
    
                $statusCode = 500;
                $message = 'Sorry. We could not update this user.';
            }
    
            $headers = [
                'User' => $user,
                'Status' => $statusCode,
                'Message' => $message,
                'Phone' => $user->phone,
              
            ];
    
            return response()
            ->json([$headers]);
    
        }else {

            $statusCode = 500;
            $message = 'Sorry. We could not find this user.';

            return response()->json([$message, $statusCode]);

        }
        
        

        

        
    }

    public function destroy(User $user){

        $user->delete();
        return response()->json('Success!', 200);
    }
}

