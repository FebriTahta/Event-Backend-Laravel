<?php

namespace App\Http\Controllers;
use App\Models\Partner;
use DataTables;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Image;

class PartnerController extends Controller
{
    public function backend_partner(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $data = Partner::get();
            return DataTables::of($data)
            ->addColumn('image', function($data){
                return '<img src="storage/partner_image/thumbnail/'.$data->partner_thumb.'" width="50px" alt="">';
            })
            ->addColumn('opsi', function($data){
                $actionBtn = ' <a href="#" data-toggle="modal" data-target="#modaledit" class="delete btn btn-info btn-sm"
                data-id="'.$data->id.'" data-partner_name="'.$data->partner_name.'" data-partner_image="storage/partner_image/thumbnail/'.$data->partner_thumb.'"
                ><i class="fa fa-pencil"></i></a>';
                $actionBtn.= ' <a data-target="#modaldel" data-id="'.$data->id.'" data-toggle="modal" href="javascript:void(0)" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['opsi','image'])
            ->make(true);
        }
        $total = Partner::count();
        return view('page.partner', compact('total'));
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function backend_partner_store(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $validator = Validator::make($request->all(), [
                'partner_name'    => 'required|max:100',
            ]);

            if ($validator->fails()) {

                return response()->json([
                    'status' => 400,
                    'message'  => $validator->messages().'',
                ]);
    
            }else {

                if($request->hasFile('partner_image')) {

                    $filename    = time().'.'.$request->partner_image->getClientOriginalExtension();
                    $filename2   = 'small_'.time().'.'.$request->partner_image->getClientOriginalExtension();
                    $filename3   = 'medium_'.time().'.'.$request->partner_image->getClientOriginalExtension();
                    $filename4   = 'large_'.time().'.'.$request->partner_image->getClientOriginalExtension();

                    $request->file('partner_image')->storeAs('public/partner_image', $filename);
                    $request->file('partner_image')->storeAs('public/partner_image/thumbnail', $filename2);
                    $request->file('partner_image')->storeAs('public/partner_image/thumbnail', $filename3);
                    $request->file('partner_image')->storeAs('public/partner_image/thumbnail', $filename4);

                    $smallthumbnailpath = public_path('storage/partner_image/thumbnail/'.$filename2);
                    $this->createThumbnail($smallthumbnailpath, 150, 93);
            
                    $mediumthumbnailpath = public_path('storage/partner_image/thumbnail/'.$filename3);
                    $this->createThumbnail($mediumthumbnailpath, 300, 185);
            
                    $largethumbnailpath = public_path('storage/partner_image/thumbnail/'.$filename4);
                    $this->createThumbnail($largethumbnailpath, 550, 340);

                    $data = Partner::updateOrCreate(
                        [
                            'id'=> $request->id,
                        ],
                        [
                            
                            'partner_name'    =>$request->partner_name,
                            'partner_image'   =>$filename,
                            'partner_thumb'   =>$filename3,
                           
                        ]
                    );

                    return response()->json(
                        [
                            'status'=>200,
                            'message'=>'Partner has been updated'
                        ]
                    );

                }else{

                    $data = Partner::updateOrCreate(
                        [
                            'id'=> $request->id,
                        ],
                        [
                            
                            'partner_name'    =>$request->partner_name,
                           
                        ]
                    );

                    return response()->json(
                        [
                            'status'=>200,
                            'message'=>'Partner has been updated'
                        ]
                    );
                }
            }
        }
    }

    public function backend_partner_update(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $validator = Validator::make($request->all(), [
                'partner_name'    => 'required|max:100',
            ]);

            if ($validator->fails()) {

                return response()->json([
                    'status' => 400,
                    'message'  => $validator->messages().'',
                ]);
    
            }else {

                if($request->hasFile('partner_image')) {

                    $data = Partner::find($request->id);
                    unlink("storage/partner_image/".$data->partner_image);
                    unlink("storage/partner_image/thumbnail/small_".$data->partner_image);
                    unlink("storage/partner_image/thumbnail/medium_".$data->partner_image);
                    unlink("storage/partner_image/thumbnail/large_".$data->partner_image);
                    
                    $filename    = time().'.'.$request->partner_image->getClientOriginalExtension();
                    $filename2   = 'small_'.time().'.'.$request->partner_image->getClientOriginalExtension();
                    $filename3   = 'medium_'.time().'.'.$request->partner_image->getClientOriginalExtension();
                    $filename4   = 'large_'.time().'.'.$request->partner_image->getClientOriginalExtension();

                    $request->file('partner_image')->storeAs('public/partner_image', $filename);
                    $request->file('partner_image')->storeAs('public/partner_image/thumbnail', $filename2);
                    $request->file('partner_image')->storeAs('public/partner_image/thumbnail', $filename3);
                    $request->file('partner_image')->storeAs('public/partner_image/thumbnail', $filename4);

                    $smallthumbnailpath = public_path('storage/partner_image/thumbnail/'.$filename2);
                    $this->createThumbnail($smallthumbnailpath, 150, 93);
            
                    $mediumthumbnailpath = public_path('storage/partner_image/thumbnail/'.$filename3);
                    $this->createThumbnail($mediumthumbnailpath, 300, 185);
            
                    $largethumbnailpath = public_path('storage/partner_image/thumbnail/'.$filename4);
                    $this->createThumbnail($largethumbnailpath, 550, 340);

                    $data = Partner::updateOrCreate(
                        [
                            'id'=> $request->id,
                        ],
                        [
                            
                            'partner_name'    =>$request->partner_name,
                            'partner_image'   =>$filename,
                            'partner_thumb'   =>$filename3,
                           
                        ]
                    );

                    return response()->json(
                        [
                            'status'=>200,
                            'message'=>'Partner has been updated'
                        ]
                    );

                }else{

                    $data = Partner::updateOrCreate(
                        [
                            'id'=> $request->id,
                        ],
                        [
                            
                            'partner_name'    =>$request->partner_name,
                           
                        ]
                    );

                    return response()->json(
                        [
                            'status'=>200,
                            'message'=>'Partner has been updated'
                        ]
                    );
                }
            }
        }
    }

    public function backend_partner_delete(Request $request)
    {
        $data = Partner::find($request->id);
        unlink("storage/partner_image/".$data->partner_image);
        unlink("storage/partner_image/thumbnail/small_".$data->partner_image);
        unlink("storage/partner_image/thumbnail/medium_".$data->partner_image);
        unlink("storage/partner_image/thumbnail/large_".$data->partner_image);
        $data->delete();

        return response()->json(
            [
                'status'        => 200,
                'message'       => 'Partner has been deleted',
            ]
        );
    }
}
