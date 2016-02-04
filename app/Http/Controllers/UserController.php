<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Idol;
use App\User;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  sring  $username
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $usersIdols = explode(',', $user->idols);

        $myIdols = DB::table('idols')
                    ->whereIn('id', $usersIdols)
                    ->get();

        $allIdols = [];
        $allIdolGroups = DB::table('idols')
                    ->orderBy('group', 'asc')
                    ->lists('group');
        $allIdolGroups = array_unique($allIdolGroups);
        foreach ($allIdolGroups as $allIdolGroup) {
            $allIdols[] = [
                'group' => $allIdolGroup,
                'idols' => DB::table('idols')->where('group', '=', $allIdolGroup)->get()
            ];
        }

        return view('user.show', [
            'user' => $user,
            'myIdols' => $myIdols,
            'allIdols' => $allIdols
        ]);
    }

    /**
     * Add an idol to the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function addIdol(Request $request)
    {
        if ($request->user()) {
            $user = $request->user();
            $idolId = $request->input('idol');

            $userIdols = explode(',', $user->idols);
            if (array_search($idolId, $userIdols)) {
                return redirect('user/' . $user->username)->with([
                    'message-type' => 'warning',
                    'message' => 'You already like this idol!'
                ]);
            }
            $userIdols[] = $idolId;
            $idols = implode(',', $userIdols);

            $updatedUser = DB::table('users')
                            ->where('id', $user->id)
                            ->update(['idols' => $idols]);

            return redirect('user/' . $user->username)->with([
                'message-type' => 'success',
                'message' => 'Added Idol'
            ]);
        }
    }

    /**
     * Remove an idol to the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function removeIdol(Request $request, $id)
    {
        if ($request->user()) {
            $user = $request->user();
            $idolId = $request->input('idol');

            $userIdols = explode(',', $user->idols);

            $key = array_search($id, $userIdols);
            unset($userIdols[$key]);

            $idols = implode(',', $userIdols);

            $updatedUser = DB::table('users')
                            ->where('id', $user->id)
                            ->update(['idols' => $idols]);

            return redirect('user/' . $user->username)->with([
                'message-type' => 'success',
                'message' => 'Removed Idol'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if ($request->user()) {
            $user = $request->user();

            $colors = [
                'aqua',
                'black',
                'blue',
                'gray',
                'green',
                'fuchsia',
                'lime',
                'maroon',
                'navy',
                'olive',
                'orange',
                'purple',
                'red',
                'silver',
                'teal',
                'yellow',
                'white'
            ];

            return view('user.settings', [
                'user' => $user,
                'colors' => $colors
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $user->color = $request->input('color');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        if ($request->input('new-password') === $request->input('new-password_confirmation')) {
            $user->password = bcrypt($request->input('new-password'));
        }

        $user->save();

        return redirect('user/' . $user->username)->with([
            'message-type' => 'success',
            'message' => 'Updated Settings'
        ]);
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
