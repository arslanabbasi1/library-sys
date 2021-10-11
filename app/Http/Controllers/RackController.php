<?php

namespace App\Http\Controllers;

use App\Rack;
use Illuminate\Http\Request;

class RackController extends Controller
{
    public function index(){
        $racks = Rack::all();
        return view('racks.index', ['racks' => $racks]);
    }
    public function create(){
        return view('racks.create');
    }
    public function store(){
        request()->validate([
            'name' => 'required'
        ]);
        Rack::create([
            'name' => request('name')
        ]);
        return redirect('admin/racks');
    }
    public function edit(Rack $rack){
        return view('racks.edit', ['rack' => $rack]);
    }
    public function update(Rack $rack){
        request()->validate([
            'name' => 'required'
        ]);
        $rack->update([
            'name' => request('name')
        ]);
        return redirect('admin/racks');
    }
    public function destroy(Rack $rack){
        $rack->delete();
        return redirect('admin/racks');
    }
}
