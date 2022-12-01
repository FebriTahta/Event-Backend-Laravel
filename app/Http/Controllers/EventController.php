<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Kategori;
use DataTables;
use Illuminate\Support\Str;
use Validator;
use Image;
use File;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function backend_event(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $data   = Event::where('event_stat', '1')
                            ->orwhere('event_stat','2')
                            ->orderBy('id', 'desc')
                            ->get();

            return DataTables::of($data)
            ->addColumn('image', function($data){
                return '<img src="storage/event_image/thumbnail/'.$data->event_thumb.'" width="50px" alt="">';
            })
            ->addColumn('opsi', function($data){
                $actionBtn = ' <a href="/backend-event-edit/'.$data->id.'" class="delete btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>';
                $actionBtn.= ' <a data-target="#modaldel" data-id="'.$data->id.'" data-toggle="modal" href="javascript:void(0)" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                return $actionBtn;
            })
            ->addColumn('status', function($data){
                if ($data->event_stat == '1') {
                    # code...
                    $status = '<a href="#" class="badge badge-primary">waiting list</a>';
                }elseif($data->event_stat == '2') {
                    # code...
                    $status = '<a href="#" class="badge badge-success">tayang</a>';
                }
                return $status;
            })
            
            ->rawColumns(['opsi','image','status'])
            ->make(true);
        }
        $gets = Event::count();
        $wait = Event::where('event_stat', '1')->count();
        $acpt = Event::where('event_stat', '2')->count(); 
        return view('page.event',compact('gets','wait','acpt'));
    }

    public function backend_event_create(Request $request)
    {
        $kategori = Kategori::all();
        $random   = Str::random(5);
        $kategori_count = Kategori::count();
        return view('page.event_create',compact('kategori','random','kategori_count'));
    }


    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function backend_event_store(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $validator = Validator::make($request->all(), [
                'event_name'    => 'required|max:100',
                'event_source'  => 'required|',
                'event_deadline'=> 'required|',
                'event_link'    => 'required|',
                'event_rank'    => 'required|',
                'event_cost'    => 'required|',
                'event_desc'    => 'required|',
                'event_url'     => 'required|',
                'kategori'      => 'required|',
            ]);
 
            if ($validator->fails()) {

                return response()->json([
                    'status' => 400,
                    'message'  => $validator->messages().'',
                ]);
    
            }else {

                if($request->hasFile('event_image')) {
                    
                    if ($request->id !== null) {
                        # code...
                        $datas = Event::find($request->id);
                        $images = substr($datas->image, -25);
                        $thumbnails = substr($datas->thumbnail, -25);
                        unlink($images);
                        unlink($thumbnails);
                    }

                    $filename    = time().'.'.$request->event_image->getClientOriginalExtension();
                    $request->file('event_image')->move('evnt_image/',$filename);
                    $thumbnail   = $filename;
                    File::copy(public_path('evnt_image/'.$filename), public_path('image_evnt/'.$thumbnail));

                    $largethumbnailpath = public_path('evnt_image/'.$thumbnail);
                    $this->createThumbnail($largethumbnailpath, 550, 340);
                
                    $exist_url     = Event::where('event_url', $request->event_ur)->first();
                    $exist_slug    = Event::where('event_slug', Str::slug($request->event_title))->first();
                    $data_edit     = Event::where('id', $request->id)->first();
                    $event_url_new  = '';
                    $event_slug_new = '';

                    if ($exist_url == null) {
                        # code...
                        $event_url_new   = $request->event_url;
                    }else {
                        # code...
                        if ($exist_url->event_url == $data_edit->event_url && $exist_url !== null ) {
                            # code...
                            $event_url_new   = $request->event_url;
                        }elseif($exist_url->event_url !== $data_edit->event_url && $exist_url == null) {
                            # code...
                            $event_url_new   = $request->event_url;
                        }else {
                            # code...
                            $event_url_new   = $request->event_url.'-'.$exist_url->count();
                        }
                    }

                    if ($exist_slug == null) {
                        # code...
                        $event_slug_new  = Str::slug($request->event_name);
                    }else {
                        # code...
                        if ($exist_slug->event_slug == $data_edit->event_slug && $exist_slug !== null) {
                            # code...
                            $event_slug_new  = Str::slug($request->event_name);
                        }elseif($exist_slug->event_slug !== $data_edit->event_slug && $exist_slug == null) {
                            # code...
                            $event_slug_new  = Str::slug($request->event_name);
                        }else {
                            # code...
                            $event_slug_new  = Str::slug($request->event_name).'-'.$exist_slug->count();
                        }
                    }


                    $data = Event::updateOrCreate(
                        [
                            'id'=> $request->id,
                        ],
                        [
                            
                            'event_name'    =>$request->event_name,
                            'event_source'  =>$request->event_source,
                            'event_deadline'=>$request->event_deadline,
                            'event_link'    =>$request->event_link,
                            'event_rank'    =>$request->event_rank,
                            'event_cost'    =>$request->event_cost,
                            'image'         =>$filename,
                            'thumbnail'     =>$thumbnail,
                            'event_desc'    =>$request->event_desc,
                            'event_stat'    =>$request->event_stat,
                            'event_url'     =>$event_url_new,
                            'event_slug'    =>$event_slug_new,
                        ]
                    );

                    if (count($request->kategori) > 0) {
                        # code...
                        $kategori_id    = $request->kategori;
                        $kategori       = Kategori::whereIn('id', $kategori_id)->get();
                        $data->kategori()->sync($kategori);
                    }

                    return response()->json(
                        [
                            'status'=>200,
                            'message'=>['lomba / event has been updated']
                        ]
                    );

                }else {
                    # code...
                    $exist_url     = Event::where('event_url', $request->event_ur)->first();
                    $exist_slug    = Event::where('event_slug', Str::slug($request->event_title))->first();
                    $data_edit     = Event::where('id', $request->id)->first();
                    $event_url_new  = '';
                    $event_slug_new = '';

                    if ($exist_url == null) {
                        # code...
                        $event_url_new   = $request->event_url;
                    }else {
                        # code...
                        if ($exist_url->event_url == $data_edit->event_url && $exist_url !== null ) {
                            # code...
                            $event_url_new   = $request->event_url;
                        }elseif($exist_url->event_url !== $data_edit->event_url && $exist_url == null) {
                            # code...
                            $event_url_new   = $request->event_url;
                        }else {
                            # code...
                            $event_url_new   = $request->event_url.'-'.$exist_url->count();
                        }
                    }

                    if ($exist_slug == null) {
                        # code...
                        $event_slug_new  = Str::slug($request->event_name);
                    }else {
                        # code...
                        if ($exist_slug->event_slug == $data_edit->event_slug && $exist_slug !== null) {
                            # code...
                            $event_slug_new  = Str::slug($request->event_name);
                        }elseif($exist_slug->event_slug !== $data_edit->event_slug && $exist_slug == null) {
                            # code...
                            $event_slug_new  = Str::slug($request->event_name);
                        }else {
                            # code...
                            $event_slug_new  = Str::slug($request->event_name).'-'.$exist_slug->count();
                        }
                    }

                    $data = Event::updateOrCreate(
                        [
                            'id'=> $request->id,
                        ],
                        [
                           
                            'event_name'    =>$request->event_name,
                            'event_source'  =>$request->event_source,
                            'event_deadline'=>$request->event_deadline,
                            'event_link'    =>$request->event_link,
                            'event_rank'    =>$request->event_rank,
                            'event_cost'    =>$request->event_cost,
                            'event_desc'    =>$request->event_desc,
                            'event_stat'    =>$request->event_stat,
                            'event_url'     =>$event_url_new,
                            'event_slug'    =>$event_slug_new,
                        ]
                    );

                    if (count($request->kategori) > 0) {
                        # code...
                        $kategori_id    = $request->kategori;
                        $kategori       = Kategori::whereIn('id', $kategori_id)->get();
                        $data->kategori()->sync($kategori);
                    }

                    return response()->json(
                        [
                            'status'=>200,
                            'message'=>['lomba / event has been updated']
                        ]
                    );
                }

                
            }
        }
    }

    public function backend_event_edit($id)
    {
        $kategori = Kategori::all();
        $random   = Str::random(5);
        $data     = Event::findOrFail($id);
        return view('page.event_edit',compact('kategori','random','data'));
    }

    public function backend_event_delete(Request $request)
    {
        $data = Event::find($request->id);
        unlink("storage/event_image/".$data->event_image);
        unlink("storage/event_image/thumbnail/small_".$data->event_image);
        unlink("storage/event_image/thumbnail/medium_".$data->event_image);
        unlink("storage/event_image/thumbnail/large_".$data->event_image);
        if ($data->kategori->count() > 0) {
            # code...
            $data->kategori()->detach();
            $data->delete();
        }else {
            # code...
            $data->delete();
        }

        return response()->json(
            [
                'status'        => 200,
                'message'       => 'Event / Lomba has been deleted',
            ]
        );
    }

}
