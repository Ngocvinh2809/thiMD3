@extends('dashboard')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa Thông Tin Sản Phẩm</title>
</head>

<body>
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <h2 class="text-center">Sửa Thông Tin Sản Phẩm</h2>
                    <form action="{{ route('product.update', $product_models->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label class="form-label">Tên Sách</label>

                            <input name="name" type="text" class="form-control" value="{{ $product_models->name }}">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label class="form-label">ISBN</label>
                            <input name="book_id" type="text" class="form-control" value="{{ $product_models->book_id }}">
                        </div>
                        @error('book_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label class="form-label">Tác Giả</label>
                            <select name="author" >
                                <option value="Chơn">Chơn</option>
                                <option value="Luy">Luy</option>
                                <option value="Thuần">Thuần</option>
                                <option value="Dương">Dương</option>
                                <option value="Vinh">Vinh</option>
                            </select>
                        </div>
                        @error('author')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label class="form-label">Thể Loại</label>
                            <select name="category" >
                                <option value="Văn">Văn</option>
                                <option value="Toán">Toán</option>
                                <option value="Sử">Sử</option>
                                <option value="Địa">Địa</option>
                                <option value="Lý">Lý</option>
                            </select>
                        </div>
                        @error('category')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label class="form-label">Số Trang</label>
                            <input name="number_page" type="text" class="form-control" value="{{ $product_models->number_page }}">
                        </div>
                        @error('number_page')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label class="form-label">Năm Xuất Bản</label>
                            <input name="year" type="date" class="form-control" value="{{ $product_models->year }}"/>
                        </div>
                        @error('year')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary">Sửa</button>
                        <button class="btn btn-secondary" onclick="window.history.back(); return false">Hủy</button>
                    </form>
                </div>
                <div class="col-4"></div>
            </div>

        </div>
    @endsection
</body>

</html>
