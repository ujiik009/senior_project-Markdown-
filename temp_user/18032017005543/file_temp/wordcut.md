thai-wordcut-js
===============
Thai word breaker
fork from https://github.com/veer66/wordcut

ใช้สำหรับตัดแบ่งคำในภาษาไทยจากประโยคเป็นคำๆ
วิธีการใช้ ให้ทำการ script scr หลังจากนั้นใช้คำสั่ง
```js
var wordcut = require('wordcut');
wordcut.init();
out = wordcut.cut('กากา');
```

เมื่อเราแสดงผลลัพธ์จะพบกับคำว่า  กา|กา
