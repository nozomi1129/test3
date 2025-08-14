@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')

<div class="content">
    <div class="content__header">
        <h2 class="content__ttl">商品一覧</h2>
        <div class="content__nav">
            <a href="/register" class="btn-add">＋ 商品を追加</a>
        </div>
    </div>

    <div class="content__item">
        <aside class="search-item">
            <form action="/products/search" class="search-form" method="get">
            @csrf
                <div class="search-item__input">
                    <input class="search-form__item-input" type="text" name="search" value="{{ request('search') }}"placeholder="商品名で検索"/>
                </div>
                <div class="search-form__button">
                    <button class="search-form__button-submit" type="submit">検索</button>
                </div>
            </form>

            <p class="option-ttl">価格順で表示</p>
            <form action="" class="option-ls" method="">
            @csrf
                <select name="" class="search-item__select">
                    <option value="デフォルト">価格で並び替え</option>
                    <option value="高い順">高い順に表示</option>
                    <option value="低い順">低い順に表示</option>
                </select>
            </form>
        </aside>

        <main class="product-ls">
            <div class="card-ls">
            @foreach ($products as $product)
                <div class="product-card">
                    <a href="{{ route('product.show', ['id'=>$product->id]) }}" class="detail-link">
                        <div class="product-img">
                            <img class="img" src="{{ Storage::url($product->image) }}" alt="画像">
                        </div>
                        <div class="product-info">
                            <div class="info-name">
                                {{ $product['name'] }}
                            </div>
                            <div class="info-price">
                                ¥{{ $product['price'] }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
            <div class="page">{{ $products->appends(request()->query())->links() }}</div>

        </main>

    </div>
</div>






@endsection