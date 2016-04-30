<?php echo View::make('header'); ?>

<br><br><br>

<div class="mainpanel">
    <div class="account">
     <strong> 
         <p>
             &nbsp&nbsp&nbsp {{ Auth::user()->username }} &nbsp | &nbsp
             <a href="index">
                 {{ sizeof($activetasks); }} Active tasks 
             </a>
             &nbsp &middot&nbsp 
             <a href="inactives">
                 {{ sizeof($inactivetasks); }} Inactive tasks 
             </a>
         </p>
     </strong>
 </div>

 <div class="title">
     <strong>
         <p>
             To do list &nbsp &middot&nbsp 
             <i>Inactive tasks</i>
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

 @if(Session::has('message'))
 <div class="errors" >
     <p>
         {{ Session::get('message') }}
     </p>
 </div>
 @endif

 <br>

 <div class="mainboard">
     @if (sizeof($inactivetasks)>0)
     <table class="ui definition table">
        <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Description</td>
                <td>Datetime</td>
            </tr>
        </thead>
        <tbody>
            @foreach($inactivetasks as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td><a href="task/{{ $value->id }}">{{ $value->title }}</a></td>
                <td class="limitedentry">{{ $value->description }}</td>
                <td>{{ $value->datetime }}</td>
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
    @else
    <br><br>
    <strong>
        You don't have inactive tasks.
    </strong>
    @endif
</div>

<div class="addtaskbox">
    <img src="{{ URL::asset('img/todolisticon.png') }}" />
    @if ($errors->any())
    {{ implode('', $errors->all('<div class="errorslateral">:message</div>')) }}
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