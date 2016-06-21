$(document).ready(function() {
  //This is the Modal window calling
  $.fn.modal.defaults={width:500,height:600};
  $('.modal_view').modal({
      draggable:true,
      buttons:{
        // Close:'hide',
        Save:function(){
          //$('#add_room').submit();
          $.ajax({
            url:'/rooms/',
            type:'POST',
            data:$('#add_room').serialize(),
            dataType:'json',
            success:function(data){
              if(data.success==true){
                $('.modal_window.shadow').hide();
                $('.overlay').hide();
                $('table.table tbody').append('<tr id="'+data.id+'" class="datarow"><td>'+data.room_no+'</td><td>'+data.description+'</td></tr>');

              }else
                $('#error-msg').html('<p>Room number already present</p>');
              //console.log(data);
            },
            error:function(xhr){
              console.log(xhr);
              $('#error-msg').html('');
              $.each(JSON.parse(xhr.responseText),function(index,value){
                  $.each(value,function(i,v){
                    $('#error-msg').append('<p>'+v+'</p>');
                  });
              });
            }
          })
        }
      }
    });
  $(document).on('click','.datarow',function(){
    var id=$(this).attr('id');
    $.ajax({
      url:'/rooms/'+id,
      type:'GET',
      //dataType:'json',
      success:function(data){
         $('#show-room').html(data); 
      },
      error:function(xhr){
        console.log(xhr.responseText);
      }
    });
  });
});