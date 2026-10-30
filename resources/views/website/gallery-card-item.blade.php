@if(isset($gallery) && count($gallery) > 0)
  @foreach($gallery as $val)
    <div class="serviceitem">
      <div class="serviceimg">
        <img src="{{ url('backend/gallery/'.$val->full_image) }}" class="img-fluid" width="600" height="427" alt="{{ $val->gallery_name ?? 'Clinic Gallery' }}" onerror="this.src='{{ asset('new-website/images/gallery/gallery01.webp') }}'"/>
      </div>
      @if(!empty($val->gallery_name))
        <div class="details position-relative">
          <div class="sheading">{{ $val->gallery_name }}</div>
        </div>
      @endif
    </div>
  @endforeach
@endif
