@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span>用户修改</span>
	</div>
	<div class="mws-panel-body no-padding">

		<!-- 显示错误信息 -->
		@if (count($errors) > 0)
		    <div class="mws-form-message error">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		<form class="mws-form" action="/admin/users/{{ $users->id }}" method="post">
			{{ method_field('PUT') }}
			{{ csrf_field() }}
			<div class="mws-form-inline">
				<div class="mws-form-row">
					<label class="mws-form-label">用户名</label>
					<div class="mws-form-item">
						<input type="text" name="uname" class="small" value="{{ $users['uname'] }}" readonly>
					</div>
				</div>

				<div class="mws-form-row">
					<label class="mws-form-label">邮箱</label>
					<div class="mws-form-item">
						<input type="text" name="email" class="small" value="{{ $users['email'] }}">
					</div>
				</div>
				
				<div class="mws-form-row">
					<label class="mws-form-label">手机号</label>
					<div class="mws-form-item">
						<input type="text" name="phone" class="small" value="{{ $users['phone'] }}">
					</div>
				</div>

				<div class="mws-form-row">
					<label class="mws-form-label">个人介绍</label>
					<div class="mws-form-item">
						<textarea name="description" class="small">{{ $users->usersinfo->description }}</textarea>
					</div>
				</div>

			</div>
			<div class="mws-button-row">
				<input type="submit" value="修改" class="btn btn-warning">
				<input type="reset" value="重置" class="btn">
			</div>

		</form>
	</div>    	
	</div>

@endsection