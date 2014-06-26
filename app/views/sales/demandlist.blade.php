@extends('layout')

@section('container')
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading"><h5><strong>MANAGE DEMAND</strong></h5></div>
<div class="panel-body" style="padding:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover" style="margin-bottom:0px;">
<thead>
  <tr>
    <th width="50" height="38" align="center" class="action text-center">Sl/No</th>
    <th width="147" height="38" align="left">Branch</th>
    <th width="144" height="38" align="left">Date</th>
    <th width="121" align="left" class="action text-center">Demand</th>
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
			<a href="{{route('sales.demand', array($sale->sales_date))}}" class="btn btn-xs btn-success tooltip-top" title="Demand List"><i class="glyphicon glyphicon-edit"></i> Demand Details</a>
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