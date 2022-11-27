<?php

namespace App\Http\Controllers;
use Validator;
use DataTables;
use App\Models\Sosmed;
use Illuminate\Http\Request;

class SosmedController extends Controller
{
    public function backend_sosmed(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $data = Sosmed::get();
            return DataTables::of($data)
            ->addColumn('opsi', function($data){
                $actionBtn = ' <a href="#" data-toggle="modal" data-target="#modaledit" class="delete btn btn-info btn-sm"
                data-id="'.$data->id.'" data-sosmed_name="'.$data->sosmed_name.'" data-sosmed_link="'.$data->sosmed_link.'"
                ><i class="fa fa-pencil"></i></a>';
                $actionBtn.= ' <a data-target="#modaldel" data-id="'.$data->id.'" data-toggle="modal" href="javascript:void(0)" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['opsi'])
            ->make(true);
        }

        $total = Sosmed::count();
        return view('page.sosmed',compact('total'));
    }

    public function backend_sosmed_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sosmed_name' => 'required',
            'sosmed_link' => 'required'
        ]);

        if ($validator->fails()) {
            # code...
            return response()->json([
                'status' => 200,
                'message'=> $validator->messages()
            ]);
        }else {
            # code...
            $link = '';
            if (substr($request->sosmed_link,0,5) !== 'https') {
                # code...
                $link = 'https://'.$request->sosmed_link;
            }else {
                # code...
                $link = $request->sosmed_link;
            }

            if (auth()->user()->role == 'super_admin') {
                # code...
                $data = Sosmed::updateOrCreate(
                    [
                        'id' => $request->id,
                    ],
                    [
                        'sosmed_name' => $request->sosmed_name,
                        'sosmed_link' => $link
                    ]
                );

                return response()->json(
                    [
                        'status' => 200,
                        'message' => ['Sosmed has been updated'],
                    ]
                );
            }else {
                # code...
                if ($request->id !== null) {
                    # code...
                    $data = Sosmed::findOrFail($request->id);
                    if ($data->sosmed_name == $request->sosmed_name) {
                        # code...
                        $data->update(['sosmed_link'=>$link]);
                        return response()->json(
                            [
                                'status' => 200,
                                'message' => ['Sosmed has been updated'],
                            ]
                        );
                    }else {
                        # code...
                        return response()->json(
                            [
                                'status' => 200,
                                'message' => ['Maaf anda tidak berhak melakukan action tersebut']
                            ]
                        );
                    }

                }else {
                    # code...
                }
                return response()->json(
                    [
                        'status' => 200,
                        'message' => ['Maaf anda tidak berhak melakukan action tersebut']
                    ]
                );
            }
        }
    }

    public function backend_sosmed_delete(Request $request)
    {
        if (auth()->user()->role == 'super_admin') {
            # code...

            $data = Sosmed::findOrFail($request->id)->delete();
            return response()->json(
                [
                    'status' => 200,
                    'message' => ['Sosmed has been deleted']
                ]
            );
        }else {
            # code...
            return response()->json(
                [
                    'status' => 200,
                    'message' => ['maaf anda tidak berhak melakukan action tersebut'],
                ]
            );
        }
    }
}
