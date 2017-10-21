<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Player;
use Illuminate\Http\Request;
use Session;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $players = Player::where('firstname', 'LIKE', "%$keyword%")
				->orWhere('lastname', 'LIKE', "%$keyword%")
				->orWhere('age', 'LIKE', "%$keyword%")
				->orWhere('team_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $players = Player::paginate($perPage);
        }

        return view('admin.players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.players.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'firstname' => 'required',
			'lastname' => 'required'
		]);
        $requestData = $request->all();
        
        Player::create($requestData);

        Session::flash('flash_message', 'Player added!');

        return redirect('admin/players');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $player = Player::findOrFail($id);

        return view('admin.players.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $player = Player::findOrFail($id);

        return view('admin.players.edit', compact('player'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'firstname' => 'required',
			'lastname' => 'required'
		]);
        $requestData = $request->all();
        
        $player = Player::findOrFail($id);
        $player->update($requestData);

        Session::flash('flash_message', 'Player updated!');

        return redirect('admin/players');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Player::destroy($id);

        Session::flash('flash_message', 'Player deleted!');

        return redirect('admin/players');
    }
}
