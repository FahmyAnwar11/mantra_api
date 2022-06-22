<?php

namespace App\Http\Controllers;

use App\Models\MenuModel;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = MenuModel::with(['sub_menu'])->orderBy('id')->get();

        return response()->json([
            'status' => 'success',
            'menu' => $menu
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
        $title = $request->title;
        $description = $request->description;
        $link = $request->link;

        $menu = new MenuModel();

        $menu->title = $title;
        $menu->description = $description;
        $menu->link = $link;
        
        $menu->save();

        return response()->json([
            'status' => 'success',
            'menu' => $menu
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
        $menu = MenuModel::with(['sub_menu'])->where('id', $id)->first();

        return response()->json([
            'status' => 'success',
            'menu' => $menu
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
        $title = $request->title;
        $description = $request->description;
        $link = $request->link;

        $menu = MenuModel::where('id', $id)->first();

        if ($menu) {
            $menu->title = $title;
            $menu->description = $description;
            $menu->link = $link;
            
            $menu->save();
    
            return response()->json([
                'status' => 'success',
                'menu' => $menu
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
        $menu = MenuModel::where('id', $id)->first();

        if ($menu) {
            $menu->delete();
    
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
