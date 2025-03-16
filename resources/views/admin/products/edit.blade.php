@extends('layouts.admin')
@section('content')
    <div class="py-3">
        <form action="{{ url('products/update/' . $products->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="nameFormControlInput" class="form-label">اسم المنتج</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $products->name }}">
            </div>
            <div class="mb-3">
                <label for="quantityFormControlInput" class="form-label">الكمية</label>
                <input type="number" class="form-control" id="quantity" name="quantity"
                    value="{{ $products->quantity }}">
            </div>
            <div class="mb-3">
                <label for="priceFormControlInput" class="form-label">السعر</label>
                <input type="number" class="form-control" id="price" name="price"
                    value="{{ $products->price }}">
            </div>
            <div class="mb-3">
                <label for="descriptionFormControlTextarea" class="form-label">وصف المنتج</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $products->description }}</textarea>
            </div>
            <div class="mb3">
                <label for="selectProductFormControlTextarea" class="form-label">اختر الصنف</label>
                <select class="form-control mb-3" name="category" id="category">
                    <option value="{{$category_name->id}}">{{$category_name->name}}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input type="submit" value="احفظ" class="btn btn-info">
            </div>
        </form>
    </div>
@endsection
