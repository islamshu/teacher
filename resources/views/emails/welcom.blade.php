<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>مرحبا بك في مدارسنا</title>
</head>
<body style="text-align: center">
    <h2>مرحبا  {{ $user->name }}!</h2>
    
    <p>لقد قمت للتو بطلب استرجاع كلمة المرور</p>

    <h3>البريد الاكتروني: {{ $user->email }}</h3>
    
    <p>كلمة المرور الجديدة : {{ $password }}</p>
    
    <p>مع اطيب التحيات</p>
    <p>فريق نظام مدارسنا </p>
</body>
</html>
