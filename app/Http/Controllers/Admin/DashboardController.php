<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lead;
use App\Subscriber;
use App\Category;
use App\News;
use App\Library;
use App\Board;
use Response;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {	
      return view('admin.dashboard');
    }
}
