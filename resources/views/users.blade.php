<!DOCTYPE html>
<html>
<head>
<style>
td {
    border: 1px solid black;
}
table{
	width:100%;
	border: 1px solid black;
}
</style>
</head>
 <body>
 	{!! Form::open(array('url' => 'user')) !!}
	<div class="form-group">
	        Name : {!! Form::text('name'); !!} <br>
	        Address : {!! Form::text('address'); !!} <br>
 			Email : {!! Form::text('email'); !!} <br>
 			Username : {!! Form::text('username'); !!} <br>
 			Password : {!! Form::text('password'); !!} <br>

	        {!! Form::submit('Click Me!') !!}
	</div>
	<br>
	{!! Form::close() !!}

		 <table>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>  
                    <td>{{$user->address}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->username}}</td>
                </tr>
                @endforeach           
        </table>
    </body>
</html>