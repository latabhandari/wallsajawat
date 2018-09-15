@extends('layouts.master')

@section('content')

@if(Cart::count())

<form name="updateform" action="{{ route('cart.item.update') }}" method="POST">
	@csrf	
                 <table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
					
						@foreach(Cart::content() as $row)
						<tr>
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
									<div class="col-sm-10">
										<h4 class="nomargin">{{ $row->name }}</h4>
										<p>{{ $row->options->type }}</p>
										<p>{{ $row->options->width }} * {{ $row->options->height }}</p>
									</div>
								</div>
							</td>
							<td data-th="Price">{{ round($row->price) }}</td>
							<td data-th="Quantity">
								<!--<input type="text" class="form-control text-center" value="{{ $row->qty }}" /><a href="">Update</a>-->
								<select name="update[{{ $row->rowId }}]">
									  @for($i = 1; $i <= 10; $i++)
									  {{ $selected = ($i == $row->qty) ? "selected" : "" }}
									  <option value="{{ $i }}" {{ ($i == $row->qty) ? "selected" : "" }}>{{ $i }}</option>
									  @endfor
								</select>
							</td>
							<td data-th="Subtotal" class="text-center">{{ number_format((float) ($row->price * $row->qty), 2, '.', '') }}</td>
							<td class="actions" data-th="">
								<a href="{{ route('cart.item.delete', $row->rowId) }}"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>								
							</td>
						</tr>

						@endforeach
					
					</tbody>

					<tfoot>
						<tr class="visible-xs">
							<td class="text-center"><strong>Total 1.99</strong></td>
						</tr>
						<tr>
							<td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"><button type="submit" name="updatebtn" class="btn btn-info">Update</button></td>
							<td class="hidden-xs text-center"><strong>Total {{ Cart::total() }}</strong></td>
							<td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
				</table>
	</form>

	@else

     <p>No product in cart</p>

	 <a style="width:15%" href="{{ route('home.index') }}" class="btn btn-success btn-block">Continue Shopping <i class="fa fa-angle-right"></i></a>


	@endif


@endsection