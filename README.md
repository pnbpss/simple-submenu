# แสดงวิธีการอ่านข้อมูล menu แบบ nested จากไฟล์ json แล้วมาแสดง ด้วย tag ul, li

# ไฟล์ที่เกี่ยวข้อง
## menus.json
เก็บข้อมูลเมนู ในรูปแบบ json ซึ่งอาจจะอ่านมาจาก database ก็ได้
แต่ละเมนู จะต้องมี parent_id เพื่อบอกว่า ตัวมันเองเป็นเมนูย่อยของเมนูไหน ส่วนเมนูบนสุด ให้ parent_id = 0

## menus.php
เก็บ code

## aa.html 
เป็นตัวอย่างผลที่ได้ ไฟล์นี้ได้มาจากการ run command php.exe menus.php > aa.html

# อธิบายฟังก์ชั่น

## function buildtree
ทำหน้าที่แปลง array แบบ แบนๆ ให้เป็น array แบบ nested

## displayMenu
ทำหน้าที่แสดง menu ที่เป็นแบบ tree ออกมาด้วย tag ul และ li ด้วยวิธี recursive
