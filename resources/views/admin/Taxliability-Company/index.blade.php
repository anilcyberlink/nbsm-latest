@extends('admin.master')
@section('title','Banner')
@section('breadcrumb')
  <a href="admin/taxliability_company/create" class="btn btn-primary btn-sm">Create</a>
  
@endsection
@section('content')
<div class="tray tray-center" style="height: 647px;">
<div class="panel">         
	<div class="panel-body ph20">
		<div class="tab-content">
			<div id="users" class="tab-pane active">
				<div class="table-responsive mhn20 mvn15">
					<table class="table admin-form theme-warning fs13">
						<thead>
							<tr class="bg-light">
								<th>SN</th>
								<th>Title</th>                            
								<th>Status</th>                            
								<th>Created at</th>                            
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@if(count($data) > 0)	            
							@foreach($data as $row)
							<tr class="id{{$row->id}}">
								<td>{{$loop->iteration}}</td>
								<td>{{ ucfirst($row->company) }}</td>
								
								<td>{{($row->status == 1)?'Enable':'Disable'}}</td>
								
								<td>{{ ucfirst($row->created_at) }}</td>
								<td class="text-center">  
									<a href="{{ url('admin/taxliability_company/'.$row->id.'/edit') }}">Edit</a>									 |
									<a href="{{ url('admin/taxliability_company/'.$row->id.'/destroy') }}" onclick="return confirm('Confirm Delete?')" class="btn-delete">
										Delete
									</a>
								</td>
							</tr>
							@endforeach
							@endif  
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection