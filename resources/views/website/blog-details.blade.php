@include('website.header')

<!-- CSS Stylesheet -->
<link rel="stylesheet" href="{{ asset('new-website/css/bloginner.css') }}" />

<style>
    .article-content h2 {
        scroll-margin-top: 110px;
        font-family: var(--font-heading, "Playfair Display", serif);
        font-size: 24px;
        font-weight: 600;
        text-transform: uppercase;
        line-height: 1.4;
        color: var(--default-color, #2C2520);
        margin: 28px 0 14px 0;
    }

    .article-content h2:first-child {
        margin-top: 0;
    }

    .article-body-wrapper {
        background: #ffffff;
        border-radius: 8px;
        padding: 35px 40px;
        border: 1px solid #EAE1D0;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        font-size: 16px;
        line-height: 1.8;
        color: #333333;
        width: 100%;
        box-sizing: border-box;
    }

    .article-body-wrapper img {
        max-width: 100%;
        height: auto;
        border-radius: 6px;
        margin: 15px 0;
    }

    .article-body-wrapper table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        overflow-x: auto;
        display: block;
    }

    .article-body-wrapper th,
    .article-body-wrapper td {
        border: 1px solid #EAE1D0;
        padding: 10px 14px;
        font-size: 15px;
    }

    .article-body-wrapper th {
        background-color: #F8F3EA;
        color: #2C2520;
        font-weight: 600;
    }

    .bloginner-full-content {
        width: 100%;
        max-width: 100%;
    }

    .toc-toggle-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease;
    }

    .toc-sidebar.active .toc-toggle-icon,
    .toc-sidebar.open .toc-toggle-icon {
        transform: rotate(180deg);
    }
</style>

@php
    $tocItems = [];
    $rawContent = $bloglist->blog_description ?? '';
    $index = 1;

    // Extract all <h2> tags and inject unique anchor IDs
    $contentWithIds = preg_replace_callback(
        '/<h2([^>]*)>(.*?)<\/h2>/is',
        function ($matches) use (&$tocItems, &$index) {
            $rawAttrs = $matches[1];
            $innerHtml = $matches[2];
            $title = trim(strip_tags(html_entity_decode($innerHtml, ENT_QUOTES, 'UTF-8')));
            $title = trim(preg_replace('/\s+/', ' ', $title));

            if (empty($title)) {
                return $matches[0];
            }

            $slug = 'section-' . $index;
            $tocItems[] = [
                'id' => $slug,
                'title' => $title,
            ];
            $index++;

            if (preg_match('/id=[\'"][^\'"]*[\'"]/i', $rawAttrs)) {
                $newAttrs = preg_replace('/id=[\'"][^\'"]*[\'"]/i', 'id="' . $slug . '"', $rawAttrs);
            } else {
                $newAttrs = ' id="' . $slug . '"' . $rawAttrs;
            }

            if (!str_contains($newAttrs, 'article-section-title')) {
                if (preg_match('/class=[\'"]([^\'"]*)[\'"]/i', $newAttrs, $cMatches)) {
                    $newAttrs = preg_replace(
                        '/class=[\'"][^\'"]*[\'"]/i',
                        'class="' . trim($cMatches[1]) . ' article-section-title"',
                        $newAttrs,
                    );
                } else {
                    $newAttrs .= ' class="article-section-title"';
                }
            }

            return '<h2' . $newAttrs . '>' . $innerHtml . '</h2>';
        },
        $rawContent,
    );

    $hasH2 = count($tocItems) > 0;
@endphp

<main class="main">

    <section class="bloginnerpage">
        <div class="container">

            <!-- Featured Image & Header 2-Column White Card Frame -->
            <div class="bloginner-featured-card">

                <!-- Column 1: Featured Image -->
                <div class="featured-img-wrap">
                    <img src="{{ url('backend/blog/' . ($bloglist->blog_image_inner ?? $bloglist->blog_image)) }}"
                        width="800" height="632" alt="{{ $bloglist->alt_image_name ?? $bloglist->blog_name }}"
                        onerror="this.src='{{ asset('new-website/images/tab03.webp') }}'">
                </div>

                <!-- Column 2: Hero Header -->
                <div class="bloginner-hero-header">

                    <section class="breadcrumbsection">
                        <div class="breadcrumbcontainer">
                            <ul class="breadcrumblist">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}" class="breadcrumb-link">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ url('blogs') }}" class="breadcrumb-link">Blogs</a>
                                </li>
                                <li class="breadcrumb-item active">{{ $bloglist->blog_name }}</li>
                            </ul>
                        </div>
                    </section>

                    <div class="bloginner-meta-row">
                        <div class="meta-pill">
                            <span>By <strong class="highlight-author">Dr. Punkesh Clinic</strong></span>
                        </div>
                        <div class="meta-pill">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <span>{{ date('d M Y', strtotime($bloglist->date)) }}</span>
                        </div>
                        <div class="meta-pill">
                            <span>Medically Reviewed by <strong class="highlight-author">Dr. Punkesh</strong></span>
                        </div>
                    </div>

                    <h1 class="bloginner-main-title">{!! $bloglist->blog_name !!}</h1>

                    <!-- Share Section -->
                    <div class="bloginner-share-block">
                        <h4 class="share-title-heading">Share</h4>
                        <div class="share-links-list">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                target="_blank" rel="noopener" class="share-link-item">
                                <span class="share-icon-circle facebook">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="#1877F2">
                                        <path
                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                    </svg>
                                </span>
                                <span class="share-name">Facebook</span>
                            </a>

                            <a href="https://api.whatsapp.com/send?text={{ urlencode($bloglist->blog_name . ' ' . url()->current()) }}"
                                target="_blank" rel="noopener" class="share-link-item">
                                <span class="share-icon-circle whatsapp">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="#25D366">
                                        <path
                                            d="M12.031 0C5.404 0 0 5.394 0 12.016c0 2.115.551 4.175 1.597 5.986L0 24l6.166-1.618a11.97 11.97 0 005.865 1.535c6.627 0 12.031-5.394 12.031-12.016C24.062 5.394 18.658 0 12.031 0zm0 22.022a9.96 9.96 0 01-5.076-1.391l-.364-.216-3.766.988 1.006-3.67-.238-.379a9.948 9.948 0 01-1.522-5.336c0-5.508 4.482-9.99 9.96-9.99 5.478 0 9.96 4.482 9.96 9.99 0 5.508-4.482 9.99-9.96 9.99zm5.46-7.48c-.299-.149-1.767-.872-2.041-.971-.274-.1-.473-.149-.672.149-.199.299-.772.971-.947 1.17-.174.199-.349.224-.648.075-.299-.149-1.262-.465-2.403-1.484-.888-.792-1.488-1.77-1.662-2.069-.174-.299-.019-.461.13-.61.135-.133.299-.349.448-.523.149-.174.199-.299.299-.498.099-.199.05-.373-.025-.523-.075-.149-.672-1.62-.921-2.217-.243-.583-.49-.504-.672-.514-.174-.01-.373-.01-.572-.01s-.523.075-.797.373c-.274.299-1.046 1.021-1.046 2.49 0 1.47 1.071 2.89 1.221 3.089.149.199 2.109 3.22 5.109 4.516.713.308 1.27.493 1.704.63.716.228 1.368.196 1.883.119.575-.086 1.767-.722 2.016-1.42.249-.697.249-1.294.174-1.42-.075-.125-.274-.199-.573-.348z" />
                                    </svg>
                                </span>
                                <span class="share-name">WhatsApp</span>
                            </a>

                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($bloglist->blog_name) }}&url={{ urlencode(url()->current()) }}"
                                target="_blank" rel="noopener" class="share-link-item">
                                <span class="share-icon-circle twitter">
                                    <svg width="17" height="17" viewBox="0 0 24 24" fill="#000000">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg>
                                </span>
                                <span class="share-name">Twitter</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Layout: With TOC Sidebar if H2 exists, otherwise Full Width -->
            @if ($hasH2)
                <div class="bloginner-details-grid">

                    <!-- Left Sidebar: Table of Contents -->
                    <aside class="toc-sidebar" id="tocSidebar">
                        <div class="toc-header" id="tocHeader" onclick="toggleToc(event)" style="cursor: pointer;">
                            <h3 class="toc-title">TABLE OF CONTENTS</h3>
                            <span class="toc-toggle-icon" aria-hidden="true">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M6 9l6 6 6-6" />
                                </svg>
                            </span>
                        </div>
                        <ul class="toc-list" id="tocList">
                            @foreach ($tocItems as $key => $item)
                                <li class="toc-item {{ $key === 0 ? 'active' : '' }}">
                                    <a href="#{{ $item['id'] }}" class="toc-link">{{ $item['title'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </aside>

                    <!-- Right Column: Blog Article Body Content -->
                    <article class="article-content">
                        <div class="article-body-wrapper">
                            {!! $contentWithIds !!}
                        </div>
                    </article>

                </div>
            @else
                <!-- Full Width Layout when NO H2 exists -->
                <div class="bloginner-full-content">
                    <article class="article-content" style="width: 100%;">
                        <div class="article-body-wrapper">
                            {!! $contentWithIds !!}
                        </div>
                    </article>
                </div>
            @endif

        </div>
    </section>

    @if (isset($blog1) && count($blog1) > 0)
        <!-- Start of Recent Posts Section -->
        <section class="recent-posts-section">
            <div class="container">
                <h2 class="recent-posts-heading">Recent Posts</h2>

                <div class="recent-posts-grid">
                    @foreach ($blog1 as $recent)
                        @if ($recent->url !== $bloglist->url)
                            <article class="recent-post-card">
                                <a href="{{ url('blog/' . $recent->url) }}" class="recent-card-img-link">
                                    <div class="recent-card-img-wrap">
                                        <img src="{{ url('backend/blog/' . ($recent->blog_image_inner ?? $recent->blog_image)) }}"
                                            width="800" height="632"
                                            alt="{{ $recent->alt_image_name ?? $recent->blog_name }}"
                                            class="recent-post-img" loading="lazy"
                                            onerror="this.src='{{ asset('new-website/images/tab03.webp') }}'">
                                    </div>
                                </a>
                                <div class="recent-card-body">
                                    <span
                                        class="recent-date-badge">{{ date('d M Y', strtotime($recent->date)) }}</span>
                                    <h3 class="recent-card-title">
                                        <a
                                            href="{{ url('blog/' . $recent->url) }}">{{ $recent->blog_name ?? $recent->name }}</a>
                                    </h3>
                                </div>
                            </article>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Start of Appointment form -->
    @include('website.common-appointment')

</main>

@if ($hasH2)
    <!-- Table of Contents Accordion & Scroll Highlighting Script -->
    <script>
        function toggleToc(e) {
            if (e) {
                if (typeof e.preventDefault === 'function') e.preventDefault();
                if (typeof e.stopPropagation === 'function') e.stopPropagation();
            }
            var sidebar = document.getElementById('tocSidebar');
            if (sidebar) {
                sidebar.classList.toggle('active');
                sidebar.classList.toggle('open');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var tocSidebar = document.getElementById('tocSidebar');
            if (!tocSidebar) return;

            var tocLinks = tocSidebar.querySelectorAll('.toc-link');

            // Smooth scroll and active state on click
            tocLinks.forEach(function(link) {
                link.addEventListener('click', function(e) {
                    var targetId = link.getAttribute('href');
                    if (targetId && targetId.startsWith('#')) {
                        var targetEl = document.querySelector(targetId);
                        if (targetEl) {
                            e.preventDefault();
                            var headerOffset = 110;
                            var elementPosition = targetEl.getBoundingClientRect().top;
                            var offsetPosition = elementPosition + window.pageYOffset -
                                headerOffset;
                            window.scrollTo({
                                top: offsetPosition,
                                behavior: 'smooth'
                            });
                        }
                    }

                    tocSidebar.querySelectorAll('.toc-item').forEach(function(item) {
                        item.classList.remove('active');
                    });
                    var parentItem = link.closest('.toc-item');
                    if (parentItem) {
                        parentItem.classList.add('active');
                    }

                    if (window.innerWidth <= 991.98) {
                        tocSidebar.classList.remove('active');
                        tocSidebar.classList.remove('open');
                    }
                });
            });

            // Update active link on scroll
            var sections = [];
            tocLinks.forEach(function(link) {
                var href = link.getAttribute('href');
                if (href && href.startsWith('#')) {
                    var el = document.querySelector(href);
                    if (el) sections.push({
                        el: el,
                        link: link
                    });
                }
            });

            if (sections.length > 0) {
                var scrollTimer = null;
                window.addEventListener('scroll', function() {
                    if (scrollTimer) return;
                    scrollTimer = setTimeout(function() {
                        scrollTimer = null;
                        var scrollPos = window.scrollY + 140;
                        for (var i = sections.length - 1; i >= 0; i--) {
                            if (sections[i].el.offsetTop <= scrollPos) {
                                tocSidebar.querySelectorAll('.toc-item').forEach(function(item) {
                                    item.classList.remove('active');
                                });
                                var p = sections[i].link.closest('.toc-item');
                                if (p) p.classList.add('active');
                                break;
                            }
                        }
                    }, 50);
                });
            }
        });
    </script>
@endif

@include('website.footer')
