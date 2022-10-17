<div class="col-12 col-md-3 my-2">
    <div class="item-sidebar">
        <div class="item-sidebar-title text-uppercase text-bold bg-main text-white p-2">OUTSTANDING SERVICES</div>
        <div class="item-sidebar-content p-2">
        <div class="list-therapies">
            @foreach ($categoryhome as $cate)
            <a href="{{route('allListProCate', ['cate'=>$cate->slug])}}">
                <div class="item-therapy py-2 d-flex align-items-center">
                    <div class="item-img mr-2">
                        <img src="{{$cate->icon}}" alt="{{languageName($cate->name)}}" />
                    </div>
                    <h3 class="item-title text-main-dark m-0">{{languageName($cate->name)}}</h3>
                </div>
            </a>
            @endforeach
        </div>
        <div class="text-center mt-2">
            <a href="javascript:void(0);" class="btn bg-second text-white text-uppercase rung" data-toggle="modal" data-target="#exampleModal">Sign up for a trial</a>
        </div>
        </div>
    </div>
</div>