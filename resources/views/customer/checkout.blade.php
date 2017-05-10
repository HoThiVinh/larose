@extends('layout.index')

@section('content')

@include('layout.menu')
<br>
<section class="main-content">				
	<div class="row">
	@if(session('notification'))
<div class="alert alert-success">
	{{session('notification')}}
</div>
@endif
		<form action="{{ url('checkout') }}" method="post">
			<div class="span5">		
			<input type="hidden" name="_token" value="{{csrf_token()}}">			
				<h4 class="title"><span class="text"><strong>Đơn hàng</strong></span></h4>
				<table class="table table-striped" style="border: 1px solid #eaeaea;">
					<thead>
						<tr>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th>Thành tiền</th>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $item)
						<tr>
							<td>{!! $item->name !!}</td>
							<td>{!! $item->qty !!}</td>	
							<td>{{number_format($item->price * $item->qty,0,',','.')}} VNĐ</td>
						</tr>
						@endforeach
						<tr>
							<td>Phí vận chuyển</td>
							<td>&nbsp;</td>
							<td>0</td>
						</tr>	  
						<tr>
							<td><strong>TỔNG HÓA ĐƠN</strong></td>
							<td>&nbsp;</td>
							<td><strong>{{$subtotal}} VNĐ</strong></td>
						</tr>	
					</tbody>
				</table>
			</div>
			<div class="span7">					
				<h4 class="title"><span class="text"><strong>Thông tin giao hàng</strong></span></h4>
				<fieldset>
					<div class="control-group">
						<label class="control-label">Họ tên
							<span style="color: red;">*</span>
						</label>

						<div class="controls">
							<input type="text" name="name" class="input-xlarge">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Địa chỉ
							<span style="color: red;">*</span>
						</label>
						<div class="controls">
							<input type="text" name="address" class="input-xlarge">
						</div>
					</div>								                            
					<div class="control-group">
						<label class="control-label">Số điện thoại
							<span style="color: red;">*</span>
						</label>
						<div class="controls">
							<input type="text" name="phone" class="input-xlarge">
						</div>
					</div>		
					<hr>
					<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="ĐẶT HÀNG"></div>
				</fieldset>				
			</div>	
		</form>				
	</div>
</section>
@endsection