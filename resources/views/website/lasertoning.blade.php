@php
    $transparentHeader = true;
@endphp

@include('website.header')

<!-- CSS Stylesheet -->
<link href="{{ asset('new-website/css/serviceinner.css') }}" rel="stylesheet"/>

<!-- Start of Hero Banner Section -->
<section class="Firstbannersection">
    <!-- Background Image Wrapper -->
    <div class="serviceherobgwrap">
        <picture>
            <source media="(max-width: 767.98px)"
                srcset="{{ asset('new-website/images/serviceinner/mobileserviceinnerbg.webp') }}" width="402"
                height="720">
            @if (!empty($servicedetail->service_banner_image))
                <img src="{{ url('backend/service/banner/' . $servicedetail->service_banner_image) }}"
                    class="serviceherobgimg" width="1600" height="667" loading="eager" decoding="async"
                    fetchpriority="high" alt="{{ $servicedetail->service_name }}"
                    onerror="this.src='{{ asset('new-website/images/serviceinner/serviceinnerbg.webp') }}'" />
            @else
                <img src="{{ asset('new-website/images/serviceinner/serviceinnerbg.webp') }}" class="serviceherobgimg"
                    width="1600" height="667" loading="eager" decoding="async" fetchpriority="high"
                    alt="{{ $servicedetail->service_name }}" />
            @endif
        </picture>
    </div>

    <!-- Gradient Overlay for enhanced contrast -->
    <div class="serviceherooverlay"></div>

    <!-- Hero Content Container -->
    <div class="serviceherocontainer">
        <div class="serviceherocontent">
            <h1 class="serviceherotitle">
                <span class="text-white">{{ $servicedetail->service_name }}</span>
            </h1>
            <div class="serviceherobtnwrap">
                <a href="{{ url('schedule-a-consultation') }}" class="serviceherobtn">REQUEST AN APPOINTMENT</a>
            </div>
        </div>

        <!-- Breadcrumb at Bottom Left of Banner -->
        <nav class="serviceherobreadcrumb" aria-label="breadcrumb">
            <ol class="serviceherobreadcrumblist">
                <li class="serviceherobreadcrumbitem">
                    <a href="{{ url('/') }}" class="serviceherobreadcrumblink">Home</a>
                </li>
                <li class="serviceherobreadcrumbsep" aria-hidden="true">|</li>
                @if ($servicedetail->category_type == 'secondcategory' && isset($serviceMain))
                    <li class="serviceherobreadcrumbitem">
                        <a href="{{ url('/treatments/' . $serviceMain->url) }}"
                            class="serviceherobreadcrumblink">{{ $serviceMain->service_name }}</a>
                    </li>
                    <li class="serviceherobreadcrumbsep" aria-hidden="true">|</li>
                @elseif($servicedetail->category_type == 'service' && isset($service_cat) && isset($serviceMain))
                    <li class="serviceherobreadcrumbitem">
                        <a href="{{ url('/' . $service_cat->url . '/' . $serviceMain->url) }}"
                            class="serviceherobreadcrumblink">{{ $serviceMain->service_name }}</a>
                    </li>
                    <li class="serviceherobreadcrumbsep" aria-hidden="true">|</li>
                @else
                    <li class="serviceherobreadcrumbitem">
                        <a href="{{ url('treatments') }}" class="serviceherobreadcrumblink">Treatments</a>
                    </li>
                    <li class="serviceherobreadcrumbsep" aria-hidden="true">|</li>
                @endif
                <li class="serviceherobreadcrumbitem active" aria-current="page">{{ $servicedetail->service_name }}
                </li>
            </ol>
        </nav>
    </div>
</section>
<!-- // End of Hero Banner -->

<!-- Sub-heading & Intro Section -->
@if (!empty($servicedetail->sub_heading) || !empty($servicedetail->short_desc))
    <section class="serviceinnerfirstsection">
        <div class="serviceinnerfirstcontainer">
            @if (!empty($servicedetail->sub_heading))
                <div class="serviceinnerfirstheader">
                    <h2 class="serviceinnerfirsttitle">
                        {!! $servicedetail->sub_heading !!}
                    </h2>
                </div>
            @endif

            @if (!empty($servicedetail->short_desc))
                <div class="serviceinnerfirstcontent">
                    <div class="serviceinnerfirstp">
                        {!! $servicedetail->short_desc !!}
                    </div>
                </div>
            @endif
        </div>
    </section>
@endif

<!-- Dynamic Sections from CMS -->
@if (isset($servicedetail->section))
    @php
        $sersection = json_decode($servicedetail->section);
        $sersectionorder = collect($sersection)->sortBy('secorderby');
    @endphp

    @foreach ($sersectionorder as $key => $sersectionlist)
        @php
            $classAdd = $sersectionlist->class_add ?? '';
            $secHeading = $sersectionlist->section_heading ?? '';
            $isDosAndDonts =
                stripos($secHeading, 'dos and dont') !== false || stripos($secHeading, 'dos and don\'t') !== false;
            $isProcessCare =
                stripos($secHeading, 'during the process') !== false ||
                stripos($secHeading, 'post-treatment care') !== false;
        @endphp

        {{-- Section 4: Dos and Don'ts Carousel Slider --}}
        @if ($isDosAndDonts && !empty($sersectionlist->section1))
            @php
                preg_match_all(
                    '/<p>\s*(\d+)[\.\s]+(.*?)<\/p>/is',
                    $sersectionlist->section1,
                    $dosMatches,
                    PREG_SET_ORDER,
                );
            @endphp
            @if (count($dosMatches) > 0)
                <section class="serviceinnerfourthsection {{ $classAdd }}">
                    <div class="serviceinnerfourthcontainer">
                        <div class="serviceinnerfourthheader">
                            <h2 class="serviceinnerfourthtitle">{!! $secHeading !!}</h2>
                        </div>

                        <div class="serviceinnerfourthsliderwrap">
                            <div class="serviceinnerfourthtrackwrap">
                                <div id="serviceinnerfourthtrack" class="serviceinnerfourthcardstrack">
                                    @foreach ($dosMatches as $dIdx => $dCard)
                                        <div class="serviceinnerfourthcard">
                                            <div class="serviceinnerfourthbadge">{{ sprintf('%02d', $dCard[1]) }}</div>
                                            <div class="serviceinnerfourthcardp">
                                                {!! $dCard[2] !!}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="serviceinnerfourthsliderbars"></div>
                        </div>

                        <div class="serviceinnerfourthbtnwrap">
                            <a href="{{ url('schedule-a-consultation') }}" class="serviceinnerfourthbtn">REQUEST AN
                                APPOINTMENT</a>
                        </div>
                    </div>
                </section>
                @continue
            @endif
        @endif

        {{-- Section 5: During The Process and Post-Treatment Care --}}
        @if ($isProcessCare && (!empty($sersectionlist->section1) || !empty($sersectionlist->section2)))
            @php
                $careContent = ($sersectionlist->section1 ?? '') . ($sersectionlist->section2 ?? '');
                preg_match_all('/<li[^>]*>(.*?)<\/li>/is', $careContent, $careItems, PREG_SET_ORDER);
            @endphp
            @if (count($careItems) > 0)
                <section class="serviceinnerfivethsection {{ $classAdd }}">
                    <div class="serviceinnerfivethcontainer">
                        <div class="serviceinnerfivethheader">
                            <h2 class="serviceinnerfivethtitle">{!! $secHeading !!}</h2>
                        </div>

                        <div class="serviceinnerfivethgrid">
                            @foreach ($careItems as $cItem)
                                <div class="serviceinnerfivethcard">
                                    <div class="serviceinnerfivethbadge">
                                        <svg width="13" height="10" viewBox="0 0 13 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.5 5.2L4.6 8.3L11.5 1.5" stroke="#FFFFFF" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="serviceinnerfivethcardp">
                                        {!! $cItem[1] !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                @continue
            @endif
        @endif

        {{-- Section: Two Paragraph Different Layout (Service Inner Second Section) --}}
        @if ($sersectionlist->type == 'twoparagraphdifflayout')
            <section class="serviceinnersecondsection {{ $classAdd }}">
                <div class="serviceinnersecondcontainer">
                    <div class="serviceinnersecondgrid">
                        <div class="serviceinnersecondleft">
                            @if (!empty($sersectionlist->section_heading))
                                <h2 class="serviceinnersecondtitle">
                                    {!! $sersectionlist->section_heading !!}
                                </h2>
                            @endif
                            @if (isset($sersectionlist->section1))
                                <div class="serviceinnersecondp">
                                    {!! $sersectionlist->section1 !!}
                                </div>
                            @endif
                            <div class="serviceinnersecondbtnwrap">
                                <a href="{{ url('schedule-a-consultation') }}" class="serviceinnersecondbtn">REQUEST
                                    AN APPOINTMENT</a>
                            </div>
                        </div>

                        <div class="serviceinnersecondright">
                            <div class="serviceinnersecondcard">
                                @if (!empty($sersectionlist->service_heading1))
                                    <h3 class="serviceinnersecondcardtitle">
                                        {!! $sersectionlist->service_heading1 !!}
                                    </h3>
                                @endif
                                @if (isset($sersectionlist->section2))
                                    <div class="serviceinnersecondcardp">
                                        {!! $sersectionlist->section2 !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{-- Section: Two Paragraph (Service Inner Third Section with Two Columns) --}}
        @if ($sersectionlist->type == 'twoparagraph')
            <section class="serviceinnerthirdsection {{ $classAdd }}">
                <div class="serviceinnerthirdcontainer">
                    <div class="serviceinnerthirdcard">
                        @if (!empty($sersectionlist->section_heading))
                            <div class="serviceinnerthirdheader">
                                <h2 class="serviceinnerthirdtitle">{!! $sersectionlist->section_heading !!}</h2>
                            </div>
                        @endif
                        <div class="serviceinnerthirdcontent serviceinnerthirdtwocol">
                            <div class="serviceinnerthirdcol">{!! $sersectionlist->section1 ?? '' !!}</div>
                            <div class="serviceinnerthirdcol">{!! $sersectionlist->section2 ?? '' !!}</div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{-- Section: Full Text (If it contains <ul><li>, render as Section 5 Cards Grid) --}}
        @if ($sersectionlist->type == 'fulltext')
            @php
                $hasUl = !empty($sersectionlist->section1) && stripos($sersectionlist->section1, '<ul') !== false;
                $fullTextCards = [];
                $introText = '';
                $outroText = '';

                if ($hasUl) {
                    $ulSplit = preg_split('/<ul[^>]*>/i', $sersectionlist->section1, 2);
                    $introText = trim($ulSplit[0] ?? '');
                    $ulRest = $ulSplit[1] ?? '';
                    $closeUlSplit = preg_split('/<\/ul>/i', $ulRest, 2);
                    $ulContent = $closeUlSplit[0] ?? '';
                    $outroText = trim($closeUlSplit[1] ?? '');

                    preg_match_all('/<li[^>]*>(.*?)<\/li>/is', $ulContent, $liResults);
                    $fullTextCards = $liResults[1] ?? [];
                }
            @endphp

            @if ($hasUl && count($fullTextCards) > 0)
                <section class="serviceinnerfivethsection {{ $classAdd }}">
                    <div class="serviceinnerfivethcontainer">
                        @if (!empty($sersectionlist->section_heading))
                            <div class="serviceinnerfivethheader">
                                <h2 class="serviceinnerfivethtitle">{!! $sersectionlist->section_heading !!}</h2>
                            </div>
                        @endif

                        @if (!empty($introText) && strip_tags($introText) !== '')
                            <div class="serviceinnerfirstcontent serviceinner-mb-30">
                                <div class="serviceinnerfirstp">
                                    {!! $introText !!}
                                </div>
                            </div>
                        @endif

                        <div class="serviceinnerfivethgrid">
                            @foreach ($fullTextCards as $cardItem)
                                <div class="serviceinnerfivethcard">
                                    <div class="serviceinnerfivethbadge">
                                        <svg width="13" height="10" viewBox="0 0 13 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.5 5.2L4.6 8.3L11.5 1.5" stroke="#FFFFFF" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="serviceinnerfivethcardp">
                                        {!! $cardItem !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if (!empty($outroText) && strip_tags($outroText) !== '')
                            <div class="serviceinnerfirstcontent serviceinner-mt-30">
                                <div class="serviceinnerfirstp">
                                    {!! $outroText !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </section>
            @else
                <section class="serviceinnerthirdsection {{ $classAdd }}">
                    <div class="serviceinnerthirdcontainer">
                        <div class="serviceinnerthirdcard">
                            @if (!empty($sersectionlist->section_heading))
                                <div class="serviceinnerthirdheader">
                                    <h2 class="serviceinnerthirdtitle">{!! $sersectionlist->section_heading !!}</h2>
                                </div>
                            @endif
                            <div class="serviceinnerthirdcontent">
                                <div class="serviceinnerthirdp">
                                    {!! $sersectionlist->section1 ?? '' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endif

        {{-- Section: Right Image Text --}}
        @if ($sersectionlist->type == 'rightimagetext')
            <section class="serviceinnersecondsection {{ $classAdd }}">
                <div class="serviceinnersecondcontainer">
                    <div class="serviceinnersecondgrid">
                        <div class="serviceinnersecondleft">
                            @if (!empty($sersectionlist->section_heading))
                                <h2 class="serviceinnersecondtitle">{!! $sersectionlist->section_heading !!}</h2>
                            @endif
                            <div class="serviceinnersecondp">
                                {!! $sersectionlist->section1 ?? '' !!}
                            </div>
                            <div class="serviceinnersecondbtnwrap">
                                <a href="{{ url('schedule-a-consultation') }}" class="serviceinnersecondbtn">REQUEST
                                    AN APPOINTMENT</a>
                            </div>
                        </div>
                        <div class="serviceinnersecondright serviceinnerimagewrap">
                            <img src="{{ url('backend/service/section/' . $sersectionlist->image) }}"
                                alt="{{ $sersectionlist->section_heading ?? 'Treatment' }}" class="serviceinnerimg"
                                loading="lazy">
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{-- Section: Left Image Text --}}
        @if ($sersectionlist->type == 'imagetext')
            <section class="serviceinnersecondsection {{ $classAdd }}">
                <div class="serviceinnersecondcontainer">
                    <div class="serviceinnersecondgrid">
                        <div class="serviceinnersecondleft serviceinnerimagewrap">
                            <img src="{{ url('backend/service/section/' . $sersectionlist->image) }}"
                                alt="{{ $sersectionlist->section_heading ?? 'Treatment' }}" class="serviceinnerimg"
                                loading="lazy">
                        </div>
                        <div class="serviceinnersecondright">
                            @if (!empty($sersectionlist->section_heading))
                                <h2 class="serviceinnersecondtitle">{!! $sersectionlist->section_heading !!}</h2>
                            @endif
                            <div class="serviceinnersecondp serviceinner-mt-15">
                                {!! $sersectionlist->section1 ?? '' !!}
                            </div>
                            <div class="serviceinnersecondbtnwrap serviceinner-mt-25">
                                <a href="{{ url('schedule-a-consultation') }}" class="serviceinnersecondbtn">REQUEST
                                    AN APPOINTMENT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{-- Section: Left Heading --}}
        @if ($sersectionlist->type == 'leftheading')
            @php
                $hasLeftUl = !empty($sersectionlist->section1) && stripos($sersectionlist->section1, '<ul') !== false;
                $leftCards = [];
                $leftIntro = '';
                $leftOutro = '';

                if ($hasLeftUl) {
                    $ulSplit = preg_split('/<ul[^>]*>/i', $sersectionlist->section1, 2);
                    $leftIntro = trim($ulSplit[0] ?? '');
                    $ulRest = $ulSplit[1] ?? '';
                    $closeUlSplit = preg_split('/<\/ul>/i', $ulRest, 2);
                    $ulContent = $closeUlSplit[0] ?? '';
                    $leftOutro = trim($closeUlSplit[1] ?? '');

                    preg_match_all('/<li[^>]*>(.*?)<\/li>/is', $ulContent, $liResults);
                    $leftCards = $liResults[1] ?? [];
                }
            @endphp

            @if ($hasLeftUl && count($leftCards) > 0)
                <section class="serviceinnerfivethsection {{ $classAdd }}">
                    <div class="serviceinnerfivethcontainer">
                        @if (!empty($sersectionlist->section_heading))
                            <div class="serviceinnerfivethheader">
                                <h2 class="serviceinnerfivethtitle">{!! $sersectionlist->section_heading !!}</h2>
                            </div>
                        @endif

                        @if (!empty($leftIntro) && strip_tags($leftIntro) !== '')
                            <div class="serviceinnerfirstcontent serviceinner-mb-30">
                                <div class="serviceinnerfirstp">
                                    {!! $leftIntro !!}
                                </div>
                            </div>
                        @endif

                        <div class="serviceinnerfivethgrid">
                            @foreach ($leftCards as $cardItem)
                                <div class="serviceinnerfivethcard">
                                    <div class="serviceinnerfivethbadge">
                                        <svg width="13" height="10" viewBox="0 0 13 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.5 5.2L4.6 8.3L11.5 1.5" stroke="#FFFFFF" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="serviceinnerfivethcardp">
                                        {!! $cardItem !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if (!empty($leftOutro) && strip_tags($leftOutro) !== '')
                            <div class="serviceinnerfirstcontent serviceinner-mt-30">
                                <div class="serviceinnerfirstp">
                                    {!! $leftOutro !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </section>
            @else
                <section class="serviceinnerthirdsection {{ $classAdd }}">
                    <div class="serviceinnerthirdcontainer">
                        <div class="serviceinnerthirdcard">
                            @if (!empty($sersectionlist->section_heading))
                                <div class="serviceinnerthirdheader">
                                    <h2 class="serviceinnerthirdtitle">{!! $sersectionlist->section_heading !!}</h2>
                                </div>
                            @endif
                            <div class="serviceinnerthirdcontent">
                                <div class="serviceinnerthirdp">
                                    {!! $sersectionlist->section1 ?? '' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endif
    @endforeach
@endif

<!-- FAQs Section -->
@if (isset($servicefaqs) && count($servicefaqs) > 0)
    <section class="serviceinnersixthsection">
        <div class="container">
            <div class="faqheader">
                <h2>Frequently Asked Questions</h2>
            </div>

            @foreach ($servicefaqs as $faqIndex => $faq)
                <div class="faqitem {{ $faqIndex === 0 ? 'active' : '' }}">
                    <button type="button" class="faqquestion"
                        aria-expanded="{{ $faqIndex === 0 ? 'true' : 'false' }}">
                        <h3>{{ $faq->question }}</h3>
                        <span class="faqicon">{{ $faqIndex === 0 ? '−' : '+' }}</span>
                    </button>

                    <div class="faqanswer">
                        <div class="faqdivider"></div>
                        <p>{!! $faq->answer !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif

<!-- Start of Appointment form -->
@include('website.common-appointment')

@include('website.footer')

<!-- Image Lightbox & Service Inner Logic -->
<script src="{{ asset('new-website/js/serviceinner.js') }}" defer></script>

<!-- FAQ Accordion Logic matching serviceinner.php -->
<script type="text/javascript">
    (function() {
        function initFaqAccordion() {
            const faqItems = document.querySelectorAll('.faqitem');
            if (!faqItems.length) return;

            faqItems.forEach((item) => {
                const question = item.querySelector('.faqquestion');
                if (!question) return;

                question.addEventListener('click', () => {
                    const isAlreadyActive = item.classList.contains('active');

                    // Close all FAQ items
                    faqItems.forEach((otherItem) => {
                        otherItem.classList.remove('active');
                        const otherQuestion = otherItem.querySelector('.faqquestion');
                        const otherIcon = otherItem.querySelector('.faqicon');

                        if (otherQuestion) {
                            otherQuestion.setAttribute('aria-expanded', 'false');
                        }
                        if (otherIcon) {
                            otherIcon.textContent = '+';
                        }
                    });

                    // If the clicked item was not already active, open it
                    if (!isAlreadyActive) {
                        item.classList.add('active');
                        question.setAttribute('aria-expanded', 'true');
                        const icon = item.querySelector('.faqicon');
                        if (icon) {
                            icon.textContent = '−';
                        }
                    }
                });
            });
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFaqAccordion);
        } else {
            initFaqAccordion();
        }
    })();
</script>
