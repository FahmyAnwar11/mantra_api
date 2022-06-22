<?php

namespace App\Http\Controllers;

use App\Models\SubMenuModel;
use Illuminate\Http\Request;

class SubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $submenu = SubMenuModel::with(['menu'])->orderBy('id')->get();

        return response()->json([
            'status' => 'success',
            'submenu' => $submenu
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $menu_id = $request->menu_id;
        $title = $request->title;
        $link = $request->link;

        $submenu = new SubMenuModel();

        $submenu->menu_id = $menu_id;
        $submenu->title = $title;
        $submenu->link = $link;
        
        $submenu->save();

        return response()->json([
            'status' => 'success',
            'submenu' => $submenu
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $submenu = SubMenuModel::with(['menu'])->where('id', $id)->first();

        return response()->json([
            'status' => 'success',
            'submenu' => $submenu
        ]);
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
        $menu_id = $request->menu_id;
        $title = $request->title;
        $link = $request->link;

        $submenu = SubMenuModel::where('id', $id)->first();

        if ($submenu) {
            $submenu->menu_id = $menu_id;
            $submenu->title = $title;
            $submenu->link = $link;
            
            $submenu->save();
    
            return response()->json([
                'status' => 'success',
                'submenu' => $submenu
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $submenu = SubMenuModel::where('id', $id)->first();

        if ($submenu) {
            $submenu->delete();
    
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }
}
