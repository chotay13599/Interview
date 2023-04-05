@extends('layouts.app')

@section('content')

	<main class="content">
		
		<div class="container p-0">
            <h1>Item</h1>
			<a href="{{ route('item.create') }}" class="btn btn-success mb-3">Add new item</a>

			<table class="table table-hover mb-3">
				<thead>
                    <th>No</th>
					<th class="d-none d-xl-table-cell">Item</th>
					<th class="d-none d-xl-table-cell">Category</th>
					<th class="d-none d-xl-table-cell">Description</th>
					<th>Price</th>
					<th class="d-none d-md-table-cell">Owner</th>
					<th class="d-none d-md-table-cell">Publish</th>
                    <th class="d-none d-md-table-cell">Action</th>			
				</thead>
				<tbody>
					@foreach ($items as $key=>$item)
						<form action="{{route('item.destroy',$item->id)}}" method="post">
							@csrf
							@method('delete')
							<tr>
								<td>{{$items->firstItem() + $key}}</td>
								<td>{{$item->item}}</td>
								<td>{{$item->category->name}}</td>
								<td>{!! $item->description !!}</td>
								<td>{{$item->price}}</td>
								<td>{{$item->owner}}</td>
								<td>
									{{-- <input type="checkbox" name="" id="" @checked($item->publish == 1)> --}}
									<input type="checkbox" name="" id="" @checked($item->publish == 1) aria-disabled="true">
								</td>
								<td>
									<a href="{{route('item.edit',$item->id)}}" class="btn btn-primary mx-3">Edit</a>
									<button class="btn btn-danger" type="submit">Delete</button>
								</td>
							</tr>
						</form>
					@endforeach
				</tbody>
			</table>
			{{ $items->links("pagination::bootstrap-5")}}
		</div>
	</main>

    
@endsection