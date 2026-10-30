@include('website/header')
<section class="back-img banner-in serv-d py-0">
    <div class="container con_cus">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 flex-j">
                <div>
                    <!-- <h3 class="mr-top"><span class="text-light">DR. PUNKESH KUMAR</span></h3> -->
                    <div class="mr-top changeh2"><span class="text-light">DR. PUNKESH KUMAR</span></div>
                    <img data-src="{{ url('website/assets/images/banner_dr.punkesh.png')}}" class="lazyload mob-v" alt="punkesh kumar ">
                    <p class="text-light mt-5 d-inline-block w-100 punk-mob">M.B.B.S, M.D.(Skin & V.D.) P.M.C.H Patna <br>M.I.A.D.V.L., M.A.C.S.I., M.I.M.A., <br>International Fellow American Academy of Dermatology (USA) <br>Member of European Academy of Dermatology & Venerology
                        <br>Ex. Resident Safdarjung Hospital & V.M.M.C (New Delhi) <br>Ex. Senior Resident I.G.I.M.S. & P.M.C.H.(Patna) <br>
                        Gen. Secretary IADVL Bihar<br>Asst. Prof. at G.I.M.S.<br>Regn. No.:38046(BCMR)</p>
                </div>
                <ul class="banner-nav">
                    <li><a href="{{ url('/') }}" class="pl">Home</a></li>
                    <li><a href="#">About Dr.Punkesh Kumar</a></li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 flex-c">
                <img data-src="{{ url('website/assets/images/banner_dr.punkesh.png')}}" class="lazyload desk-v" alt="punkesh kumar">
            </div>
        </div>
    </div>
</section>
<!--   for desktop  -->
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
                            <div class="w-100"> </div>
                            <input type="submit" class="sub-but">
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<!--   end desktop  -->
<!--   for mobile  -->
<section class="req-form darkbackin mob-v">
    <div class="container con_cus">
        <div class="form-sp">
            <p data-bs-toggle="modal" data-bs-target="#exampleModal">Request a call back</p>
            {{ App\Http\Controllers\AppLaunchController::RequestACallbackMobile(); }}
        </div>
    </div>
</section>
<!--   end mobile  -->
<section>
    <div class="container con_cus">
        <div class="row">
            <center>
                <!-- <h3>About doctor Punkesh</h3> -->
                <h1>Dermatologist in Patna</h1>
                <p>Dr. Punkesh Kumar (MBBS, MD skin & VD) is a renowned <strong>Dermatologist in Patna</strong>, India. He is an experienced skin specialist in clinical and cosmetic dermatology with an enriching experience of over 10 years. He is also actively involved in clinical research & academics at various hospitals. He has also been associated with various renowned hospitals like Safdarjung Hospital, Delhi; PMCH, Patna and many more.</p>
                <p>His passion and dedication for studying and analysing ongoing research & best practices has enhanced his reputation and his work as a brilliantly skilled dermatologist.</p>
                <div class="col-lg-6 my-5">
                    <div class="owl-carousel owl-theme" id="owl1">
                        <div class="item">
                            <img data-src="{{ url('website/assets/images/b1.png')}}" class="lazyload" alt="qualification medals" />
                        </div>
                        <div class="item">
                            <img data-src="{{ url('website/assets/images/b2.png')}}" class="lazyload" alt="qualification medals" />
                        </div>
                        <div class="item">
                            <img data-src="{{ url('website/assets/images/b3.png')}}" class="lazyload" alt="qualification medals" />
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>
</section>
<section class="darkbackin">
    <div class="container con_cus">
        <!-- <center> <h3>Education & Training</h3></center> -->
        <center>
            <div class="changeh2">Education & Training</div>
        </center>
        <div class="col-lg-9 col-12 mx-auto">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <center>
                        <div class="outlinebx">
                            <h4 class="text-p">MD - Dermatology</h4>
                            <p class="mb-0 text-light">Venereology & Leprosy Patna Medical College, Patna, 2013</p>
                        </div>
                    </center>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <center>
                        <div class="outlinebx">
                            <h4 class="text-p">MBBS </h4>
                            <p class="mb-0 text-light">Bihar University, 2007</p>
                        </div>
                    </center>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <center>
                        <div class="outlinebx">
                            <h4 class="text-p">2013 - 2019 </h4>
                            <p class="mb-0 text-light">Doctor at Advance Skin Hair & Laser clinic</p>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="doc-approach">
    <div class="container-fluid">
        <div class="container con_cus">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <img data-src="{{ url('website/assets/images/sec_img.png')}}" class="w-100 lazyload" alt="doctors approach" />
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <!-- <h3>Doctor's Philosophy & Approach</h3> -->
                    <div class="changeh2">Doctor's Philosophy & Approach</div>
                    <p>With today's fast paced lives and polluted environment, it has become very much essential to look after our beauty inside out. With the use of sophisticated and advanced technology, Dr Punkesh, the best <strong>skin doctor in patna, believes in healing you from inside to the outside which makes one truly balanced.</p>
                    <p>Doctor's aim in starting this clinic was to deliver treatments & care based on quality, effectiveness, comprehensiveness and compassion along with affordability.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="chosedoctors list-col greylight">
    <div class="container-fluid">
        <div class="container con_cus">
            <div class="row">
                <!-- <center><h3>Why do patients choose Dr Punkesh?</h3></center> -->
                <center>
                    <div class="changeh2 mb-0">Why do patients choose Dr Punkesh?</div>
                </center>
                <center>
                    <h2 class="mt-0">Skin Doctor in Patna</h2>
                </center>
                <ul>
                    <li>Dr Punkesh is renowned among medical fraternity in Patna and at the same time popular among patients. He is the most visited <strong>Skin Doctor in Patna</strong> with expertise in both clinical and cosmetic dermatology. He has a cumulative strength of treating over 70,000 patients with varied skin issues and also has earned various laurels for his work. He is known for his sharp eye for facial aesthetics , par excellence skills & is at the forefront of surgical & non-surgical cosmetic and skin & hair treatments.</li>
                    <li>Use of advanced technology & machines (one such example is ALMA Soprano Lasers), gold standard treatments, effective results along with his passion of providing the best to the patients is what makes Dr Punkesh popular among his patients. Ever increasing number of daily visitors is testimony to this! Also numerous testimonials from his patients are the best proof of the satisfaction level after the services offered.</li>
                    <li>Punkesh always strives to bring the best and most effective treatment solutions and each treatment is crafted with due care to enhance the patient's confidence level. Apart from these, there are other reasons also like healthy relationships with patients, post treatment care & consultation and commendable results which makes him the best <strong>dermatologist in Patna</strong>.</li>
                    <li>People of all gender and ages can consult with us to get effective treatment for any general, hereditary, cosmetic, nail and hair concerns. Our treatment procedure falls into three phases- Treatment, Prevention and Maintenance.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php if(count($testimonial) > 0){ ?>
<section class="testimonial">
    <div class="container-fluid">
        <div class="container con_cus">
            <center>
                <h3>PATIENT TESTIMONIALS</h3>
                <div class="line"></div>
            </center>
            <div class="row ">
                <div class="owl-carousel owl-theme" id="owl2">
                    @foreach($testimonial as $testimoniallist)
                    <div class="col-lg-12 py-5">
                        <div class="test_div">
                            <div class="test_name">{{$testimoniallist->short_name}}</div>
                            <div class="p_scroll">
                                {!! $testimoniallist->description !!}
                            </div>
                            <P class="bld-nme"></P>
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
                                <img data-src="{{ url('website/assets/images/image-p.png')}}" alt="practo" class="lazyload">
                                @elseif($testimoniallist->source == 'google')
                                <img data-src="{{ url('website/assets/images/google.png')}}" alt="google" class="lazyload">
                                @elseif($testimoniallist->source == 'realself')
                                Real Self
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-12">
                    <center><a href="{{ url('written-testimonials')}}"><button class="btn btn-dark btn_globl btn_globl">View All</button></a></center>
                </div>
            </div>
</section>
<?php } ?>
<section class="form-section">
    <div class="container-fluid">
        <div class="container con_cus">
            <div class="row">
                <div class="col-lg-6 sch ">
                    <h2>SCHEDULE A<br> CONSULTATION</h2>
                    <div class="line"></div>
                    <div class="desk-v">
                        <div class="form_Data mt-5">
                            <p><span>Clinic Timing :&nbsp;&nbsp;</span></p>
                            <p>Monday to Saturday : 10:00 AM - 7:00 PM<br> <span>SUNDAY CLOSED</span></p>
                        </div>
                        <div class="form_Data">
                            <p><span>Phone:&nbsp;&nbsp; </span></p>
                            <p>+91-7061400830 | +91-7667445571</p>
                        </div>
                        <div class="form_Data">
                            <p><span>Email:&nbsp;&nbsp; </span></p>
                            <p><a href="mailto:info@advanceskinhairclinic.com"> : info@advanceskinhairclinic.com</a></p>
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