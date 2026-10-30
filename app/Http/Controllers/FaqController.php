<?php

namespace App\Http\Controllers;

use App\Models\FaqModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $select_table = ['faq_id', 'question', 'answer', 'status'];
        $data = FaqModel::select($select_table)->get();
        return view('admin.faq.list-faq', ['view' => $data]);
    }

    public function add()
    {
        return view('admin.faq.add-faq');
    }

    public function create_faq(Request $request)
    {
        FaqModel::create($request->input());
        return redirect('admin/faq');
    }

    public function edit_faq($id)
    {
        $data['edit'] = FaqModel::find($id);
        return view('admin.faq.edit-faq')->with($data);
    }

    public function update_faq(Request $request, $id)
    {
        $faqdetail = FaqModel::find($id);
        $faqdetail->update($request->input());
        return redirect('admin/faq');
    }
    public function delete_faq($id)
    {
        $servicelist = FaqModel::find($id);
        $servicelist->update(['deleted_by' => session('useradmin')['usr_id']]);
        $servicelist->delete();
        return redirect('admin/faq');
    }
}
