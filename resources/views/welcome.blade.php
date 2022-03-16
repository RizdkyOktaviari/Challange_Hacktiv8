<!doctype html>
<html lang="en">
  <head>
  	<title>Table 02</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Table #02</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
						Add User
					</button>					<div class="table-wrap">
						<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Create New</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}

			<div class="form-group">
				<label for="name" class="col-form-label">Name:</label>
				<input type="text" class="form-control @error('name') is-invalid @enderror" id="email" name="name">
				@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
			<div class="form-group">
				<label for="email" class="col-form-label">Email:</label>
				<input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
				@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Save changes</button>
	</div>
</form>
	</div>
</div>
</div>
						<table class="table">
						<thead class="thead-dark">
						<tr>
							<th>ID no.</th>
							<th>First Name</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
							@foreach ($user as $users)
							<tr class="alert" role="alert">
								<th scope="row">{{$users->id}}</th>
								<td>{{$users->name}}</td>
								<td>{{$users->email}}</td>
								<td>
									<a class="btn btn-primary" href="{{route('user.show',['id' => $users->id])}}" role="button">Show</a>
									<a class="btn btn-secondary" href="{{route('user.edit',['id' => $users->id])}}" role="button">Edit</a>
									<a class="btn btn-success" href="{{route('user.delete',['id' => $users->id])}}" role="button">Delete</a>
							</td>
							</tr>
							@endforeach
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="d-flex justify-content-center">
            {!! $user->links() !!}
        </div>
	</section>

	<script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/popper.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>

	</body>
</html>

