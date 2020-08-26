<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .log-content{
            border-style: solid;
            border-color:black;
            border-width: 5px;
        }
    </style>
</head>
<body>
    <h1>My Chat Box! </h1>

    <div class="log-content" align="right">
        <form action="{{url('/login')}}" method="post">
            @csrf

            <input type="text" placeholder="userEmail" name="userEmail"> <input type="password" placeholder="userPassword" name="userPassword" > <input type="submit" value="Sign In">
        </form>
    </div>
    <br>
<div class="log-content">
   <form action="{{url('/register-insertion')}}" method="post">
       @csrf
       <h1>Register </h1>
       <table>
           <tr>
               <td>user Name</td>
               <td><input type="text" name="userName"> </td>
           </tr>
           <tr>
               <td>user Email</td>
               <td><input type="text" name="userEmail"> </td>
           </tr>
           <tr>
               <td>user Password</td>
               <td><input type="password" name="userPassword"> </td>
           </tr>
           <tr>
               <td></td>
               <td><input type="submit" value="Sign Up"> </td>
           </tr>
       </table>
   </form>
</div>
</body>
</html>
