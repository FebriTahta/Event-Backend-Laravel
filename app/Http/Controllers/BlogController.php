<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\User;
use DataTables;
use Illuminate\Support\Str;
use Image;
use Validator;
use App\Models\Tag;
use File;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function backend_blog(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $data = News::get();
            return DataTables::of($data)
            ->addColumn('opsi', function($data){
                $actionBtn = ' <a href="/backend-blog-edit/'.$data->id.'" class="delete btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>';
                $actionBtn.= ' <a data-target="#modaldel" data-id="'.$data->id.'" data-toggle="modal" href="javascript:void(0)" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                return $actionBtn;
            })
            ->addColumn('penulis',function($data){
                return auth()->user()->username;
            })
            ->addColumn('image', function($data){
                return '<img src="'.asset('news_image/'.$data->thumbnail).'" width="50px" alt="">';
            })
            ->addColumn('status',function($data){
                if ($data->news_stat == '1') {
                    # code...
                    $stat = '<a href="javascript:void(0)" data-toggle="modal" data-target="#modalchange" class="badge badge-danger"
                    data-title="'.$data->news_title.'" data-id="'.$data->id.'" data-stat="'.$data->news_stat.'">pending</a>';
                }else {
                    # code...
                    $stat = '<a href="javascript:void(0)" data-toggle="modal" data-target="#modalchange" class="badge badge-primary"
                    data-title="'.$data->news_title.'" data-id="'.$data->id.'" data-stat="'.$data->news_stat.'">tayang</a>';
                }
                return $stat;
            })
            ->addColumn('total_view',function($data){
               if ($data->news_view == null || $data->news_view == '0') {
                # code...
                    $total = 'belum dilihat / 0 view';
               }else {
                # code...
                    $total = $data->news_view.' - Pembaca';
               }
               return $total;
            })
            ->rawColumns(['opsi','penulis','image','status','total_view'])
            ->make(true);
        }
        $total_blog = News::count();
        return view('page.blog',compact('total_blog'));
    }

    public function backend_blog_create()
    {
        $penulis = User::get();
        $random   = Str::random(5);
        $tag_count = Tag::count();
        $tag = Tag::get();
        return view('page.blog_create',compact('penulis','random','tag_count','tag'));
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }
    

    public function backend_blog_store(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $validator = Validator::make($request->all(), [
                'user_id'       => 'required|',
                'news_title'    => 'required|',
                'news_url'      => 'required|',
                'news_desc'     => 'required|',
                'news_stat'     => 'required|',
                'tag_id'        => 'required'
            ]);

            if ($validator->fails()) {

                return response()->json([
                    'status' => 400,
                    'message'  => $validator->messages().'',
                ]);
    
            }else {
                
                if($request->hasFile('news_image')) {

                    $filename    = time().'.'.$request->news_image->getClientOriginalExtension();

                    $request->file('news_image')->move('news_image/',$filename);
                    File::copy(public_path('news_image/'.$filename), public_path('news_image/thumb_'.$filename));
                    
            
                    $largethumbnailpath = public_path('news_image/thumb_'.$filename);
                    $this->createThumbnail($largethumbnailpath, 550, 340);
                    
                    $exist_url     = News::where('news_url', $request->news_ur)->first();
                    $exist_slug    = News::where('news_slug', Str::slug($request->news_title))->first();
                    $data_edit     = News::where('id', $request->id)->first();
                    $news_url_new  = '';
                    $news_slug_new = '';

                    if ($exist_url == null) {
                        # code...
                        $news_url_new   = $request->news_url;
                    }else {
                        # code...
                        if ($exist_url->news_url == $data_edit->news_url && $exist_url !== null ) {
                            # code...
                            $news_url_new   = $request->news_url;
                        }elseif($exist_url->news_url !== $data_edit->news_url && $exist_url == null) {
                            # code...
                            $news_url_new   = $request->news_url;
                        }else {
                            # code...
                            $news_url_new   = $request->news_url.'-'.$exist_url->count();
                        }
                    }

                    if ($exist_slug == null) {
                        # code...
                        $news_slug_new  = Str::slug($request->news_title);
                    }else {
                        # code...
                        if ($exist_slug->news_slug == $data_edit->news_slug && $exist_slug !== null) {
                            # code...
                            $news_slug_new  = Str::slug($request->news_title);
                        }elseif($exist_slug->news_slug !== $data_edit->news_slug && $exist_slug == null) {
                            # code...
                            $news_slug_new  = Str::slug($request->news_title);
                        }else {
                            # code...
                            $news_slug_new  = Str::slug($request->news_title).'-'.$exist_slug->count();
                        }
                    }

                    $data = News::updateOrCreate(
                        [
                            'id'=> $request->id,
                        ],
                        [
                            
                            'user_id'       =>$request->user_id,
                            'news_title'    =>$request->news_title,
                            'news_stat'     =>$request->news_stat,
                            'news_desc'     =>$request->news_desc,
                            'news_url'      =>$news_url_new,
                            'image'         =>$filename,
                            'thumbnail'     =>$filename,
                            'news_slug'     =>$news_slug_new,
                            'tag_id'        =>$request->tag_id,
                        ]
                    );

                }else {
                    
                    $exist_url     = News::where('news_url', $request->news_ur)->first();
                    $exist_slug    = News::where('news_slug', Str::slug($request->news_title))->first();
                    $data_edit     = News::where('id', $request->id)->first();
                    $news_url_new  = '';
                    $news_slug_new = '';

                    if ($exist_url == null) {
                        # code...
                        $news_url_new   = $request->news_url;
                    }else {
                        # code...
                        if ($exist_url->news_url == $data_edit->news_url && $exist_url !== null ) {
                            # code...
                            $news_url_new   = $request->news_url;
                        }elseif($exist_url->news_url !== $data_edit->news_url && $exist_url == null) {
                            # code...
                            $news_url_new   = $request->news_url;
                        }else {
                            # code...
                            $news_url_new   = $request->news_url.'-'.$exist_url->count();
                        }
                    }

                    if ($exist_slug == null) {
                        # code...
                        $news_slug_new  = Str::slug($request->news_title);
                    }else {
                        # code...
                        if ($exist_slug->news_slug == $data_edit->news_slug && $exist_slug !== null) {
                            # code...
                            $news_slug_new  = Str::slug($request->news_title);
                        }elseif($exist_slug->news_slug !== $data_edit->news_slug && $exist_slug == null) {
                            # code...
                            $news_slug_new  = Str::slug($request->news_title);
                        }else {
                            # code...
                            $news_slug_new  = Str::slug($request->news_title).'-'.$exist_slug->count();
                        }
                    }

                    $data = News::updateOrCreate(
                        [
                            'id'=> $request->id,
                        ],
                        [
                            
                            'user_id'       =>$request->user_id,
                            'news_title'    =>$request->news_title,
                            'news_stat'     =>$request->news_stat,
                            'news_desc'     =>$request->news_desc,
                            'news_url'      =>$news_url_new,
                            'news_slug'     =>$news_slug_new,
                            'tag_id'        =>$request->tag_id,
                        ]
                    );
                }

                return response()->json(
                    [
                        'status'=>200,
                        'message'=>'Blog has been updated'
                    ]
                );
            }
        }
    }

    public function backend_ubah_status(Request $request)
    {
        $data = News::where('id', $request->id)
                ->update(
                    [
                        'news_stat'=>$request->news_stat
                    ]
                    );
        return response()->json(
            [
                'status'=>200,
                'message'=>'Status Blog has been updated'
            ]
        );
    }

    public function backend_blog_remove(Request $request)
    {
        $data = News::find($request->id);
        $image = substr($data->image, -14);
        $thumbnail = substr($data->thumbnail, -20);
        unlink('news_image/'.$image);
        unlink('news_image/'.$thumbnail);
        $data->delete();

        return response()->json(
            [
                'status'        => 200,
                'message'       => 'Blog has been deleted',
            ]
        );
    }

    public function backend_blog_edit($id)
    {
        $penulis    = User::get();
        $random     = Str::random(5);
        $data       = News::findOrFail($id);
        return view('page.blog_edit',compact('penulis','random','data'));
    }
}
