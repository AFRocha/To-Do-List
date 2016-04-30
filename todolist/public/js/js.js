 $(document).ready(function(){

  $("#register").click(function(){
   $(".loginbox").fadeOut(1000);
   $("#register").hide(1000);
   $(".registerbox").show(1200);
   $("#login").show(1200);
   $(".errors").hide();
 });

  $("#login").click(function(){
   $(".registerbox").fadeOut(100);
   $("#login").hide(1200);
   $(".loginbox").show(1000);
   $("#register").show(1000);
   $(".errors").hide();
 });

  $('#createbutton').click(function() {
    var pass = $('input[name=password]').val();
    var repass = $('input[name=passwordrepeated]').val();
    if(($('input[name=password]').val().length == 0) || ($('input[name=passwordrepeated]').val().length == 0)){
      $('#createbutton').attr("disabled", true);
      $('.passwordicon').attr('src', '../public/img/passwordredicon.png');
    }
    else if (pass != repass) {
      $('#createbutton').attr("disabled", true);
      $('.passwordicon').attr('src', '../public/img/passwordredicon.png');

    } else{
     $('#createbutton').attr("disabled", false);
     $('.passwordicon').attr('src', '../public/img/passwordicon.png');
   }
 })

$('input[name=passwordrepeated]').blur(function() {
    var pass = $('input[name=password]').val();
    var repass = $(this).val();
    if(($('input[name=password]').val().length == 0) || ($(this).val().length == 0)){
      $('#createbutton').attr("disabled", true);
      $('.passwordicon').attr('src', '../public/img/passwordredicon.png');
    }
    else if (pass != repass) {
      $('#createbutton').attr("disabled", true);
      $('.passwordicon').attr('src', '../public/img/passwordredicon.png');

    } else{
     $('#createbutton').attr("disabled", false);
     $('.passwordicon').attr('src', '../public/img/passwordicon.png');
   }
 })

  $('button[name=activatetask]').click(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "POST",
      url : "update",
      data : { id : $(this).val(), activeTo: 1 },
      success : function(message){
        $( ".alertmessages" ).html(message);
        if (message == "Updated"){
          if ( ($('.taskstate').html()) === '<strong>Yes</strong>'){ 
            $('.taskstate').html("<strong>No</strong>");
            $('.numberactives').html(parseInt($('.numberactives').html(), 10)-1);
            $('.numberinactives').html(parseInt($('.numberinactives').html(), 10)+1);
          }else{
           $('.taskstate').html("<strong>Yes</strong>");
           $('.numberactives').html(parseInt($('.numberactives').html(), 10)+1);
           $('.numberinactives').html(parseInt($('.numberinactives').html(), 10)-1);
         }
       }
     }
   });
  });

  $('button[name=disabletask]').click(function(){
    $.ajax({
      type: "POST",
      url : "update",
      data : { id : $(this).val(), activeTo: 0 },
      success : function(message){
       $( ".alertmessages" ).html(message);
       if (message == "Updated"){
        if ( ($('.taskstate').html()) === '<strong>Yes</strong>'){ 
          $('.taskstate').html("<strong>No</strong>");
          $('.numberactives').html(parseInt($('.numberactives').html(), 10)-1);
          $('.numberinactives').html(parseInt($('.numberinactives').html(), 10)+1);
        }else{
         $('.taskstate').html("<strong>Yes</strong>");
         $('.numberactives').html(parseInt($('.numberactives').html(), 10)+1);
         $('.numberinactives').html(parseInt($('.numberinactives').html(), 10)-1);
       }
     }
   }
 });
  });
});