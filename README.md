# CSE485 - Phiếu 05 - MVC Mini

## Nội dung

Chuyển CRUD bảng `categories` của Phiếu 04 sang mô hình MVC Mini.

## Database

Sử dụng database đã tạo ở Phiếu 04:

- Database: `minishop_cse485`
- Table: `categories`
- User XAMPP: `root`
- Password: để trống

## Cấu trúc thư mục

```text
cse485-ms-05/
├── config/
│   └── database.php
├── models/
│   └── CategoryModel.php
├── controllers/
│   └── CategoryController.php
├── views/
│   └── category/
│       ├── index.php
│       ├── create.php
│       └── edit.php
├── public/
│   └── index.php
├── ARCHITECTURE.md
└── README.md
```

## Cách chạy

1. Chép thư mục `cse485-ms-05` vào `C:\xampp\htdocs`.
2. Bật Apache và MySQL trong XAMPP.
3. Đảm bảo database `minishop_cse485` và bảng `categories` đã có từ Phiếu 04.
4. Mở đường dẫn:

`http://localhost/cse485-ms-05/public/index.php?controller=category&action=index`

## URL sử dụng

- Danh sách:

`?controller=category&action=index`

- Thêm:

`?controller=category&action=create`

- Sửa:

`?controller=category&action=edit&id=1`

- Xóa dùng form POST tại trang danh sách.

## Checklist

- [x] Thêm category được.
- [x] Sửa category được.
- [x] Xóa category bằng POST và có confirm.
- [x] Flash Session hiện một lần sau redirect.
- [x] Model không echo HTML.
- [x] View không dùng PDO.
- [x] Có whitelist controller và action.
- [x] Có file `ARCHITECTURE.md`.
