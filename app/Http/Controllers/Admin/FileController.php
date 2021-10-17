<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\File;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Str;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.files.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        // $imagenes = $request->file('file')->store('public/imagenes');

        // $url = Storage::url($imagenes);

        // File::create([
        //     'url' => $url
        // ]);

        $request->validate([
                'file' => 'required|image|max:5000'
            ]);
        
        $nombre1 = '1-' . $request->file('file')->getClientOriginalName();
        $nombre2 = '2-' . $request->file('file')->getClientOriginalName();

        $ruta1 = storage_path() . '\app\public\imagenes/' . $nombre1;
        $ruta2 = storage_path() . '\app\public\imagenes/' . $nombre2;

        $img1 = Image::make($request->file('file'))->resize(800, 800);
        $img2 = Image::make($request->file('file'))->resize(800, 800);

        $logo1 = Image::make('https://enoctubrebdsevistederosa.com.co/img/logo.png')->resize(800, 800);
        $logo2 = Image::make('https://enoctubrebdsevistederosa.com.co//img/logo-2.png')->resize(800, 800);

        $img1->insert( $logo1);
        $img2->insert( $logo2);

        $img1->save($ruta1);
        $img2->save($ruta2);

        File::create([
            // 'user_id' => auth()->user()->id,
            'url' => 'storage/imagenes/' . $nombre1
        ]);

        File::create([
            // 'user_id' => auth()->user()->id,
            'url' => 'storage/imagenes/' . $nombre2
        ]);


        return  $request->file('file')->getClientOriginalName() ;






    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($file)
    {
        return view('admin.files.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($file)
    {
        return view('admin.files.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($file)
    {
        //
    }
}
