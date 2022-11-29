<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Kategori;
use App\Models\News;
use App\Helpers\ApiFormatter;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    // event
    public function daftar_event()
    {
        $data = Event::where('event_stat', 2)
                      ->orderBy('created_at', 'desc')
                      ->with('kategori')
                      ->paginate(9);
        if($data)
        {
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function search_event($search)
    {
        $data = Event::where('event_name', 'LIKE', '%' .$search . '%')
                    ->orWhere('event_url', 'LIKE', '%' .$search . '%')
                    ->orWhere('event_link', 'LIKE', '%' .$search . '%')
                    ->orWhere('event_deadline', 'LIKE', '%' .$search . '%')
                    ->orWhere('event_source', 'LIKE', '%' .$search . '%')
                    ->orWhere('event_rank', 'LIKE', '%' .$search . '%')
                    ->orWhere('event_desc', 'LIKE', '%' .$search . '%')
                    ->orWhere('event_cost', 'LIKE', '%' .$search . '%')
                    ->get();
        if($data)
        {
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            return ApiFormatter::createApi(400, 'failed');
        }
    }


    // kategori
    public function daftar_kategori()
    {
        $data = Kategori::whereHas('event')->get();
        
        if($data)
        {
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    

    public function search_kategori($kategori_slug)
    {
        $data = Event::whereHas('kategori', 
                    function($query) use ($kategori_slug)
                    {
                        $query->where('kategori_slug', $kategori_slug); 
                    })->get();
        
        if($data)
        {
            if ($data->count() > 0) {
                # code...
                return ApiFormatter::createApi(200, 'success' ,$data);
            }else {
                # code...
                return ApiFormatter::createApi(404, 'errors' ,'data not found');
            }
        }else {
            return ApiFormatter::createApi(400, 'failed');
        }
    }


    // blog
    public function daftar_blog()
    {
        $data = News::where('news_stat', 2)
                    ->join('users', 'news.user_id', 'users.id')
                    ->select('news_title','news_url','news_slug','thumbnail','image',
                    'users.username','news_views','news.id as id','news_stat','news.created_at as tanggal')
                    ->orderBy('id','desc')
                    ->paginate(10);


        if($data)
        {
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function detail_blog($slug)
    {
        $data = News::where('news_slug', $slug)->first();
        $total_view = $data->news_views;
        $views_baru = $total_view + 1;
        $data->update(['news_views'=>$views_baru]);
        
        if($data)
        {
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    

    public function recent_blog_home()
    {
        $data = News::orderBy('created_at', 'desc')
                    ->limit(6)
                    ->get();
        if($data)
        {
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            return ApiFormatter::createApi(400, 'failed');
        }
    }
}
