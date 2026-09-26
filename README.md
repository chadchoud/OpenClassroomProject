# نظام إدارة الحلقات القرآنية

تطبيق PHP Native + MySQL بواجهة عربية RTL، جاهز للرفع على InfinityFree.

## التشغيل والرفع
1. انسخ `config.example.php` إلى ملف باسم `config.php`.
2. أنشئ قاعدة MySQL في InfinityFree، ثم عدّل بيانات الاتصال في `config.php` (استخدم بيانات InfinityFree كاملة، وليس بيانات حسابك).
3. افتح phpMyAdmin واستورد `db.sql`.
4. ارفع الملفات إلى مجلد `htdocs` مع الحفاظ على مجلد `assets` و`uploads`.
5. افتح `index.php` وأنشئ حساباً. اجعل الحساب مديراً من phpMyAdmin بتنفيذ الاستعلام الموجود في نهاية `db.sql`.
6. للتنزيل كملف ZIP من GitHub: Code ثم Download ZIP.

ملاحظات: مجلد الرفع يسمح بملفات PDF وMP3 وJPG وPNG فقط. لا تضع بيانات قاعدة البيانات داخل GitHub؛ بعد تنزيل المشروع أنشئ `config.php` محلياً من المثال.
