<?php

class TaskController extends \BaseController {

    /**
     * Display main page if user is logged in.
     * Otherwise, log in view is generated.
     *
     * @return Response
     */

    public function index()
    {
      if (Auth::user()){
        return Redirect::to('index');
      } else {
        return View::make('hello');
      }
    }

    /**
     * Display task detail page if user is logged in.
     * Otherwise, log in view is generated.
     *
     * @return Response
     */

    public function showTask($id)
    {
      if (Auth::user() && is_numeric($id)){
        $task =Task::where('user_id', Auth::id())->where('id', $id)->get();
        if (sizeof($task) > 0) {
          $activeTasks =Task::where('user_id', Auth::id())->where('active', 1)->get();
          $inactiveTasks =Task::where('user_id', Auth::id())->where('active', 0)->get();
          return View::make('task')->with('task', $task)->with('activetasks', $activeTasks)->with('inactivetasks', $inactiveTasks);
        } else {
         return Redirect::to('index');
       }
     } else {
      return Redirect::to('index');
    }
  }

    /**
     * Store a newly created task in storage.
     *
     * @return Response
     */

    public function store()
    {
    	$rules = array(
    		'title'       => 'required|min:3|max:30',
    		'description'      => 'required|min:4|max:255'
    		);
    	$validator = Validator::make(Input::all(), $rules);
    	if ($validator->fails()) {
    		return Redirect::to('index')
    		->withErrors($validator);
    	} else {
       $title = Input::get('title');
       $description = Input::get('description');
       //Check if task title already exists
       if( sizeof (Task::where('title', $title)->get()) == 0){
        $task = new Task;
        $task->title  = $title;
        $task->description  = $description;
        $task->active  = 1;
        $task->user_id =  Auth::id();
        $task->datetime  = new DateTime();
        $task->save();
        Session::flash('message', 'Task sucessfully created!');
        return Redirect::to('index');
      }else{
        Session::flash('message', 'That title already exists!');
        return Redirect::to('index');
      }
    }
  }

    /**
     * Update task in storage.
     *
     * @return Response
     */

    public function update()
    {
      
     $id =  Input::get('id');
     $activeTo = Input::get('activeTo');
     $task = Task::find($id);
     if ($task->active == $activeTo){
      if($activeTo == 0)
        return "Already inactive";
      return "Already active.";
    }
    
    $task->active = $activeTo;
    $task->save();
    return "Updated";
  }


    /**
     * Remove the specified task from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
    	$task = Task::find($id);
    	$task->delete();

    	Session::flash('message', 'Task successfully deleted!');
    	return Redirect::to('index');
    }

  }