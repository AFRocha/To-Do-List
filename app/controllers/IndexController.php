<?php

class IndexController extends \BaseController {

/**
 * Display main page with user's tasks.
 *
 * @return Response
 */

public function showIndex()
{
	if (Auth::user()){
		$tasks =Task::where('user_id', Auth::id())->get();
		$activeTasks =Task::where('user_id', Auth::id())->where('active', 1)->get();
		$inactiveTasks =Task::where('user_id', Auth::id())->where('active', 0)->get();
		return View::make('index')->with('tasks', $tasks)->with('activetasks', $activeTasks)->with('inactivetasks', $inactiveTasks);
	} else {
		return View::make('hello');
	}
}

/**
 * Display user inactive tasks page.
 *
 * @return Response
 */

public function showInactives()
{
	if (Auth::user()){
		$tasks =Task::where('user_id', Auth::id())->get();
		$activeTasks =Task::where('user_id', Auth::id())->where('active', 1)->get();
		$inactiveTasks =Task::where('user_id', Auth::id())->where('active', 0)->get();
		return View::make('inactives')->with('tasks', $tasks)->with('activetasks', $activeTasks)->with('inactivetasks', $inactiveTasks);
	} else {
		return View::make('hello');
	}
}

}