<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AgentStore;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class AgentStoreController extends Controller
{

    public function index()
    {
        $agentstore = AgentStore::whereNotIn('address', ['admin'])->get();
        return view('admin.agentstore.index', compact('agentstore'));
    }


    public function create() : View {
        return view('admin.agentstore.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'address' => ['required', 'string'],
            'status' => ['required'],
        ]);
       
    
        AgentStore::create($validated);

        return to_route('admin.agentstore.index')->with('message', 'Thêm đại lí thành công');
    }


    public function edit(AgentStore $agentstore) : View {

        return view('admin.agentstore.edit', compact('agentstore'));
    }


    public function update(Request $request, AgentStore $agentstore)
    {
        $validated = $request->validate(
            [
                'address' => 'required',  
                'status'=> 'required',
            ],
            [
                'address.required' => 'Vui lòng điền địa chỉ đại lí!',
            ]
        );
        $agentstore->update($validated);
        return redirect()->route('admin.agentstore.index')->with('message', 'Sửa địa chỉ đại lí thành công');
    }


    public function destroy(AgentStore $agentstore) {
        $agentstore->delete();
        return back()->with('message','Địa chỉ đại lí được xoá thành công');
    }
}
