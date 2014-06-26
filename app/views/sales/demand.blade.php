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
    <h5><strong>DAILY SALES DEMAND</strong></h5>
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
    <td align="left">{{ $prodsales->prod_name }} </td>
    <td align="left" bgcolor="">{{ $prodsales->prod_rate }}</td>
    <td align="left" class="action text-center">{{ $product->demand }}</td>
   </tr>
   <?php $slno++;?>
   @endforeach
</tbody>
<tfoot>
<tr>
  <td colspan="4">{{ $products->links() }}</td>
</tr>
</tfoot>
</table>
 </div>
</div>
{{ Form::close() }}
</div>
@stop
