{{ HTML::Style('css/bootstrap.min.css') }}
{{ HTML::Script('js/jquery.js') }}
{{ HTML::Script('js/jquery.js') }}
{{ HTML::Style('css/dzStyle.css') }}
<style>
body{
	margin-top:200px;
}
</style>
<div class="col-md-4">&nbsp;</div>
<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading"><strong>PHOTO GALLERY</strong></div>
		<div class="panel-body">
        {{ Form::open(array('url'=>'login','class'=>'form-horizontal','files'=>true)) }}
            <div class="form-group">
            	<div class="col-sm-4">{{ Form::label('Username') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('username','',array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">{{ Form::label('Password')}}</div>
                <div class="col-sm-8">
                     {{ Form::password('password',array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
            	<div class="col-sm-4"></div>
                <div class="col-sm-8">
            	   {{ Form::submit('Login',array('class'=>'btn btn-success btn-block')) }}
                </div>
            </div>
        {{ Form::close() }}
        </div>
    </div>
</div>
<div class="col-md-4">&nbsp;</div>