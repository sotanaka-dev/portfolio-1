@section('title', 'OrderHistory')

<div class="order-history container-mid">
    @include('components.flash-message')

    @forelse ($products->groupBy('order_id') as $key => $group)
        @if ($loop->first)
            <div class="order-history__select-box-wrap">
                <select class="order-history__select-box form-input form-input--circle" wire:model="interval">
                    <option value="">全期間</option>
                    @foreach ($years as $year)
                        <option value="{{ $year }}">{{ $year }}年</option>
                    @endforeach
                </select>
            </div>
        @endif

        <div class="order-history__item-group">
            @foreach ($group as $product)
                @if ($loop->first)
                    <div class="order-history__heading order-history__heading--top">
                        <p>
                            注文日時:&nbsp;{{ date('Y/m/d/H:i', strtotime($product->created_at)) }}
                        </p>
                        <p>
                            注文番号:&nbsp;{{ $key }}
                        </p>
                    </div>
                @endif

                <div class="order-history__item">
                    <div class="order-history__image-wrap">
                        <a href='{{ route('products.detail', ['id' => $product->id]) }}'>
                            <img class="order-history__image" src="{{ asset(current(glob($product->path . '*.*'))) }}">
                        </a>
                    </div>
                    <div class="order-history__info-group">
                        <p>{{ $product->name }}</p>
                        <p>&yen;{{ number_format($product->price) }}</p>
                        <p>数量:&nbsp;{{ $product->quantity }}点</p>
                    </div>
                </div>

                @if ($loop->last)
                    <div class="order-history__heading order-history__heading--bottom">
                        <p>
                            合計金額:&nbsp;&yen;{{ number_format($group->sum('price')) }}
                        </p>
                    </div>
                @endif
            @endforeach
        </div>
    @empty
        <div class="empty-item">
            <p class="empty-item__message"><i class="fa-solid fa-xmark fa-lg"></i>&nbsp;注文履歴がありません。</p>

            <a class="btn" href="{{ route('products') }}">商品一覧へ</a>
        </div>
    @endforelse
</div>
