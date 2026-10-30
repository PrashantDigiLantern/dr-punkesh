@if(isset($blog) && count($blog) > 0)
  @foreach($blog as $bloglist)
    <div class="blogcolumn">
      <article class="blog-card">
        <div class="post-img">
          <a href="{{ url('/blog/'.$bloglist->url) }}">
            <img src="{{ url('backend/blog/'.$bloglist->blog_image) }}" class="img-fluid" loading="lazy" width="639" height="422" alt="{{ $bloglist->alt_image_name ?? $bloglist->blog_name }}" onerror="this.src='{{ asset('new-website/images/tab03.webp') }}'">
          </a>
        </div>
        <div class="blog-card-body">
          <div class="meta">
            <span class="date">
              <img src="{{ asset('new-website/images/calendar.webp') }}" loading="lazy" width="15" height="15" alt="Calendar"/> 
              {{ date("d-m-Y", strtotime($bloglist->date)) }}
            </span>
          </div>
          <h3 class="post-title">
            <a href="{{ url('/blog/'.$bloglist->url) }}">
              {!! $bloglist->blog_name !!}
            </a>
          </h3>
          <p>
            {!! \Illuminate\Support\Str::limit(strip_tags($bloglist->short_desc ?? $bloglist->blog_description), 130) !!}
          </p>
          <div class="post-footer">
            <a href="{{ url('/blog/'.$bloglist->url) }}" class="viewallbtn">Read More</a>
          </div>
        </div>
      </article>
    </div>
  @endforeach
@endif
