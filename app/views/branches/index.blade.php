@extends('layout')

@section('container')
<div class="col-md-8">
<form method="get">
<input type="hidden" name="dz" value="apparatus" />
<div class="panel panel-default">
<div class="panel-heading"><h5><strong>MANAGE BRANCH</strong></h5></div>
<div class="panel-body" style="padding:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover" style="margin-bottom:0px;">
<thead>
  <tr>
    <th width="85" height="38" align="center">Sl/No</th>
    <th width="147" height="38" align="left">Branch</th>
    <th width="144" height="38" align="left">Phone</th>
    <th width="121" align="left" class="action text-center">Control</th>
  </tr>
  </thead>
  <tbody>
  	<?php $slno = 1; ?>
  	@foreach($branches as $branch)
  	<tr bgcolor="">
    <td height="25" align="center">{{$slno}}</td>
    <td height="25" align="left">{{ $branch->branch_name }}&nbsp;</td>
    <td height="25" align="left" bgcolor="">{{ $branch->phone }}&nbsp;</td>
    <td align="left" class="action text-center">
    	{{Form::open(array('url'=>route('branches.destroy', array($branch->id)),'method'=>'delete'))}}
			<a href="{{route('branches.edit', array($branch->id))}}" class="btn btn-xs btn-success tooltip-top" title="Edit branch"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
			<button type="submit" onclick="return confirm ('<?php echo _('Are you sure') ?>');" name="id" class="btn btn-xs btn-danger tooltip-top" title="Remove Catalog" value="{{$branch->id}}"><i class="glyphicon glyphicon-trash"></i></button>
		{{Form::close()}}
    </td>
    </tr>
    <?php $slno++; ?>
    @endforeach
</tbody>
<tfoot>
<tr>
	<td colspan="6">{{ $branches->links() }}</td>
</tr>
</tfoot>
</table>
 </div>
</div>
</form>
</div>
<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading"><strong>ADD BRANCH</strong></div>
		<div class="panel-body">
        {{ Form::open(array('url'=>route('branches.store'),'method'=>'post','class'=>'form-horizontal')) }}
            <div class="form-group">
            	<div class="col-sm-4">{{ Form::label('Branch Name') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('branch_name','',array('class'=>'form-control input-sm','required')) }}
                </div>
            </div>
            <div class="form-group">
            	<div class="col-sm-4">{{ Form::label('Phone No.') }}</div>
                <div class="col-sm-8">
                    {{ Form::text('phone','',array('class'=>'form-control input-sm')) }}
                </div>
            </div>
            <div class="form-group">
            	<div class="col-sm-4"></div>
                <div class="col-sm-8">
            	   {{ Form::submit('Save',array('class'=>'btn btn-success btn-sm')) }}
                </div>
            </div>
        {{ Form::close() }}
        </div>
    </div>
</div>
@stop