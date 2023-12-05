<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgentStore;

class AgentStoreController extends Controller
{

    public function index()
    {
        $list = AgentStore::orderBy('id', 'ASC')->get();
        return view('admin.agentstore.index', compact('list'));
    }


    public function create()
    {
        $list = AgentStore::all();
        return view('admin.agentstore.create', compact('list'));
    }


    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'address' => 'required',
                
            ],
            [
                'address.unique' => 'Tên đại lý đã có ,xin điền tên khác',
                'address.required' => 'Vui lòng điền tên đại lý!',
            ]
        );

        $agentstore = new AgentStore();
        $agentstore->address = $data['address'];
        $agentstore->save();
        return redirect()->route('agentstore.index')->with('message', 'Thêm đại lý thành công');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $agentstore = AgentStore::find($id);
        return view('admin.agentstore.edit', compact('agentstore'));
    }


    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'address' => 'required',  
            ],
            [
                'address.required' => 'Vui lòng điền tên danh mục!',
            ]
        );

        $data = $request->all();
        $agentstore =  AgentStore::find($id);
        $agentstore->address = $data['address'];
        $agentstore->save();
        return redirect()->route('agentstore.index')->with('message', 'sửa danh mục thành công');
    }


    public function destroy(string $id)
    {
        AgentStore::find($id)->delete();
        return redirect()->route('agentstore.index');
    }
}
