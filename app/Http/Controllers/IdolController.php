<?php

namespace App\Http\Controllers;

use App\Idol;

use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IdolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('idol.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $idol = new Idol;

        $idol->name = $request->name;
        $idol->group = $request->group;
        $idol->imageurl = $request->imageurl;

        if (empty($idol->name) && empty($idol->group) && empty($idol->imageurl)) {
            return back()->withInput()->with([
                'message-type' => 'danger',
                'message' => 'Please make sure every field is entered'
            ]);
        } elseif ($idol->save() && $request->input('add-fave-idol') === 'true') {
            $newIdol = Idol::where('name', '=', $idol->name)->firstOrFail();

            $userIdols = explode(',', $user->idols);
            if (array_search($newIdol->id, $userIdols)) {
                return redirect('user/' . $user->username)->with([
                    'message-type' => 'warning',
                    'message' => 'You already like this idol!'
                ]);
            }
            $userIdols[] = $newIdol->id;
            $idols = implode(',', $userIdols);

            $updatedUser = DB::table('users')
                            ->where('id', $user->id)
                            ->update(['idols' => $idols]);

            return redirect('user/' . $user->username)->with([
                'message-type' => 'success',
                'message' => 'Added + Faved ' . $idol->name
            ]);
        } elseif ($idol->save()) {
            return redirect('user/' . $user->username)->with([
                'message-type' => 'success',
                'message' => 'Added ' . $idol->name
            ]);
        } else {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
