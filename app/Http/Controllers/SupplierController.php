<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\fileExists;

class SupplierController extends Controller
{
    //
    public function index()
    {
        return view('pages.supplier.manageSupplier', ['suppliers' => Supplier::orderByDesc('id')->get()]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $supplier = new Supplier();
            $supplier->company_name = $request->company_name;
            $supplier->person_name = $request->person_name;
            $supplier->code = $request->code;
            $supplier->mobile = $request->mobile;
            $supplier->email = $request->email;
            $supplier->address = $request->address;
            $supplier->account_number = $request->account_number;
            $supplier->status = $request->status;

            if ($request->file('logo')) {
                $imageName = Str::random(10) . time() . '.' . $request->file('logo')->getClientOriginalName();
                $request->logo->move(public_path('supplier-images/'), $imageName);
                $supplier->logo = 'supplier-images/' . $imageName;
            } else {
                $supplier->logo = 'dummy.png';
            }


            $supplier->save();
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
        }
        DB::commit();

        return redirect()->route('supplier.add')->with('message', "supplier created");
    }

    public function edit(Supplier $supplier)
    {
        return view('pages.supplier.editSupplier', compact('supplier'));
    }

    public function update(Supplier $supplier, Request $request)
    {
        DB::beginTransaction();
        try {

            $supplier->company_name = $request->company_name;
            $supplier->person_name = $request->person_name;
            $supplier->code = $request->code;
            $supplier->mobile = $request->mobile;
            $supplier->email = $request->email;
            $supplier->address = $request->address;
            $supplier->account_number = $request->account_number;
            $supplier->status = $request->status;

            if ($request->file('logo')) {
                if (fileExists($supplier->logo && $supplier->logo !== 'dummy.png')) {
                    unlink($supplier->logo);
                    $imageName = Str::random(10) . time() . '.' . $request->file('logo')->getClientOriginalName();
                    $request->logo->move(public_path('supplier-images/'), $imageName);
                    $supplier->logo = 'supplier-images/' . $imageName;
                }
            } else {
                $supplier->logo = $supplier->logo;
            }


            $supplier->save();
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('supplier.add')->with('message', "supplier updated");
    }

    public function destroy(Supplier $supplier)
    {

        DB::beginTransaction();
        try {
            if (fileExists($supplier->logo) && $supplier->logo !== 'dummy.png') {
                unlink($supplier->logo);
            }
            $supplier->delete();
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('supplier.add')->with('message', "supplier deleted");
    }
}
