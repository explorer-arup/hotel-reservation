@extends('layout.layout')
@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="widget-content">
			  <div class="new_add">
			  	<a href="/bookings/create" class="btn btn-default modal_view" title="New Booking" ><i class="icon-plus"></i>&nbsp;New</a>
			  </div>		
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th> Room No </th>
                    <th> Description </th>
                  </tr>
                </thead>
                <tbody>
                  <tr id="" class="datarow">
                    <td> </td>
                    <td> </td>              
                  </tr>
               </tbody>
            </table>
        </div>
        <!-- /widget-content --> 
	</div>
	<div class="col-md-6" id="show-room">	
	</div>
</div>
<script type="text/javascript" charset="utf-8" src="{{asset('js/bookings.js')}}"></script>
@endsection
