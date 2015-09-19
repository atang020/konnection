<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Event;

class EventsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $range = [];

        // Add "From" date to query
        $range[] = Carbon::parse($request->input('start'))->toDateTimeString(
        );

        // Add "To" date to query
        $range[] = Carbon::parse($request->input('end'))->toDateTimeString();

        return Event::whereBetween('start_time', $range)->get();
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($slug)
	{
        $event = Event::findBySlug($slug);
        $chair_id = (int) \Request::get('chair_id');

        if (\Auth::id() === $chair_id) {
            $result = $event->update(array('chair_id' => $chair_id));
        }

        if ($result)
            return response('Event chair updated!');
        else
            abort(409, 'There was an issue updating the registration.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
