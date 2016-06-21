@extends('layout.layout')
@section('content')
<div class="row">
	<div class="col-md-offset-1 col-md-10">
		<div class="widget-content features">
			  <div class="new_add"> 
          {!! Form::open(['url'=>'/features/']) !!}
            {!! Form::text('feature','', ['class'=>'span4']) !!}
            {!! Form::submit('Save') !!}
          {!! Form::close() !!}
          @if(sizeof($errors))
          <div id="error-msg">
              @foreach($errors->all() as $error)
                <p>{{$error}}</p>
              @endforeach  
          </div>    
          @endif
			  </div>		
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th> Feature </th>
                    <th> Added By </th>
                    <th> Status </th>                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($features as $feature)
                  <tr>
                     <td>{{$feature->feature}}</td> 
                     <td>{{$feature->name}}</td>
                     <td></td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
        </div>
        <!-- /widget-content --> 
	</div>
</div>
@endsection
