@extends('layouts.app') 
@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
			     コインパーキングの新規登録
				</div>
				
				<div class="panel-body">
					<!-- Display Validation Errors -->
					@if($errors->has('name')) 
					@include('common.errors')
                    @endif
					<!-- New Coinparking Form  -->
					<!-- ルーティングのcreateに流れを作る  -->
					<form action="/create" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- parking Name -->
						<div class="form-group">
							<label for="task-name" class="col-sm-3 control-label">名称</label>

							<div class="col-sm-6">
								<input type="text" name="name" id="parking-name" class="form-control" value="{{ old('name') }}">
							</div>
						</div>

						<!-- price -->
						<div class="form-group">
							<label for="task-name" class="col-sm-3 control-label">30分料金</label>

							<div class="col-sm-6">
								<input type="text" name="price" id="parking-15minprice" class="form-control" value="{{ old('price') }}">
							</div>
						</div>

						<!-- memo -->
						<div class="form-group">
							<label for="task-name" class="col-sm-3 control-label">メモ</label>

							<div class="col-sm-6">
								<input type="text" name="memo" id="parking-memo" class="form-control" value="{{ old('memo') }}">
							</div>
						</div>						

						<!-- Add Parking Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-plus"></i>新規登録
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
            <!-- calculationForm  -->
			<div class="panel panel-default">
			        <div class="panel-heading">
		                 時間計算
				    </div>
			<form action="/calculation" method="POST" class="form-horizontal">
						{{ csrf_field() }}
					<?php $today = \Carbon\Carbon::now(); ?>
				<div class="left">
				<br>
				     <div class="">
					 &nbsp;&nbsp;&nbsp;<b>いつから</b><br>
					 <!-- {{Form::date('from_date')}}日 -->
					 <div class="col-sm-6">
					 &nbsp;&nbsp;&nbsp;日付{{Form::date('from_date', \Carbon\Carbon::now(),['class' => 'form-control'])}}
					 </div>
					 <div class="col-sm-3">
					 &nbsp;&nbsp;&nbsp;時{{Form::selectRange('from_hour', 0, 24, $today->hour, ['class' => 'form-control'])}}
					</div>
					<div class="col-sm-3">
                    &nbsp;&nbsp;&nbsp;分{{Form::selectRange('from_min', 0, 59, $today->minute, ['class' => 'form-control'])}}
					</div>
					 </div>
				</div>
                <br><br>
				<!-- <div class="left"> -->
				<br>

				<div class="left">
				<br>
				     <div class="">
					 &nbsp;&nbsp;&nbsp;&nbsp;<b>いつまで</b><br>
					 <!-- {{Form::date('from_date')}}日 -->
					 <div class="col-sm-6">
					 &nbsp;&nbsp;&nbsp;&nbsp;日付{{Form::date('to_date', \Carbon\Carbon::now(),['class' => 'form-control'])}}
					 </div>
					 <div class="col-sm-3">
					 &nbsp;&nbsp;&nbsp;&nbsp;時{{Form::selectRange('to_hour', 0, 24, $today->hour+1,['class' => 'form-control'])}}
					</div>
					<div class="col-sm-3">
                    &nbsp;&nbsp;&nbsp;&nbsp;分{{Form::selectRange('to_min', 0, 59, $today->minute,['class' => 'form-control'])}}
                    <!-- &nbsp;&nbsp;&nbsp;&nbsp;分{{Form::selectRange('to_min', 0, 59, old('to_min'),['class' => 'form-control'])}} -->

					</div>
					 </div>
				</div>

			    <br><br><br>
				<div class="panel-body">
					<!-- Display Validation Errors -->
					@if($errors->has('date_str1') || $errors->has('date_str2'))
						@include('common.errors')
					@endif
						<!-- Add calculation Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class=""></i>この条件で料金検索
								</button>
							</div>
						</div>
					
				</div>
			</form>
			</div>
			
			@if (count($parkings) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						登録一覧&結果
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<tr>
										<td class="table-text"><div>名称</div></td>
										<td class="table-text"><div>30分料金</div></td> 
										<td class="table-text"><div>計算結果</div></td> 
										<td class="table-text"><div>メモ</div></td>
								</tr>
							</thead>
							<tbody>
						
								@foreach ($parkings as $key => $parking) <!--終わるまで$parkingsを出力と言う事？-->
									<tr>
										<td class="table-text"><div>{{ $parking->name }}</div></td>
										<td class="table-text"><div>{{ $parking->price }}</div></td> 
										<td class="table-text"><div>{{ @$fee[$key]}}</div></td><!--`@を入れてない時は無視させる(php)`ー-->
										<td class="table-text"><div>{{ $parking->memo }}</div></td>
										<!-- Task fix Button -->
										<td>
										    <form action="edit/{{$parking->id}}" method="GET">
												{{ csrf_field() }}
												{{ method_field('EDIT') }}

												<button type="submit" class="btn btn-primary">
													<i class="fa"></i>修正
												</button>
											</form>
										</td>
										<!-- Task Delete Button -->
										<td>
											<form action='/delete/{{$parking->id}}' method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" class="btn btn-danger">
													<i class="fa"></i>削除
												</button>
											</form>
										</td>
									</tr>
								@endforeach
								
							</tbody>{{----}}
						</table>
					</div>
				</div>
			@endif
			
		</div>
	</div>
@endsection