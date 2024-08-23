<div class="">
    @if (count($categories) > 0)
        <div class="px-2 py-1 text-uppercase fs-10 text-right text-muted bg-soft-secondary">{{translate('Category Suggestions')}}</div>
        <ul class="list-group list-group-raw">
            @foreach ($categories as $key => $category)
                <li class="list-group-item py-1">
                    @if($request_type == "Product")
                        <a class="text-reset hov-text-primary" href="{{ route('products.category', $category->slug) }}">{{ $category->getTranslation('name') }}</a>
                    @else
                        <a class="text-reset hov-text-primary" href="{{ route('services.servicecategory', $category->slug) }}">{{ $category->getTranslation('name') }}</a>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</div>

<div class="">
    @if (sizeof($keywords) > 0)
        <div class="px-2 py-1 text-uppercase fs-10 text-right text-muted bg-soft-secondary">{{translate('Popular Suggestions')}}</div>
        <ul class="list-group list-group-raw">
            @foreach ($keywords as $key => $keyword)
                <li class="list-group-item py-1">
                        <a class="text-reset hov-text-primary" href="{{ route('suggestion.search', [$keyword, $request_type]) }}">{{ $keyword }}</a>
                    
                </li>
            @endforeach
        </ul>
    @endif
</div>


