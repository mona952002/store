@extends('layouts.admin')
@section('content')
    <div class="py-4">
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">أضف منتج جديد</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم المنتج</th>
                    <th scope="col">الصنف</th>
                    <th scope="col">السعر</th>
                    <th scope="col">الكمية</th>
                    <th scope="col">الأحداث</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>المنتج رقم {{$loop->iteration}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>
                            <a href="{{ route('products.destroy', $product->id)}}" class="btn btn-danger">احذف</a>
                            <a href="{{ route('products.edit', $product->id)}}" class="btn btn-info">تعديل</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$products->links()}}
    </div>
@endsection
