<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Kategori;
use App\Helpers\ApiFormatter;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function daftar_event()
    {
        $data = Event::with('kategori')->get();

        if($data)
        {
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            return ApiFormatter::createApi(400, 'failed');
        }
    }

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


}
