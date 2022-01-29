<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Consultations;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ConsultationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'company' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'consultation_type' => 'required',
        ]);

        Consultations::create([
            'name' => $request->name,
            'email' => $request->email,
            'company' => $request->company,
            'phone' => $request->phone,
            'message' => $request->message,
            'consultation_type' => $request->consultation_type,
        ]);

        Session::flash('success');

        return redirect()->back();
    }
}
