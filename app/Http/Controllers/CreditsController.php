<?php

namespace App\Http\Controllers;

use App\Util\FileHandling;
use Illuminate\Http\Request;
use App\Models\Cradit;
use App\Models\User;
use DB;
use Illuminate\Validation\Rule;
use Storage;
use Illuminate\Support\Str;

class CreditsController extends Controller
{
    use FileHandling;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $status = DB::table('users')
            ->join('cradits', 'users.id', '=', 'cradits.user_id')
            ->select('users.f_name', 'cradits.*')
            ->get();
        return view('admin.credit.list', compact('status'));
    }

    public function create()
    {
        $users = User::all();
        $viewParams = [
            'users' => $users,
            'types' => [
                Cradit::TYPE_CREDIT,
                Cradit::TYPE_DEBIT,
            ],
        ];

        return view('admin.credit.create', $viewParams);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'data.*.date' => ['required'],
            'data.*.remarks' => ['required'],
            'data.*.credit' => ['required', Rule::in([Cradit::TYPE_CREDIT, Cradit::TYPE_DEBIT])],
            'data.*.cost' => ['required', 'numeric'],
            'data.*.user' => ['required', 'exists:App\Models\User,id'],
        ]);

        foreach ($validatedData['data'] as $index => $data) {

            $fileInputName = sprintf('image_%d', $index);

            $user = User::findOrFail($data['user']);

            $credit = new Cradit();
            $credit->date = $data['date'];
            $credit->remarks = $data['remarks'];
            $credit->credit = ($data['credit'] === Cradit::TYPE_CREDIT) ? Cradit::TYPE_CREDIT : Cradit::TYPE_DEBIT;
            $credit->cost = $data['cost'];
            $credit->user()->associate($user);

            $filename = $this->uploadObject(config('apppend.storage.transactions'), $request->file($fileInputName));
            $credit->image = $filename;

            if (!$credit->save()) {
                return redirect()->route('admin.credit.create')->with('message', 'Something Went Wrong');
            }

        }

        return redirect()->route('credit.index')->with('message', 'Record Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $status = Cradit::find($id);
        $users = User::all();
        return view('admin.credit.edit', compact('status', 'users'));
    }

    public function edit($id)
    {
        $users = User::all();
        $viewParams = [
            'transaction' => Cradit::findOrFail($id),
            'users' => $users,
            'types' => [
                Cradit::TYPE_CREDIT,
                Cradit::TYPE_DEBIT,
            ],
        ];

        return view('admin.credit.edit', $viewParams);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'date' => ['required'],
            'remarks' => ['required'],
            'credit' => ['required', Rule::in([Cradit::TYPE_CREDIT, Cradit::TYPE_DEBIT])],
            'cost' => ['required', 'numeric'],
            'user' => ['required', 'exists:App\Models\User,id'],
        ]);

        $credit = Cradit::findOrFail($id);
        $user = User::findOrFail($validatedData['user']);

        $credit->date = $validatedData['date'];
        $credit->remarks = $validatedData['remarks'];
        $credit->credit = ($validatedData['credit'] === Cradit::TYPE_CREDIT) ? Cradit::TYPE_CREDIT : Cradit::TYPE_DEBIT;
        $credit->cost = $validatedData['cost'];
        $credit->user()->associate($user);

        $existingFile = null;
        if ($request->hasFile('image')) {
            $existingFile = $credit->originalImage;
            $filename = $this->uploadObject(config('apppend.storage.transactions'), $request->file('image'));
            $credit->image = $filename;
        }

        if ($credit->save()) {

            if ($existingFile) {
                $this->deleteObject($existingFile);
            }

            return redirect()->route('credit.index')->with('message', 'Record Updated Successfully');
        }

        return redirect()->back()->withErrors('Something Went Wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $status = Cradit::find($id);

        if ($status->delete()) {
            return response()->json('record deleted successfully');

        } else {
            return response()->json('something went wrong');

        }

    }
}

