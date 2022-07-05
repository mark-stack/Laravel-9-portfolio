<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cheatsheet;

class CheatsheetController extends Controller
{

    public function index()
    {
        //All cheatsheets listed on single page
        $all_cheatsheets = Cheatsheet::all();

        return view('backend.cheatsheets.index',compact('all_cheatsheets'));
    }

    public function create()
    {
        //Same page as index
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Cheatsheet::create($data);

        return back()->with('success','Successfully created a new cheatsheet');
    }

    public function show($id)
    {
        //All cheatsheets displayed on single page
        $all_cheatsheets = Cheatsheet::all();

        return view('frontend.cheatsheets',compact('all_cheatsheets'));
    }

    public function edit(Cheatsheet $cheatsheet)
    {
        return view('backend.cheatsheets.edit',compact('cheatsheet'));
    }

    public function update(Request $request, Cheatsheet $cheatsheet)
    {
        $data = $request->all();
        $cheatsheet->update($data);

        return back()->with('success','Successfully updated');
    }

    public function destroy($id)
    {
        Cheatsheet::destroy($id);

        return back()->with('success_delete','Successfully deleted');
    }
}
