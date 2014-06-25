@extends('layout')

@section('container')
<div class="col-md-8">
<form method="get">
<input type="hidden" name="dz" value="apparatus" />
<div class="panel panel-default">
<div class="panel-heading"><h5><strong>MANAGE SALES</strong></h5></div>
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
    	{{Form::open(array('url'=>route('sales.destroy', array($sale->id)),'method'=>'delete'))}}
			<a href="{{route('sales.edit', array($sale->id))}}" class="btn btn-xs btn-success tooltip-top" title="Edit sale"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;
			<button type="submit" onclick="return confirm ('<?php echo _('Are you sure') ?>');" name="id" class="btn btn-xs btn-danger tooltip-top" title="Remove Catalog" value="{{$sale->id}}"><i class="glyphicon glyphicon-trash"></i></button>
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
</form>
</div>
@stop