@include('website/header')
<section id="banner-section" class="p-0">
    <img data-src="{{ url('website/assets/images/1.jpg')}}" src="{{ url('website/assets/images/1.jpg')}}" class="bnnr-p stat-img lazyload">
    <img data-src="{{ url('website/assets/images/mo_banner.jpg')}}" src="{{ url('website/assets/images/mo_banner.jpg')}}" class="mob-v mb stat-img lazyload">
    <img data-src="{{ url('website/assets/images/tab_banner.jpg')}}" src="{{ url('website/assets/images/tab_banner.jpg')}}" class="mob-v tb stat-img lazyload">
    <div class="banner">
        <div class="container con_cus">
            <div class="row align-items-center justify-content-end">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="banner-content">
                        <ul>
                            <li>BEAUTIFUL.</li>
                            <li>GLAMOROUS.</li>
                            <li>CONFIDENT.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="req-form darkbackin desk-v">
    <div class="container con_cus">
        {{ App\Http\Controllers\AppLaunchController::RequestACallback(); }}
    </div>
</section>
<div class="modal fade" id="proceed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content darkbackin">
            <div class="modal-body">
                <i type="button" class="btn-close fas fa-times" data-bs-dismiss="modal" aria-label="Close"></i>
                <section class="req-form darkbackin">
                    <div class="container con_cus">
                        <div>
                            <div class="w-100"></div>
                            <input type="submit" class="sub-but">
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<section class="req-form darkbackin mob-v">
    <div class="container con_cus">
        <div class="form-sp">
            <p data-bs-toggle="modal" data-bs-target="#exampleModal">Request a call back</p>
            {{ App\Http\Controllers\AppLaunchController::RequestACallbackMobile(); }}
        </div>
    </div>
</section>

<section id="pop-treats">
    <div class="container con_cus">
        <center>
            <div class="col-12 col-lg-9">
                <!-- <h2>POPULAR TREATMENTS</h2> -->
                <div class="changeh2">POPULAR TREATMENTS</div>
                <p>Our services are provided in a professional, ethical, and customer-focused environment, which enables us to help people look and feel amazing! We offer advanced skin and hair treatments to our patients. The services are available for medical issues, including acne scars, melasma, baldness, ageing, fungal infections, eczema, hair fall, etc. Treatments for enhancing one’s aesthetic appeal are also available, such as facial lift and contouring, skin glow and brightening, laser hair removal, body polishing, etc. </p>
            </div>
        </center>
        <div class="strong-border"></div>
</section>
<section id="cards" class="py-0 anicustom">
    <div class="container-fluid">
        <div class="container con_cus">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <img data-src="{{ url('website/assets/images/2.jpg')}}" src="{{ url('website/assets/images/2.jpg')}}" alt="laser toning" class="lazyload">
                        <div class="info">
                            <p>LASER TONING</p>
                            <p class="info-desc">Laser toning is a cosmetic modality which gently rejuvenates the skin by targeting the pigment cells lying under the skin layer along with enhancing the collagen and elastin production to fight the ageing signs. </p>
                            <a href="{{url('laser-toning')}}">Read More</a>
                        </div>
                        <p class="h-card">LASER TONING</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <img data-src="{{ url('website/assets/images/3.jpg')}}" src="{{ url('website/assets/images/3.jpg')}}" alt="laser hair reduction" class="lazyload">
                        <div class="info">
                            <p>LASER HAIR REDUCTION</p>
                            <p class="info-desc">Laser hair reduction is equally beneficial for men and women. It is a medically-proven method which helps in reducing the hair density and helps enjoying hair-free skin.</p>
                            <a href="{{url('laser-hair-removal')}}">Read More</a>
                        </div>
                        <p class="h-card">LASER HAIR REDUCTION</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <img data-src="{{ url('website/assets/images/4.jpg')}}" src="{{ url('website/assets/images/4.jpg')}}" alt="dermal fillers" class="lazyload">
                        <div class="info">
                            <p>Anti Ageing</p>
                            <p class="info-desc">As we age, our skin becomes thinner, drier and less elastic which causes wrinkles, fine-lines and creases across our face.</p>
                            <a href="{{url('treatments/ageing-skin')}}">Read More</a>
                        </div>
                        <p class="h-card">Anti Ageing</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <img data-src="{{ url('website/assets/images/5.jpg')}}" src="{{ url('website/assets/images/5.jpg')}}" alt="photo facial" class="lazyload">
                        <div class="info">
                            <p>PHOTOFACIAL</p>
                            <p class="info-desc">Photofacial, also known as photo rejuvenation, is a popular light-based technology skin treatment process that addresses a number of skin issues like age spots, sun damage, open pores, wrinkles,</p>
                            <a href="{{url('photofacial')}}">Read More</a>
                        </div>
                        <p class="h-card">PHOTOFACIAL</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="viewButtonwrap">
            <a href="{{ url('treatments')}}" class="viewallButton btn_globl">View All</a>
        </div>
    </div>
</section>
<section id="about">
    <div class="container-fluid">
        <div class="container con_cus">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mob-hi">
                    <img class="w-100 h-100 desk-v lazyload advnce-blck" data-src="{{ url('website/assets/images/6.jpg')}}" src="{{ url('website/assets/images/6.jpg')}}" alt="advance skin hair laser clinic">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 pad-left" style="padding-left:4rem">
                    <div class="contents">
                        <h3>ADVANCE SKIN, HAIR <br>& LASER CLINIC </h3>
                        <p>Established in 2017 and situated in the heart of Patna's medical community, Dr. Punkesh's Advance Skin Hair & Laser Clinic is committed to providing evidence based medico-aesthetic treatments and advanced world-class care for all your skin and hair care needs.</p>
                        <p>Exceptional patient care with due treatment is a way of life for us. Our skin specialist, clinicians and support teams are dedicated to the care of each and every patient. They’ll be with you every step of the way, tailoring your care around you and giving the peace-of-mind that comes with the fact that you’re in the best hands...<a href="{{ url('about-clinic')}}" class="desk-v readmore" target="">Read more</a>
                        </p>
                        <img class="w-100 h-100 mob-v lazyload" data-src="{{ url('website/assets/images/6.jpg')}}" src="{{ url('website/assets/images/6.jpg')}}" alt="advance skin hair laser clinic">
                        <div class="stats">
                            <div class="row stats-grid">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 data p-0">
                                    <p class="num mb-0">
                                        <span id="num1" class="r">17,000</span>
                                        <span>+</span>
                                    </p>
                                    <p>Laser Hair Removal</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 data p-0">
                                    <p class="num mb-0">
                                        <span id="num2" class="r">1,20,000</span>
                                        <span>+</span>
                                    </p>
                                    <p>Satisfied Patients</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 data p-0">
                                    <p class="num mb-0">
                                        <span id="num3" class="r"> 70,000</span>
                                        <span>+</span>
                                    </p>
                                    <p>Procedures Pan India</p>
                                </div>
                            </div>
                        </div>
                        <div class="mob-v">
                            <div class="btn-mobiles-sc">
                                <a href="{{ url('about-clinic')}}" target="">
                                    <button class="btn viewallButton m-3">Read More</button>
                                </a>
                                <a href="{{ url('schedule-a-consultation')}}" alt="">
                                    <button class="btn btn-dark mt-7 m-3 appt-btn">Schedule A Consultation</button>
                                </a>
                            </div>
                        </div>
                        <a href="{{ url('schedule-a-consultation')}}" alt="">
                            <button class="btn btn-dark mt-7 desk-v appt-btn">Schedule A Consultation</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="skin-care px-0 skn_bck">
    <center>
        <!-- <h2 class="text-secondary mob-v">SKIN CARE</h2> -->
        <div class="changeh2 text-secondary mob-v">SKIN CARE</div>
        <div class="line mob-v"></div>
    </center>
    <img class="skin_img lazyload" data-src="{{ url('website/assets/images/7_m.jpg')}}" src="{{ url('website/assets/images/7_m.jpg')}}" alt="skin care">
    <div class="container-fluid">
        <div class="container con_cus">
            <div class="row">
                <div class="col-lg-1 col-md-0 col-sm-12 desk-v"></div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <!-- <h2 class="text-secondary desk-v">SKIN CARE</h2> -->
                    <div class="changeh2 text-secondary desk-v">SKIN CARE</div>
                    <div class="line desk-v"></div>
                    <p>Everyone wants their skin to look flawless, but factors like excessive sun exposure, poor eating habits, stress, and even a sedentary lifestyle can result in dullness, weariness, sagging, and other skin problems. Dr. Punkesh's Advanced Skin Hair & Laser Clinic, run by Dr. Punkesh Kumar, a leading <strong>skin specialist in Patna</strong>, specializes in treating a variety of skin problems using cutting-edge medical technology. All of these services are rendered so that our clients can live healthy lifestyles and be confident in showcasing their gorgeous skin. The services offered are:</p>
                    <div class="links">
                        <a href="{{url('acne')}}">ACNE.</a>
                        <a href="{{url('schedule-a-consultation')}}">ACNE SCARS</a>
                        <a href="{{url('schedule-a-consultation')}}">ADVANCE PEELS</a>
                        <a href="{{url('schedule-a-consultation')}}">MICRODERMABRASION</a>
                        <a href="{{url('laser-hair-removal')}}">LASER HAIR REMOVAL</a>
                        <a href="{{url('schedule-a-consultation')}}">LASER TATTOO REMOVAL</a>
                    </div>
                    <div class="mob-cent">
                        <a href="{{ url('treatments')}}">
                            <button class="btn btn-dark btn_globl">Read More</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="skin-care hair-care px-0">
    <center>
        <!-- <h2 class="text-light mob-v">Hair CARE</h2> -->
        <div class="changeh2 text-light mob-v">Hair CARE</div>
        <div class="line mob-v"></div>
    </center>
    <img class="skin_img lazyload" data-src="{{ url('website/assets/images/8_m.jpg')}}" src="{{ url('website/assets/images/8_m.jpg')}}" alt="hair care">
    <div class="container-fluid">
        <div class="container con_cus">
            <div class="row justify-content-end">
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <!-- <h2 class="desk-v">Hair CARE</h2> -->
                    <div class="changeh2 desk-v">Hair CARE</div>
                    <div class="line desk-v"></div>
                    <p>Take advantage of our top-notch, cutting-edge hair care services. We extend premium services that nourish the hair and boost its growth with safe, efficient, and proven hair treatments. According to specialists, losing between 50 and 100 hairs every day is totally safe. However, hair loss resulting in a receding hairline and baldness can affect one emotionally and psychologically. Therefore, it is necessary to diagnose the root cause in order to provide a proper treatment. We suggest the most effective treatment for great results. The treatments offered include:</p>
                    <div class="links">
                        <a href="{{ url('hairfall-treatment') }}">HAIR LOSS TREATMENTS</a>
                        <a href="{{url('schedule-a-consultation')}}">HAIR TRANSPLANT</a>
                        <a href="{{url('schedule-a-consultation')}}">SCALP REPAIR</a>
                        <a href="{{ url('mesotherapy') }}">MESOTHERAPY</a>
                        <a href="{{url('schedule-a-consultation')}}">BALDNESS</a>
                        <a href="{{ url('dandruff-treatment') }}">DANDRUFF</a>
                    </div>
                    <div class="mob-cent">
                        <a href="{{ url('treatments')}}">
                            <button class="btn btn-dark btn_globl">Read More</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="skin-care doc_intro p-0">
    <div class="container-fluid">
        <div class="container con_cus">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <p class="sb-h mb-0 text-uppercase">Overview</p>
                    <!-- <h3>DR. PUNKESH KUMAR</h3> -->
                    <div class="changeh2 mb-0">DR. PUNKESH KUMAR</div>
                    <h1 class="mt-0">Skin Specialist in Patna</h1>
                    <p class="mt-md-4 mt-0">
                        <strong>M.B.B.S, M.D.(Skin & V.D.) P.M.C.H Patna <br>M.I.A.D.V.L., M.A.C.S.I., M.I.M.A., <br>International
                            Fellow American Academy of Dermatology (USA) <br>Member of European Academy of Dermatology & Venerology
                            <br>Ex. Resident Safdarjung Hospital & V.M.M.C (New Delhi) <br>Ex. Senior Resident I.G.I.M.S. & P.M.C.H.(Patna) <br>
                            Gen. Secretary IADVL Bihar<br>
                            Asst. Prof. at G.I.M.S.<br>Regn. No.:38046(BCMR)</strong>
                    </p>
                    <p>
                        <img class="skin_img mob-v lazyload" data-src="{{ url('website/assets/images/dr.punkesh.jpg')}}" src="{{ url('website/assets/images/dr.punkesh.jpg')}}" alt="overview">
                    </p>
                    <p>Dr. Punkesh Kumar (MBBS, MD skin & VD) is a renowned Skin Specialist in Patna, India. He is an experienced skin specialist in clinical and cosmetic dermatology with an enriching experience of over 10 years. He is also actively involved in clinical research & academics at various hospitals. He has also been associated with various renowned hospitals like Safdarjung Hospital, Delhi; PMCH, Patna and many more...
                        <a href="{{ url('/about-doctor')}}" class="readmore desk-v">Read more</a>
                    </p>
                    <div class="col-12 col-lg-9 p-0">
                        <div class="owl-carousel owl-theme" id="owl1">
                            <div class="item">
                                <img data-src="{{ url('website/assets/images/b1.png')}}" src="{{ url('website/assets/images/b1.png')}}" class="lazyload" alt="qualification medals">
                            </div>
                            <div class="item">
                                <img data-src="{{ url('website/assets/images/b2.png')}}" src="{{ url('website/assets/images/b2.png')}}" class="lazyload" alt="qualification medals">
                            </div>
                            <div class="item">
                                <img data-src="{{ url('website/assets/images/b3.png')}}" src="{{ url('website/assets/images/b3.png')}}" class="lazyload" alt="qualification medals">
                            </div>
                        </div>
                    </div>
                    <div class="mob-v contents">
                        <div class="btn-mobiles-sc">
                            <a href="{{ url('/about-doctor')}}">
                                <button class="btn viewallButton m-3">Read More</button>
                            </a>
                            <a href="{{ url('schedule-a-consultation')}}">
                                <button class="btn btn-dark appt-btn mt-7 m-3">Schedule A Consultation</button>
                            </a>
                        </div>
                    </div>
                    <a href="{{ url('schedule-a-consultation')}}">
                        <button class="btn btn-dark btn_globl appt-btn desk-v">Schedule A Consultation</button>
                    </a>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 desk-v overviewimg">
                    <img style="width:100%" data-src="{{ url('website/assets/images/dr.punkesh.jpg')}}" src="{{ url('website/assets/images/dr.punkesh.jpg')}}" alt="dr. Punkesh" class="lazyload">
                </div>
            </div>
        </div>
    </div>
</section>
<?php if (count($testimonial) > 0) { ?>
    <section class="testimonial">
        <div class="container-fluid">
            <div class="container con_cus">
                <center>
                    <h3>PATIENT TESTIMONIALS</h3>
                    <div class="line"></div>
                </center>
                <div class="row">
                    <div class="owl-carousel owl-theme" id="owl2">
                        @foreach($testimonial as $testimoniallist)
                        <div class="col-lg-12 py-5">
                            <div class="test_div">
                                <div class="test_name">{{$testimoniallist->short_name}}</div>
                                <div class="p_scroll"> {!! $testimoniallist->description !!}</div>
                                <p class="bld-nme"></p>
                                <center>
                                    <h4>{{$testimoniallist->name}}</h4>
                                </center>
                                <div class="rev-blk">
                                    <div class="ratings">
                                        @for($i=1; $i <= $testimoniallist->rating; $i++)
                                            <i class="fas fa-star"></i>
                                            @endfor
                                    </div>
                                    @if($testimoniallist->source == 'practo')
                                    <img data-src="{{ url('website/assets/images/image-p.png')}}" src="{{ url('website/assets/images/image-p.png')}}" alt="practo" class="lazyload">
                                    @elseif($testimoniallist->source == 'google')
                                    <img data-src="{{ url('website/assets/images/google.png')}}" src="{{ url('website/assets/images/google.png')}}" alt="google" class="lazyload">
                                    @elseif($testimoniallist->source == 'realself')
                                    Real Self
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-lg-12">
                        <center>
                            <a href="{{ url('written-testimonials')}}">
                                <button class="btn btn-dark btn_globl btn_globl">View All</button>
                            </a>
                        </center>
                    </div>
                </div>
    </section>
<?php } ?>
<section class="form-section">
    <div class="container-fluid">
        <div class="container con_cus">
            <div class="row">
                <div class="col-lg-6 sch">
                    <h2>SCHEDULE A <br>CONSULTATION </h2>
                    <div class="line"></div>
                    <div class="desk-v">
                        <div class="form_Data mt-5">
                            <p><span>Clinic Timing :&nbsp;&nbsp;</span></p>
                            <p>Monday to Saturday : 10:00 AM - 7:00 PM<br> <span>SUNDAY CLOSED</span></p>
                        </div>
                        <div class="form_Data">
                            <p>
                                <span>Phone:&nbsp;&nbsp;</span>
                            </p>
                            <p>+91-7061400830 | +91-7667445571</p>
                        </div>
                        <div class="form_Data">
                            <p>
                                <span>Email:&nbsp;&nbsp;</span>
                            </p>
                            <p>
                                <a href="mailto:info@advanceskinhairclinic.com">: info@advanceskinhairclinic.com</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 form mb-mt-5">
                    {{ App\Http\Controllers\AppLaunchController::CommanAppointment(); }}

                </div>
            </div>
        </div>
    </div>
</section>
@include('website/footer')