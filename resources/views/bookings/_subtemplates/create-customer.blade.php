<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed" aria-expanded="false" aria-controls="collapseOne">
          Customer Details
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <div class="control-group"> 
          {!! Form::label('full_name','Full Name') !!}
          {!! Form::text('full_name','',['class'=>'span3']) !!}
        </div>
        <div class="control-group"> 
          {!! Form::label('address','Address') !!}
          {!! Form::textarea('address','',['class'=>'span3','rows'=>'4']) !!}
        </div>
        <div class="control-group"> 
          {!! Form::label('contact_no','Contact Number') !!}
          {!! Form::text('contact_no','',['class'=>'span3']) !!}
        </div>
      </div>
    </div>
  </div>
</div>  