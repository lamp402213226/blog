@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>分类添加</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/cates" method="post">
    		{{ csrf_field() }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">分类名称</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="cname">
    				</div>
    			</div>
    			
    			<div class="mws-form-row">
    				<label class="mws-form-label">所属分类</label>
    				<div class="mws-form-item">
    					<select class="small" name="pid">
    						<option value="0">--请选择--</option>
    						@foreach($cates_data as $k=>$v)
    						<option value="{{ $v->id }}" @if($id == $v->id) selected @endif>{{ $v->cname }}</option>
    						@endforeach
    					</select>
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">
    			<input type="submit" value="添加" class="btn btn-info">
    			<input type="reset" value="重置" class="btn ">
    		</div>
    	</form>
    </div>    	
</div>

@endsection