@extends('layout')

@section('container')
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading"><h5><strong>MANAGE SALES</strong> <span class='pull-right'><a href="{{ URL::route('sales.create')}}" class="btn btn-success">New Daily Sales</a></span></h5> </div>
<div class="panel-body" style="padding:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover" style="margin-bottom:0px;">
<thead>
  <tr>
    <th width="50" height="38" align="center" class="action text-center">Sl/No</th>
    <th width="147" height="38" align="left">Branch</th>
    <th width="144" height="38" align="left">Date</th>
    <th width="121" align="left" class="action text-center">Control</th>
  </tr>
  </thead>
  <tbody>
  	<?php $slno = 1; ?>
  	@foreach($salesByDate as $sale)
  	<tr bgcolor="">
    <td height="25" align="center" class="action text-center">{{$slno}}</td>
    <td height="25" align="left">{{ $sale->branches->branch_name }}&nbsp;</td>
    <td height="25" align="left" bgcolor="">{{ $sale->sales_date }}&nbsp;</td>
    <td align="left" class="action text-center">
    	{{Form::open(array('url'=>route('sales.destroy', array($sale->sales_date)),'method'=>'delete'))}}
			<a href="{{route('sales.edit', array($sale->sales_date))}}" class="btn btn-xs btn-success tooltip-top" title="Edit sale"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
			<button type="submit" onclick="return confirm ('<?php echo _('Are you sure') ?>');" name="id" class="btn btn-xs btn-danger tooltip-top" title="Remove Sales" value="{{$sale->id}}"><i class="glyphicon glyphicon-trash"></i></button>
		{{Form::close()}}
    </td>
    </tr>
    <?php $slno++; ?>
    @endforeach
</tbody>
<tfoot>
<tr>
	<td colspan="6">{{ $salesByDate->links() }}</td>
</tr>
</tfoot>
</table>
 </div>
</div>
</div>
@stop