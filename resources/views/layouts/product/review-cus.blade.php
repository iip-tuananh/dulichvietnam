<div class="slide-reviewcus owl-carousel owl-theme">
    @foreach ($reviewCus as $review)
    <div class="item">
        <div class="reviewcus p-3">
            <div class="reviewcus-image text-center">
            <img src="{{$review->avatar}}" alt="" loading="lazy">
            <p><strong>{{languageName($review->name)}}</strong></p>
            <p>{{languageName($review->position)}}</p>
            </div>
            <div class="reviewcus-content text-justify">
            {!!languageName($review->content)!!}
            </div>
        </div>
    </div>
    @endforeach
</div>