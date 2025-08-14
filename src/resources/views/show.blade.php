@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}" />
@endsection

@section('content')

<div class="content">
    <nav class="content__nav">
        <ol class="breadcrumbs">
            <li class="nav-list">
                <a href="/" class="nav-link">商品一覧</a>
            </li>
            <span class="nav-right">></span>
            <li class="nav-list">
                {{ $product['name'] }}
            </li>
        </ol>
    </nav>

    <div class="content__main">
        <form class="update__form" action="{{ route('product.update', ['id'=>$product->id]) }}" name="update" method="post"  enctype="multipart/form-data">
        @method('PATCH')
        @csrf
            <div class="main__up">
                <div class="product-img">
                    <img class="form-img" src="{{ Storage::url($product->image) }}" alt="">
                    <input type="file" name="image" class="form-file" value="{{ $product['image'] }}"/>
                    <div class="form-error">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="product-detail">
                    <div class="detail-item">
                        <div class="label">商品名</div>
                        <input type="text" name="name" class="form-text" value="{{ $product['name'] }}"/>
                        <input type="hidden" name="id" value="{{ $product['id'] }}">
                        <div class="form-error">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="label">値段</div>
                        <input type="text" name="price" class="form-text" value="{{ $product['price'] }}"/>
                        <div class="form-error">
                            @error('price')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="label">季節</div>
                        @foreach ($seasons as $season)
                            <label class="checkbox-item">
                                <input type="checkbox" name="season[]" class="form-checkbox" value="{{ $season->id }}" {{ $product->season->contains($season->id) ? 'checked' : '' }}>{{ $season->name }}
                            </label>
                        @endforeach
                        <div class="form-error">
                            @error('season')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="main__down">
                <div class="detail-item">
                    <div class="label">商品説明</div>
                    <textarea name="description" rows="8" class="form-textarea" value="">{{ $product['description'] }}</textarea>
                    <div class="form-error">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="main__btn">
                <div class="form-btn-back">
                    <a href="/" class="btn-back">戻る</a>
                </div>
                <div class="form-btn-submit">
                    <input type="submit" class="form-btn-update" value="変更を保存"/>
                </div>
            </div>
        </form>
        <form class="delete__form" action="{{ route('product.delete', ['id'=>$product->id]) }}" name="delete" method="post">
        @method('delete')
        @csrf
            <input type="submit" class="delete-icon" value="🗑️">
        </form>
    </div>
</div>







@endsection