@if(isset($testimonial) && count($testimonial) > 0)
    @foreach($testimonial as $item)
        @php
            $ratingCount = (int)($item->rating ?? 5);
            if ($ratingCount <= 0 || $ratingCount > 5) $ratingCount = 5;
        @endphp
        <div class="testi-card">
            <div class="testi-card-top">
                <div class="testi-stars">{!! str_repeat('&#9733;', $ratingCount) !!}</div>
                <div class="googlelogo">
                    <img src="{{ asset('new-website/images/googlelogo.webp') }}" loading="lazy" width="75" height="26" alt="Google" />
                </div>
            </div>
            <div class="testi-card-text">
                {!! $item->description !!}
            </div>
            <div class="testidisclaimers">&#10033; Opinions/Results may vary from person to person.</div>
            <h4 class="testi-author-name">{{ strtoupper($item->name ?? $item->short_name) }}</h4>
        </div>
    @endforeach
@endif
