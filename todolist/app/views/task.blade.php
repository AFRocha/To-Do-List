<?php echo View::make('header'); ?>

<br><br><br>
<div class="mainpanel">
  <div class="account">
   <strong> 
     <p>
       &nbsp&nbsp&nbsp {{ Auth::user()->username }} &nbsp | &nbsp
       <a href="index">
         <span class="numberactives">{{ sizeof($activetasks); }}</span> Active tasks 
       </a>
       &nbsp &middot&nbsp 
       <a href="inactives">
         <span class="numberinactives">{{ sizeof($inactivetasks); }}</span> Inactive tasks 
       </a>
     </p>
   </strong>
 </div>

 <div class="title">
   <strong>
     <p>
      Task&nbsp &middot&nbsp
      <i>
       {{ $task[0]->title }}
     </i>
   </p>
 </strong>
</div>

<div class="logout">
 <button class="ui button" style="margin-top:1%;" type="button" onclick="window.location='{{ url("logout") }}'">
   Logout
 </button>
</div>

<br>
<br>
<hr>

@if ($errors->any())
{{ implode('', $errors->all('<div class="errors">:message</div>')) }}
@endif
@if(Session::has('message'))
<div class="errors">
 <p>
   {{ Session::get('message') }}
 </p>
</div>
@endif

<div class="alertmessages">
 <strong>
 </strong>
</div>

<br>

<div class="taskboard">
 <table class="ui definition table">
  <thead>
    <tr>
      <td>ID</td>
      <td>Title</td>
      <td>Datetime</td>
      <td>Activated ?</td>
    </tr>
  </thead>
  <tbody>
    @foreach($task as $key => $value)
    <tr>
      <td>{{ $value->id }}</td>
      <td>{{ $value->title }}</td>
      <td>{{ $value->datetime }}</td>
      <td>
        @if ( $value->active )
        <span class="taskstate"><strong>Yes</strong></span>
        @else
        <span class="taskstate"><strong>No</strong></span>
        @endif
      </td>
      <td>
        <button name="activatetask" value = "{{ $value->id }}" class="ui button" >Activate</button>
      </td>
      <td>
        <button name="disabletask" value = "{{ $value->id }}" class="ui button">Disable</button>
      </td>
      <td>
        {{ Form::open(array('url' => 'tasks/' . $value->id, 'class' => 'ui form')) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete task', array('class' => 'ui button')) }}
        {{ Form::close() }}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<table class="ui definition table">
  <thead>
    <tr>
      <td>Description</td>
    </tr>
  </thead>
  <tbody>
    @foreach($task as $key => $value)
    <tr>
      <td>{{ $value->description }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

<div class="addtaskbox">
  <img class="todoicon" src="{{ URL::asset('img/todolisticon.png') }}"/>
  @if ($errors->any())
  {{ implode('', $errors->all('<div class="errors">:message</div>')) }}
  @endif
  {{ Form::open(array('url' => 'tasks', 'id'=>'addtaskform', 'class' => 'ui form')) }}
  <div class="ui transparent input">
    {{ Form::label('', '') }}
    {{ Form::text('title','', array('class' => 'field', 'placeholder' => 'Title')) }}
  </div>
  <hr>
  <br> 
  <div class="ui transparent input">
    {{ Form::label('', '') }}
    {{ Form::textarea('description','', array('class' => 'field', 'placeholder' => 'Description', 'style' => 'resize: none;')) }}
  </div>
  <br> 
  <br> 
  {{ Form::submit('Add task', array('class' => 'ui secondary button')) }}
  {{ Form::close() }}
</div>

</div>

</div>

<?php echo View::make('footer'); ?>