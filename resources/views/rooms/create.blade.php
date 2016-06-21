<div id="dialog">
  <div class="main-inner">
    <div>
      <div>
      	<div class="col-md-12">
      		<div class="widget-content"> 
            <div id="error-msg"></div> 
      		  {!! Form::open(['id'=>"add_room"]) !!}
            <div class="control-group"> 
              {!! Form::label('room_no','Room Number') !!}
              {!! Form::text('room_no','', ['class'=>'span4']) !!}
            </div>
            <div class="control-group"> 
              {!! Form::label('description','Description') !!}
              {!! Form::textarea('description','',['class'=>'span4']) !!}
            </div>
            <div class="control-group"> 
              {!! Form::label('features','Available Features') !!} <br/>
              @foreach($features as $feature)
                {!! Form::checkbox('features[]',$feature->feature) !!}
                {!! Form::label('',$feature->feature,['class'=>'features']) !!}
              @endforeach 
            </div>
            {!! Form::close() !!}
          </div>
          <!-- /widget-content --> 
      	</div>
      </div>
    </div>
  </div>
</div>
