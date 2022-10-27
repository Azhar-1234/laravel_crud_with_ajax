<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
	
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1 class="mt-5 bt-1 text-danger text-center p-2 bg-light">Laravel Ajax Crud</h1>
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">Email</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
					    <!-- <tr>
					      <th scope="row">1</th>
					      <td>Mark</td>
					      <td>Otto</td>
					      <td>@mdo</td>
					    </tr> -->
				  </tbody>
				</table>
			</div>
			<div class="col-md-4">
				<h1 id="Aheader"  class="mt-5 bt-1 text-primary text-center m-1 p-2 bg-light">Add Form</h1>
				<h1 id="Eheader"class="mt-5 bt-1 text-primary text-center m-1 p-2 bg-light">Edit Form</h1>

				<form method="post" action="user-store">
					@csrf
				  <div class="mb-3">
				    <label for="exampleInputEmail1" class="form-label">Name</label>
				    <input type="text" id="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				  	<span class="text-danger" id="nameError"></span>
				  </div>
				  <div class="mb-3">
				    <label for="exampleInputEmail1" class="form-label">Email address</label>
				    <input type="email" id="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				  	<span class="text-danger" id="emailError"></span>
				  </div>
				  <div class="mb-3">
				    <label for="exampleInputPassword1" class="form-label">Password</label>
				    <input type="password" id="password" name="password"  class="form-control" id="exampleInputPassword1">
				  	<span class="text-danger" id="passwordError"></span>

				  </div>
				  <button type="submit" id="addBtn" onclick="addData()" class="btn btn-primary">Add</button>
				  <button type="submit" id="updateBtn" class="btn btn-primary">update</button>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		
		$('#addBtn').show();
		$('#Aheader').show();
		$('#updateBtn').hide();
		$('#Eheader').hide();
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		function allData()
		{
			$.ajax({
				type:"GET",
				dataType: 'json',
				url: "/user-all",
				success:function(response)
				{
					var data = ""
					$.each(response,function(key,value){
						data = data + "<tr>"
						data = data + "<td>" + value.id + "</td>"
						data = data + "<td>" + value.name + "</td>"
						data = data + "<td>" + value.email + "</td>"
						data = data + "<td>"
						data = data +  "<button class='btn btn-sm btn-primary mr-1' onclick='editData("+value.id+")'>Edit</button>"
						data = data +  "<button class='btn btn-sm btn-danger mr-1' >Delete</button>"
						data = data + "</td>"
						data = data + "</tr>"
					})
					$('tbody').html(data);
				}
			})
		}
		allData();
		function clearData()
		{
			$('#name').val('');
			$('#email').val('');
			$('#password').val('');
			$('#nameError').val('');
			$('#emailError').val('');
			$('#passwordError').val('');
		}
		//store data
		function addData()
		{
			event.preventDefault();
			var name = $('#name').val();
			var email = $('#email').val();
			var password = $('#password').val();
			$.ajax({
				type:"POST",
				dataType: "json",
				url: "/user-store",
				data:{name:name,email,password:password},
				success:function(data){
					clearData();
					allData();
					console.log('successfully inserted');
				},
				error:function(error){
					$('#nameError').text(error.responseJSON.errors.name);
					$('#emailError').text(error.responseJSON.errors.email);
					$('#passwordError').text(error.responseJSON.errors.password);
					console.log(error.responseJSON.errors.name);
				},
			})
		}
		//edit Data
		function editData(id)
		{
			alert(id)
		}


	</script>
</body>
</html>