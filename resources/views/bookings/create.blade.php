<div id="dialog">
  <div class="main-inner">
    <div>
      <div>
      	<div class="col-md-12">
      		<div class="widget-content"> 
            <div id="error-msg"></div> 
      		  {!! Form::open() !!}
            <div class="control-group"> 
              {!! Form::label('date','Booking Date') !!}
              {!! Form::text('booking_date',date('d-m-Y'), ['class'=>'span4']) !!}
            </div>
            <div class="control-group"> 
              @include('bookings._subtemplates.create-customer')
            </div>  
            <div class="control-group"> 
              @include('bookings._subtemplates.room-availability')
            </div>
            {!! Form::close() !!}
          </div>
          <!-- /widget-content --> 
      	</div>
      </div>
    </div>
  </div>
</div>
