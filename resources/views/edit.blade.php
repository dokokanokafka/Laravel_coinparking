@extends('layouts.app') 

{{--コメントアウト	--}}
@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
			     編集画面
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- Edit Coinparking Form  -->
					<!-- ルーティングのeditに流れを作る  -->
					<!--<form action="edit" method="POST" class="form-horizontal">-->
					
					
					<form action="/edit/{{$parking->id}}" method="POST" class="form-horizontal">
						{{ csrf_field() }}

					<input type='hidden' name='id' value=''><br>

						<!-- parking Name -->
						<div class="form-group">
							<label for="task-name" class="col-sm-3 control-label">名称</label>

							<div class="col-sm-6">
								<input type="text" name="name" id="parking-name" class="form-control" value="{{ $parking->name }}">
							</div>
						</div>

						<!-- price -->
						<div class="form-group">
							<label for="task-name" class="col-sm-3 control-label">30分料金</label>

							<div class="col-sm-6">
								<input type="text" name="price" id="parking-15minprice" class="form-control" value="{{ $parking->price }}">
								
							</div>
						</div>

						<!-- memo -->
						<div class="form-group">
							<label for="task-name" class="col-sm-3 control-label">メモ</label>

							<div class="col-sm-6">
								<input type="text" name="memo" id="parking-memo" class="form-control" value="{{ $parking->memo }}">
	
							</div>
						</div>						

						<!-- Add Parking Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-plus"></i>修正する
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>
@endsection