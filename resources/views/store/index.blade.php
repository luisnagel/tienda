@extends('store.template')

@section('content')

<div class="container">



				<table class="table table-striped table-hover table-bordered">
					<tr>
						<th>Producto</th>
						<th>Detalle</th>
						<th>Precio</th>
						<th>Pedir</th>
						<th>Más Información</th>
					</tr>
					@foreach($products as $product)
						<tr>
							<td>{{ $product->name }}</td>
							<td>{{ $product->extract }}</td>
							<td>${{ number_format($product->price,2) }}</td>
							<td><a class="btn" href="{{ route('cart-add', $product->slug) }}">
					<i class="fa fa-cart-plus"></i> Pedir
					</a></td>
							<td><a class="btn" href="{{ route('product-detail', $product->slug) }}"><i class="fa fa-chevron-circle-right"></i>Detalle</a></td>
						</tr>
					@endforeach
				</table><hr>



</div>





@stop