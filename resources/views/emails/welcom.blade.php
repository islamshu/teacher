<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>مرحبا بك في مدارسنا</title>
</head>
<body style="text-align: center">
    {{ $user->name }} مرحبا , <br>
    لقد تلقينا بطلب منك لاستعادة البريد الاكتروني! <br>
    
     {{ $user->email }}  :البريد الاكتروني هو 
    <br>
     {{ $password }}  :  كلمة المرور 
    <br>
    
    مع تحياتنا <br>
     مدارسنا
</body>
</html>
