@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span>用户添加</span>
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

		<form class="mws-form" action="/admin/users" method="post">
			{{ csrf_field() }}
			<div class="mws-form-inline">
				<div class="mws-form-row">
					<label class="mws-form-label">用户名</label>
					<div class="mws-form-item">
						<input type="text" name="uname" class="small" value="{{ old('uname') }}">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">密码</label>
					<div class="mws-form-item">
						<input type="password" name="upass" class="small">
					</div>
				</div>

				<div class="mws-form-row">
					<label class="mws-form-label">确认密码</label>
					<div class="mws-form-item">
						<input type="password" name="repassword" class="small">
					</div>
				</div>

				<div class="mws-form-row">
					<label class="mws-form-label">邮箱</label>
					<div class="mws-form-item">
						<input type="text" name="email" class="small" value="{{ old('email') }}">
					</div>
				</div>
				
				<div class="mws-form-row">
					<label class="mws-form-label">手机号</label>
					<div class="mws-form-item">
						<input type="text" name="phone" class="small" value="{{ old('phone') }}">
					</div>
				</div>

				<div class="mws-form-row">
					<label class="mws-form-label">个人介绍</label>
					<div class="mws-form-item">
						<textarea name="description" class="small">
							{{ old('description') }}
						</textarea>
					</div>
				</div>

			</div>
			<div class="mws-button-row">
				<input type="submit" value="添加" class="btn btn-success">
				<input type="reset" value="重置" class="btn btn-info">
			</div>

		</form>
	</div>    	
	</div>

@endsection