@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')

<div class="content">
    <h2 class="content__ttl">商品登録</h2>

    <form class="content__form" action="/products/register" name="register" method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-item">
            <div class="form-item-label">
                <span class="label">商品名</span>
                <span class="label-required">必須</span>
            </div>
            <div class="form-item-input">
                <input type="text" name="name" class="form-text" value="{{ old('name') }}" placeholder="商品名を入力"/>
            </div>
            <div class="form-error">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form-item">
            <div class="form-item-label">
                <span class="label">値段</span>
                <span class="label-required">必須</span>
            </div>
            <div class="form-item-input">
                <input type="text" name="price" class="form-text" value="{{ old('price') }}" placeholder="値段を入力"/>
            </div>
            <div class="form-error">
                @error('price')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form-item">
            <div class="form-item-label">
                <span class="label">商品画像</span>
                <span class="label-required">必須</span>
            </div>
            <div class="form-item-input">
                <input type="file" name="image" class="form-file"/>
            </div>
            <div class="form-error">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form-item">
            <div class="form-item-label">
                <span class="label">季節</span>
                <span class="label-required">必須</span>
                <span class="label-required2">複数選択可</span>
            </div>
            <div class="form-item-checkbox">
                <label class="checkbox-item">
                    <input type="checkbox" name="season" class="form-checkbox" value="1" {{
                old('season')==1 ? 'checked' : '' }}>春
                </label>
                <label class="checkbox-item">
                    <input type="checkbox" name="season" class="form-checkbox" value="2" {{
                old('season')==2 ? 'checked' : '' }}>夏
                </label>
                <label class="checkbox-item">
                    <input type="checkbox" name="season" class="form-checkbox" value="3" {{
                old('season')==3 ? 'checked' : '' }}>秋
                </label>
                <label class="checkbox-item">
                    <input type="checkbox" name="season" class="form-checkbox" value="4" {{
                old('season')==4 ? 'checked' : '' }}>冬
                </label>
            </div>
            <div class="form-error">
                @error('season')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form-item">
            <div class="form-item-label">
                <span class="label">商品説明</span>
                <span class="label-required">必須</span>
            </div>
            <div class="form-item-input">
                <textarea name="description" rows="8" class="form-textarea" value="{{ old('description') }}" placeholder="商品の説明を入力"></textarea>
            </div>
            <div class="form-error">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form-btn">
            <div class="form-btn-back">
                <a href="/" class="btn-back">戻る</a>
            </div>
            <div class="form-btn-submit">
                <input type="submit" class="form-btn-register" value="登録"/>
            </div>
        </div>
    </form>
</div>






@endsection