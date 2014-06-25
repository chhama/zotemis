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
 {{ Form::open(array('url'=>route('sales.store'),'method'=>'post','class'=>'form-horizontal')) }}
<div class="panel panel-default">
<div class="panel-heading">
  <div class="rows">
    <h5><strong>DAILY SALES</strong></h5>
    <input type='date' name='sales_date' class="form-control" style="width:200px" value='<?=date("d-m-Y")?>' required >
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
    $sales = Sales::where('sales_date','<',date('Y-m-d'))
                    ->where('products_id','=',$product->id)
                    ->where('branches_id','=',1)
                    ->orderBy('sales_date','desc')->first();
    $balance = (($sales['ob'] + $sales['received']) - $sales['return']) - $sales['sold'];
    $ob = $balance;
    
  ?>
  <tr bgcolor="">
    <td align="center" class="action text-center">{{$slno}}</td>
    <td align="left">{{ $product->prod_name }} {{ Form::hidden('products_id[]',$product->id) }}</td>
    <td align="left" bgcolor="">{{ Form::text('prod_rate[]', $product->prod_rate ,array('class'=>'form-control input-sm prodrate','readonly')) }}</td>
    <td align="left" class="action text-center">{{ Form::text('ob[]',$ob,array('class'=>'form-control input-sm ob','onkeyup'=>"runme();")) }}</td>
    <td align="left" class="action text-center">{{ Form::text('issued[]',null,array('class'=>'form-control input-sm issued')) }}</td>
    <td align="left" class="action text-center">{{ Form::text('received[]',null,array('class'=>'form-control input-sm received','onkeyup'=>"runme();")) }}</td>
    <td align="left" class="action text-center">{{ Form::text('trans[]',null,array('class'=>'form-control input-sm')) }}</td>
    <td align="left" class="action text-center">{{ Form::text('return[]',null,array('class'=>'form-control input-sm returnqty','onkeyup'=>"runme();")) }}</td>
    <td align="left" class="action text-center">{{ Form::text('sold[]',null,array('class'=>'form-control input-sm sold','onkeyup'=>"runme();")) }}</td>
    <td align="left" class="action text-center">{{ Form::text('balance[]',null,array('class'=>'form-control input-sm balance','readonly')) }}</td>
    <td align="left" class="action text-center">{{ Form::text('total_value[]',null,array('class'=>'form-control input-sm totalValue')) }}</td>
    <td align="left" class="action text-center">{{ Form::text('demand[]',null,array('class'=>'form-control input-sm')) }}</td>
   </tr>
   <?php $slno++; ?>
   @endforeach
</tbody>
<tfoot>
<tr>
	<td colspan="12"><span class="pull-right"><input type="submit" name="save" value="Save" class="btn btn-success"></span></td>
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
