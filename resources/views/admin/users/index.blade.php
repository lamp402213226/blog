@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> 用户列表</span>
    </div>
    <div class="mws-panel-body no-padding">
       	<form action="/admin/users" method="get">
	        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
			  <div id="DataTables_Table_1_length" class="dataTables_length">
			    <label>显示
			      <select size="1" name="count" aria-controls="DataTables_Table_1">
			        <option value="5"  @if(isset($request['count']) && $request['count'] == 5) selected @endif>5</option>
			        <option value="10" @if(isset($request['count']) && $request['count'] == 10) selected @endif>10</option>
			        <option value="15" @if(isset($request['count']) && $request['count'] == 15) selected @endif>15</option>
			        <option value="50" @if(isset($request['count']) && $request['count'] == 50) selected @endif>50</option>
			    </select>条</label>
			  </div>
			  <div class="dataTables_filter" id="DataTables_Table_1_filter">
			    <label>关键字:
			      <input type="text" name="search" aria-controls="DataTables_Table_1" value="{{ $request['search'] or '' }}">
			  </label>
			  <input type="submit" value="搜索" class="btn btn-info">
			</div>
		</form>
        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
           <thead>
			  <tr role="row">
				<th>ID</th>
				<th>用户名</th>
				<th>邮箱</th>
				<th>手机号</th>
				<th>创建时间</th>
				<th>用户签名</th>
				<th>操作</th>
			  </tr>
			</thead>
            
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        	@foreach($data as $k=>$v)
        	<tr class="odd">
                <td>{{ $v->id }}</td>
                <td>{{ $v->uname }}</td>
                <td>{{ $v->email }}</td>
                <td>{{ $v->phone }}</td>
                <td>{{ $v->created_at }}</td>
                <td>
                	<abbr title="{{ $v->usersinfo->description }}">
	                	<p style="width: 200px;overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">
	                		{{ $v->usersinfo->description }}
	                	</p>
                	</abbr>
                </td>
                <td>
                	<form action="/admin/users/{{ $v->id }}" method="post" style="display: inline-block;">
                		{{ csrf_field() }}
                		{{ method_field('DELETE') }}
                		<input type="submit" value="删除" class="btn btn-danger" >
                	</form>
                	<a href="/admin/users/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                </td>
            </tr>
            @endforeach
         </tbody>
     </table>
     <div id="page_page">
     	{{ $data->appends($request)->links() }}
     </div>
 	</div>
    </div>
</div>

@endsection