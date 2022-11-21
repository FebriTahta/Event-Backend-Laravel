<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\Event;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function backend_dashboard(Request $request)
    {
        $total_blog = News::count();
        $total_event_tayang = Event::where('event_stat',1)->count();
        $total_event_wl = Event::where('event_stat',2)->count();
        $total_event = Event::count();
        return view('page.dashboard',compact('total_blog','total_event_tayang','total_event_wl','total_event'));
    }
}
