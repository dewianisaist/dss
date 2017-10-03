<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\AdminCRUD;

class AdminCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = AdminCRUD::orderBy('id','DESC')->paginate(5);
        return view('admin.adminCRUD.index',compact('items'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adminCRUD.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required',
            'password' => 'required',
            'is_permission' => 'required',
        ]);

        AdminCRUD::create($request->all());
        return redirect()->route('adminCRUD.index')
                        ->with('success','Account created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = AdminCRUD::find($id);
        return view('admin.adminCRUD.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = AdminCRUD::find($id);
        return view('admin.adminCRUD.edit',compact('item'));
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
        $this->validate($request, [
            'nip' => 'required',
            'password' => 'required',
            'is_permission' => 'required',
        ]);

        AdminCRUD::find($id)->update($request->all());
        return redirect()->route('adminCRUD.index')
                        ->with('success','Account updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdminCRUD::find($id)->delete();
        return redirect()->route('adminCRUD.index')
                        ->with('success','Account deleted successfully');
    }
}