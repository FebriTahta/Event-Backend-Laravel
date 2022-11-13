<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Validator;

class UserController extends Controller
{
    public function backend_user(Request $request){

        if ($request->ajax()) {
            # code...
            $data = User::get();
            return DataTables::of($data)
            ->addColumn('opsi', function($data){
                $actionBtn = ' <a href="javascript:void(0)" data-target="#modaledit" data-toggle="modal" class="edit btn btn-info btn-sm"
                data-username="'.$data->username.'" data-role="'.$data->role.'" data-pass="'.$data->pass.'" data-id="'.$data->id.'"><i class="fa fa-pencil"></i></a>';
                $actionBtn.= ' <a data-target="#modaldel" data-id="'.$data->id.'" data-toggle="modal" href="javascript:void(0)" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['opsi'])
            ->make(true);
        }
        $total_user = User::count();
        return view('page.user',compact('total_user'));
    }

    public function backend_remove_user(Request $request)
    {
        $data = User::findOrFail($request->id);

        if ($data->id == auth()->user()->id) {
            # code...
            return response()->json([
                'status'=>400,
                'message'=>'tidak dapat menghapus diri sendiri',
            ]);
        }
        elseif (auth()->user()->role == 'admin') {
            # code...
            return response()->json([
                'status'=>400,
                'message'=>'anda tidak berhak menghapus user lain',
            ]);

        }else {
            # code...
            $data->delete();
            return response()->json([
                'status'=>200,
                'message'=>'data user tersebut berhasil dihapus dari sistem'
            ]);
        }
    }

    public function backend_create_user(Request $request)
    {
        return view('page.user_create');
    }

    public function backend_store_user(Request $request)
    {
        $exist = User::where('username', $request->username)->first();

        if ($request->ajax()) {
            # code...
            $validator = Validator::make($request->all(), [
                'username'      => 'required|max:100',
                'pass'          => 'required|',
                'role'          => 'required|',
                
            ]);

            if ($validator->fails()) {

                return response()->json([
                    'status' => 400,
                    'message'  => $validator->messages().'',
                ]);
    
            }else {
            
                if ($exist !== null) {
                    # code...
                    return response()->json(
                        [
                            'status'=> 400,
                            'message'=> 'Gunakan Username Yang Lain'
                        ]
                    );
                }else {
                    # code...
                    $data = User::updateOrCreate(
                        [
                            'id'=> $request->id,
                        ],
                        [
                            'username'=> $request->username,
                            'pass'    => $request->pass,
                            'role'    => $request->role,
                            'password' => Hash::make($request->pass),
                        ]
                    );
                    
                    return response()->json(
                        [
                            'status'=> 200,
                            'message'=> 'New User has been updated'
                        ]
                    );

                }
                
            }
        }
    }
}
