<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<ul>
		@foreach($data as $user)
			<li>{{$user->name}}</li>
		@endforeach
	</ul>
</body>
</html>