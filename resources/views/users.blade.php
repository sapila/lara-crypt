<!DOCTYPE html>
<html>
 <body>
 
                @foreach ($users as $user)
                    <p>This is user {{ $user->email }}</p>
                @endforeach
 
    </body>
</html>