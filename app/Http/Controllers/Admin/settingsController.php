<?php

namespace App\Http\Controllers\Admin;
use Validator;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::where('active', true)->get();
        return view('admin.settings.settings-page', ['settings' => $settings]);
    }

    public function colorprocess(Request $request)
    { 
        $this->validate($request, [
            'data' => 'required|array'
        ]);

        foreach ($request->data as $key => $value) {
            $row = Setting::where('name', $key)->first();
            if ($row) {
                $row->value = $value;
                $row->save();
            }
        }
        return redirect('admin/settings-page');
    }
}
