@extends('layout.layout')
@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="widget-content">
			  <div class="new_add">
			  	<a href="/rooms/create" class="btn btn-default modal_view" title="New Room" ><i class="icon-plus"></i>&nbsp;New</a>
			  </div>		
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th> Room No </th>
                    <th> Description </th>
                  </tr>
                </thead>
                <tbody>
                @foreach($rooms as $room)
                  <tr id="{{$room->id}}" class="datarow">
                    <td> {{$room->room_no}} </td>
                    <td> {{$room->description}} </td>              
                  </tr>
                @endforeach  
               </tbody>
            </table>
        </div>
        <!-- /widget-content --> 
	</div>
	<div class="col-md-6" id="show-room">	
	</div>
</div>
<script type="text/javascript" charset="utf-8" src="{{asset('js/rooms.js')}}"></script>
@endsection
