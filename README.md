# Cách sử dụng 

### 1. Clone hoặc tải zip mã nguồn về
### 2. Dùng terminal hoặc CMD cd vào thu mục có chứa file artisan
### 3. Chạy lệnh 
			#### composer install 
###	4. Copy file env vào trong thư mục đó
### 5. Tạo 1 cơ sở dữ liệu trong mysql tên là csv
### 6. Chạy lần lượt các câu lệnh sau :
			### php artisan migrate
			### php artisan db:seed
			### php artisan serve
	### Bắt đầu sử dụng ở localhost cổng 8000

@@ Lưu ý : Do nhóm sử dụng API của Cloudinary nên phần code up lên sẽ không có token
			để gửi ảnh lên cloud. Nếu muốn sử dụng tính năng này, bạn có thể tạo 1 tài khoản
			và điền các token còn thiếu vào file .env.