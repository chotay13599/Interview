@extends('layouts.app')

@section('content')
    {{-- <h3>Item</h3> --}}
	<main class="content">
		
		<div class="container p-0">
            <h1>Category</h1>
            <div class="row">
                <div class="col-md-6">
					<a href="{{ route('category.create') }}" class="btn btn-success mb-3">Add new Category</a>
                </div>
            </div>

			<div class="row">
				<div class="col-12 col-lg-12 col-xxl-12 d-flex">
						<table class="table bg-white my-0 text-center">
							<thead>
                                    <th>No</th>
									<th>Categories</th>
									<th>Publish</th>
									{{-- <th>Image</th> --}}
                                    <th>Action</th>
							</thead>
							<tbody>
								@foreach ($categories as $key =>  $category)
									<form action="{{route('category.destroy',$category->id)}}" method="post">
										@csrf
										@method('delete')
										<tr>
											<td>{{ $categories->firstItem() + $key }}</td>
											<td>{{$category->name}}</td>
											<td>
												<input type="checkbox" name="" id="" @checked($category->publish == 1) aria-disabled="true">
											</td>
											{{-- <td><img src="/" alt=""></td> --}}
											<td><a href="{{route('category.edit',$category->id)}}" class="btn btn-primary mx-3">Edit</a>
												<button class="btn btn-danger" type="submit">Delete</button></td>
										</tr>
									</form>
								@endforeach
							</tbody>
                            
							
						</table>

                       
					</div>
                   
				</div>
                {{ $categories->links("pagination::bootstrap-5")}}
		</div>
	</main>

    
@endsection