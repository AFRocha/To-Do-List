<?php echo View::make('header'); ?>

<br><br><br><br><br><br><br><br>

<div class="welcome">
   <img class="todoicon" src="{{ URL::asset('img/todolisticon.png') }}"  />
   <div class="registerbox">
    @if ($errors->any())
    {{ implode('', $errors->all('<div class="errors">:message</div>')) }}
    @endif
    @if(Session::has('message'))
    <div class="errors">
        <p>
            {{ Session::get('message') }}
        </p>
    </div>
    <br>
    @endif
    {{ Form::open(array('url' => 'users', 'id'=>'registerform', 'class' => 'ui form')) }}
    <img src="{{ URL::asset('img/usericon.png') }}" class="usericon"/>
    <div class="loginentry">
     <div class="ui transparent input">
        {{ Form::label('', '') }}
        {{ Form::text('username','', array('class' => 'field', 'placeholder' => 'Username')) }}
    </div>
</div>
<hr class="loginentry">
<br> 
<img class="passwordicon" src="{{ URL::asset('img/passwordicon.png') }}"/>

<div class="loginentry">
    <div class="ui transparent input">
        {{ Form::label('', '') }}
        {{ Form::password('password', array('class' => 'field', 'placeholder' => 'Password')) }}
    </div>
</div>

<hr class="loginentry">
<br> 
<img  class="passwordicon" src="{{ URL::asset('img/passwordicon.png') }}"/>

<div class="loginentry">
    <div class="ui transparent input">
      {{ Form::label('', '') }}
      {{ Form::password('passwordrepeated', array('class' => 'field', 'placeholder' => 'Password again')) }}
  </div>
</div>

<hr class="loginentry">
<br>
{{ Form::submit('Create user', array('id' => 'createbutton', 'class' => 'ui secondary button')) }}
{{ Form::close() }}
</div>

<div class="loginbox">
    @if ($errors->any())
    {{ implode('', $errors->all('<div class="errors">:message</div>')) }}
    @endif
    @if(Session::has('message'))
    <div class="errors">
        <p>{{ Session::get('message') }}
        </p>
    </div>
    <br>
    @endif
    {{ Form::open(array('url' => 'login', 'class' => 'ui form')) }}
    <img class="usericon" src="{{ URL::asset('img/usericon.png') }}"/>

    <div class="loginentry">
        <div class="ui transparent input">
            {{ Form::label('', '') }}
            {{ Form::text('username', '', array('class' => 'field', 'placeholder' => 'Username')) }}
        </div>
    </div>

    <hr class="loginentry">
    <br> 
    <img  class="passwordicon" src="{{ URL::asset('img/passwordicon.png') }}"/>

    <div class="loginentry">
        <div class="ui transparent input">
            {{ Form::label('', '') }}
            {{ Form::password('password', array('class' => 'field', 'placeholder' => 'Password')) }}
        </div>
    </div>

    <hr class="loginentry">
    <br>
    <br>
    {{ Form::submit('Login', array('class' => 'ui secondary button')) }}
    {{ Form::close() }}
</div>

<div id="register">
   <br>
   New user ? Register here
</div>

<div id="login">
   <br>
   Already member ? Login here
</div>

</div>

</div>

<?php echo View::make('footer'); ?>