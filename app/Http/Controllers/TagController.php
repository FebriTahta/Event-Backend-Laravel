<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use DataTables;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function backend_tag(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $data = Tag::get();
            return DataTables::of($data)
            ->addColumn('opsi', function($data){
                $actionBtn = ' <a data-target="#modaledit" data-id="'.$data->id.'" data-kategori_name="'.$data->tag_name.'" data-toggle="modal" href="javascript:void(0)" class="delete btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>';
                $actionBtn.= ' <a data-target="#modaldel" data-id="'.$data->id.'" data-toggle="modal" href="javascript:void(0)" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                return $actionBtn;
            })
            ->addColumn('blog_tag', function($data){
                $blog_tag = $data->news->count().' - Blog';
                return $blog_tag;
            })
            ->rawColumns(['opsi','blog_tag'])
            ->make(true);
        }
        $total = Tag::count();
        return view('page.tag',compact('total'));
    }

    public function backend_tag_store(Request $request){
        $validator = Validator::make($request->all(), [
            'tag_name'             => 'required|max:50',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {
            $data = Tag::updateOrCreate(
                [
                    'id'=> $request->id
                ],
                [
                    'tag_name'=> $request->tag_name,
                    'tag_slug'=> Str::slug($request->tag_name),
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

    public function backend_tag_delete(Request $request){
        $data = Tag::findOrFail($request->id);
        if ($data->news->count() > 0) {
            # code...
            return response()->json(
                [
                    'status'=> 400,
                    'message'=> 'Tidak dapat menghapus kategori / tag yang terhubung dengan blog'
                ]
            );
        } else {
            # code...
            $data->delete();
            return response()->json(
                [
                    'status'=> 200,
                    'message'=> 'Berhasil menghapus kategori / tag'
                ]
            );
        }
        
    }
}
