@extends('layout')

@section('container')
<script type="text/javascript">
  function runme(){
    ob = document.getElementsByClassName("ob");
    received = document.getElementsByClassName("received");
    balance = document.getElementsByClassName("balance");
    sold = document.getElementsByClassName("sold");
    prodrate = document.getElementsByClassName("prodrate");
    totalValue = document.getElementsByClassName("totalValue");
    returnqty = document.getElementsByClassName("returnqty");
    for(i=0;i<ob.length;i++){
      balance.item(i).value = (Number(ob.item(i).value) + Number(received.item(i).value) - Number(returnqty.item(i).value) - Number(sold.item(i).value));
      totalValue.item(i).value = Number(prodrate.item(i).value) * Number(sold.item(i).value);
    }
  }

</script>

<div class="col-md-12">
 {{ Form::open(array('url'=>route('sales.update',$sales_date),'method'=>'put','class'=>'form-horizontal')) }}
<div class="panel panel-default">
<div class="panel-heading">
  <div class="rows">
    <h5><strong>DAILY SALES</strong></h5>
    <input type='date' name='sales_date' class="form-control" style="width:200px" value='<?=$sales_date?>' required >
  </div>
</div> 
<div class="panel-body" style="padding:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover" style="margin-bottom:0px;">
<thead>
  <tr>
    <th width="50" height="38" align="center" class="action text-center">Sl/No</th>
    <th width="230" height="38" align="left">Items</th>
    <th width="100" height="38" align="left">Rate</th>
    <th width="144" height="38" align="left" class="action text-center">OB</th>
    <th width="144" height="38" align="left" class="action text-center">Issued</th>
    <th width="144" height="38" align="left" class="action text-center">Received</th>
    <th width="144" height="38" align="left" class="action text-center">Transaction</th>
    <th width="144" height="38" align="left" class="action text-center">Return</th>
    <th width="144" height="38" align="left" class="action text-center">Sold</th>
    <th width="144" height="38" align="left" class="action text-center">Balance</th>
    <th width="200" height="38" align="left" class="action text-center">Value</th>
    <th width="100" height="38" align="left" class="action text-center">Demand</th>
  </tr>
  </thead>
<tbody>
 	<?php $slno = 1; ?>
 	@foreach($products as $product)
  <?php
    $balance = (($product->ob + $product->received) - $product->return) - $product->sold;
    $prodsales = Products::find($product->products_id);
    $total_value = $product->sold * $prodsales->prod_rate;
  ?>
  <tr bgcolor="">
    <td align="center" class="action text-center">{{$slno}}</td>
    <td align="left">{{ $prodsales->prod_name }} {{ Form::hidden('sales_id[]',$product->id) }} {{ Form::hidden('products_id[]',$product->products_id) }}</td>
    <td align="left" bgcolor="">{{ Form::text('prod_rate[]', $prodsales->prod_rate ,array('class'=>'form-control input-sm prodrate','readonly')) }}</td>
    <td align="left" class="action text-center">{{ Form::text('ob[]',$product->ob,array('class'=>'form-control input-sm ob','onkeyup'=>"runme();")) }}</td>
    <td align="left" class="action text-center">{{ Form::text('issued[]',$product->issued,array('class'=>'form-control input-sm issued')) }}</td>
    <td align="left" class="action text-center">{{ Form::text('received[]',$product->received,array('class'=>'form-control input-sm received','onkeyup'=>"runme();")) }}</td>
    <td align="left" class="action text-center">{{ Form::text('trans[]',$product->trans,array('class'=>'form-control input-sm')) }}</td>
    <td align="left" class="action text-center">{{ Form::text('return[]',$product->return,array('class'=>'form-control input-sm returnqty','onkeyup'=>"runme();")) }}</td>
    <td align="left" class="action text-center">{{ Form::text('sold[]',$product->sold,array('class'=>'form-control input-sm sold','onkeyup'=>"runme();")) }}</td>
    <td align="left" class="action text-center">{{ Form::text('balance[]',$balance,array('class'=>'form-control input-sm balance','readonly')) }}</td>
    <td align="left" class="action text-center">{{ Form::text('total_value[]',$total_value,array('class'=>'form-control input-sm totalValue')) }}</td>
    <td align="left" class="action text-center">{{ Form::text('demand[]',$product->demand,array('class'=>'form-control input-sm')) }}</td>
   </tr>
   <?php $slno++;?>
   @endforeach
</tbody>
<tfoot>
<tr>
	<td colspan="12"><span class="pull-right"><input type="submit" name="save" value="UPDATE" class="btn btn-success"></span></td>
</tr>
<tr>
  <td colspan="12">{{ $products->links() }}</td>
</tr>
</tfoot>
</table>
 </div>
</div>
{{ Form::close() }}
</div>
@stop
