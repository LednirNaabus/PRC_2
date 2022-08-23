<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUploadRequest;
use App\Models\User;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;


class UploadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $account_type = $request->input('account_type');  
        $client_name = $request->input('client_name');  

        $clients = User::where('user_type', '5')
                       ->orderBy('client_name', 'asc')
                       ->get();

        $uploads = Upload::Where('client_id', 'like', '%' . $client_name . '%')
                         ->get();

        return view('uploads.index', compact('clients','uploads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = User::where('account_type','<>','0')
                       ->orderby('client_name')
                       ->get();

        return view('uploads.create', compact('clients'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUploadRequest $request)
    {   
        $data = $request->validated();

        $upload = Upload::create($data);

        return back()->with('message', 'Upload Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
