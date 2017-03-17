
@extends('main')

@section('title',' | All Categoeis ')

@section('content')
            <div class="row">
                <div class="col-md-8">
                	<h1>Categoeis</h1>
                	<table class="table">
                		<thead>
                			<tr>
                				<th>#</th>
                				<th>Name</th>
                			</tr>
                		</thead>
                		<tbody>
	                		@foreach($categories as $category)
	                			<tr>
	                				<th>{{$category->id}} </th>
	                				<td>{{$category->name}}</td>
	                			</tr>

	                		@endforeach
                		</tbody>
                	</table>
                </div>
                <div class="col-md-3">
					<div class="well">
						{!! Form::open(['route'=>'categories.store']) !!}

						<h3>New Category</h3>

						{{Form::label('name','Name:') }}
						{{Form::text('name',null,['class'=>'form-control']) }}
						<br>
						{{Form::submit('Create New Category',['class'=>'btn btn-primary btn-block']) }}

						{!! Form::close() !!}
					</div>
				</div>

            </div> <!-- End of header . row -- >
@endsection 

