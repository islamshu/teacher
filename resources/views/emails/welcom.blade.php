<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>مرحبا بك في مدارسنا</title>
</head>
<body>
    <h2>مرحبا, {{ $user->name }}!</h2>
    
    <p>لقد قمت للتو بطلب استرجاع كلمة المرور</p>
    @php
        $rand = rand(11111111111,99999999999);
        $user ->password = $rand ;
        $user->save();
    @endphp
    <h3>البريد الاكتروني: {{ $user->email }}</h3>
    
    <p>كلمة المرور الجديدة : {{ $rand }}</p>
    
    <p>مع اطيب التحيات</p>
    <p>فريق نظام مدارسنا </p>
</body>
</html>
