# Kiến trúc MVC Mini

## Luồng thêm category

```text
Trình duyệt
    |
    | POST ?controller=category&action=create
    v
public/index.php
    |
    | kiểm tra whitelist
    v
CategoryController::create()
    |
    | gọi create()
    v
CategoryModel
    |
    | PDO INSERT
    v
MySQL minishop_cse485
    |
    | redirect + flash
    v
View danh sách category
```

## So sánh với Phiếu 04

1. Phiếu 04 để xử lý POST, SQL và HTML trong cùng một file.
2. Phiếu 05 đưa câu lệnh SQL vào `CategoryModel`.
3. `CategoryController` nhận dữ liệu và gọi Model.
4. Các file trong `views` chỉ hiển thị HTML và dữ liệu.
5. `public/index.php` nhận request và kiểm tra whitelist.
6. Cách tách này giúp code rõ hơn và dễ sửa từng phần hơn.
