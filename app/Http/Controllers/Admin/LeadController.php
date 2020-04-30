<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\User;
use App\Lead;


class LeadController extends Controller
{
    public function index()
    {
        $data = [];
        $lead = Lead::select('*')->get();
        $data['lead'] = $lead;
        return view('admin.lead.index',$data);
    }

   
}
