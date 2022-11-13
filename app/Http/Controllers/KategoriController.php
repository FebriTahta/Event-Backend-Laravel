<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use Validator;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function backend_kategori(Request $request)
    {
        if ($request->ajax()) {
        
            $data   = Kategori::orderBy('id', 'desc')->get();
            return DataTables::of($data)
            ->addColumn('opsi', function($data){
                $actionBtn = ' <a data-target="#modaledit" data-id="'.$data->id.'" data-kategori_name="'.$data->kategori_name.'" data-toggle="modal" href="javascript:void(0)" class="delete btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>';
                $actionBtn.= ' <a data-target="#modaldel" data-id="'.$data->id.'" data-toggle="modal" href="javascript:void(0)" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                return $actionBtn;
            })
            
            ->rawColumns(['opsi'])
            ->make(true);
        }
        $total = Kategori::count();
        return view('page.kategori',compact('total'));
    }

    public function backend_kategori_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_name'             => 'required|max:50',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {

            $kategori_name = $request->kategori_name;
            $data = Kategori::updateOrCreate(
                [
                    'id'=> $request->id
                ],
                [
                    'kategori_name'=> $kategori_name,
                    'kategori_slug'=> Str::slug($kategori_name),
                ]
            );

            return response()->json(
                [
                    'status'        => 200,
                    'message'       => 'Data kategori diperbarui',
                ]
            );
        }
    }

    public function backend_kategori_delete(Request $request)
    {
        $kategori = Kategori::find($request->id);
        
        if ($kategori->event->count() > 0) {
            # code...
            $kategori->event()->detach();
            $kategori->delete();
        }else {
            # code...
            $kategori->delete();
        }

        return response()->json(
            [
                'status'        => 200,
                'message'       => 'Kategori has been deleted',
            ]
        );
    }
}
