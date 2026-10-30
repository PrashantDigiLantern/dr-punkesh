@include('website/header')
<section class="back-img banner-in serv-d advance-back py-0">
    <img data-src="{{ url('website/assets/images/logo.png')}}" alt="Dr. Punkesh" class="lazyloaded bnner-img" src="{{ url('website/assets/images/banner-in2.jpg')}}">
    <div class="container con_cus">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 flex-j">
                <div>
                    <div class="shrt-mar changeh2"><span class="text-light">Welcome To Advance Skin, Hair And Laser Clinic</span></div>
                    <!-- <h3 class="shrt-mar"><span class="text-light">Welcome To Advance Skin, Hair  And Laser Clinic</span></h3> -->
                </div>
                <ul class="banner-nav">
                    <li><a href="{{ url('/') }}" class="pl">Home</a></li>
                    <li><a href="#">About Clinic</a></li>
                </ul>
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
<section class="list-col list-sin">
    <div class="container con_cus">
        <div class="row">
            <!-- <center><h3>Advance Skin, Hair And Laser Clinic</h3></center> -->
            <center>
                <div class="changeh2 mb-0">Advance Skin, Hair And Laser Clinic</div>
            </center>
            <center>
                <h1 class="mt-0">Skin Clinic in Patna</h1>
            </center>
            <div class="row justify-content-between">
                <div class="col-lg-6 col-md-6 col-sm-12 paddingright">
                    <p>Established in 2017 and situated in the heart of Patna's medical community, Dr. Punkesh's Advance Skin Hair & Laser Clinic, top <strong>skin clinic in Patna</strong>, is committed to providing evidence based medico-aesthetic treatments and advanced world-class care for all your skin and hair care needs.</p>
                    <p>Exceptional patient care with due treatment is a way of life for us. Our skin specialist, clinicians and support teams are dedicated to the care of each and every patient. They’ll be with you every step of the way, tailoring your care around you and giving the peace-of-mind that comes with the fact that you’re in the best hands.</p>
                    <p>Clinic is led by renowned Dermatologist Dr. Punkesh Kumar (MBBS, MD skin & VD) based in Patna, India. He is an experienced skin specialist in clinical and cosmetic dermatology with an enriching experience of over 8 years. He is also actively involved in clinical research & academics at various hospitals. He has also been associated with various renowned hospitals like Safdarjung Hospital, Delhi; PMCH, Patna and many more.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 paddingleft">
                    <p>He has a cumulative strength of treating over 70000 patients with varied skin issues and also has earned various laurels for his work. He is known for his sharp eye for facial aesthetics , par excellence skills & is at the forefront of surgical & non-surgical cosmetic and skin & hair treatments. People of all gender and ages can consult with us to get effective treatment for any general, hereditary, cosmetic, nail and hair concerns.</p>
                    <p>One can visit our clinic for advanced dermal treatments for varied skin conditions and disorders like acne, psoriasis, eczema, vitiligo, rosacea, freckles, seborrheic dermatitis, warts, mole & skin tag removal, keloids, melasma, Hair Loss treatment, laser treatments, nail fungus treatments etc. Apart from these we do offer solutions for permanent hair removal, Hair growth laser treatment (LLLT), age spots, uneven skin texture, sun damaged skin, pigmentation, skin lightening, fillers, tattoo removal, microdermabration etc. Our objective is to offer comprehensive dermal care with assurance of proper consultation , advance treatments and fast treatment results.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="cards" class="greyshade anicustom">
    <div class="container-fluid">
        <div class="container con_cus">
            <center>
                <h3 class="mb-5">What we do </h3>
            </center>
            <div class="row justify-content-evenly" style="align-items: flex-start;">
                <div class="col-6 col-sm-6 col-md-3 col-lg-5">
                    <div class="card">
                        <img data-src="{{ url('website/assets/images/10.jpg')}}" alt="Hair care" class="lazyload" />
                        <div class="info">
                            <a href="{{url('treatments/hair-care') }}">Read More</a>
                        </div>
                        <p class="h-card">HAIR CARE</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-5">
                    <div class="card">
                        <img data-src="{{ url('website/assets/images/11.jpg')}}" alt="skin care" class="lazyload" />
                        <div class="info">
                            <a href="{{url('treatments/skin-glow-and-brightening') }}">Read More</a>
                        </div>
                        <p class="h-card">SKIN CARE</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="darkbackin">
    <div class="container con_cus">
        <div class="row">
            <div class="row justify-content-between">
                <div class="col-lg-6 col-md-6 col-sm-12 paddingright">
                    <h3>VISION</h3>
                    <p class="text-light">When it comes to skincare, we do believe in skin care first approach. Our vision is simple – prevent, protect and correct when it comes to a good skin care regimen.</p>
                    <p class="text-light">We strive to set a new standard for offering affordable, respectful, compassionate and responsive patient care. </p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 paddingleft">
                    <h3>MISSION</h3>
                    <p class="text-light">We always believe in offering result-driven & evidence based treatments that work and aim to empower every client in embracing their skin. As our client, you are not just a number for us. That's why we take adequate time to understand the uniqueness of each and every individual who walks through our door.</p>
                    <p class="text-light">Also our clinical programs are developed with an understanding of varied requirements of people and it's our mission to provide solutions for millions of underserved patients & people who have had few options for satisfactory medical care. </p>
                    <p class="text-light">You deserve to look the way you want without any judgement. We want you to always be uniquely you.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="list-col list-colthree">
    <div class="container-fluid">
        <div class="container con_cus">
            <div class="row">
                <center>
                    <h3>Why patients choose clinic ?</h3>
                    <p>Dr. Punkesh's Advanced Skin, Hair, and Laser Clinic, the renowned <strong>skin clinic in Patna</strong>, provides a variety of treatments and procedures for skin, hair, and nails to treat a wide range of ailments and imperfections. The state-of-the-art Dermatology Clinic is crafted with a commitment to improving the dermatological health concerns of the patients. We are fortunate to be competent in assisting our patients with all of their dermatological concerns. Our commitment to providing exceptional patient care includes taking the time to carefully listen and fully comprehend the patient's concerns before recommending the most appropriate course of treatment. </p>
                </center>
                <ul>
                    <li>Dr. Punkesh's Advanced Skin, Hair, and Laser Clinic offer numerous skin care treatments and procedures to treat various skin conditions and flaws for those in India seeking cosmetic dermatology</li>
                    <li>Whether one's objective is to achieve a more youthful look, remove unwanted hair, or diminish the appearance of age spots, the clinic has the appropriate treatments.</li>
                    <li>We provide our patients exceptional and individualized care based on their trust in our expert cosmetic dermatologists.
                    </li>
                    <li>We evaluate and comprehend all aspects of a patient's dermatological health. This includes the patient's genetics, habits, environment, and changing requirements. Then, we develop a plan to help one achieve optimal skin, hair, and nail health. Because a healthy body is characterized by attractive skin, luminous hair, and glossy nails.
                    </li>
                    <li>The dermatology practice is patient-centered, and the physicians are committed to individualizing patient care, educating patients about their conditions and treatment options, and providing high-quality care. Referrals from patients have contributed to the practice's rapid expansion.</li>
                    <li>The clinic believes in establishing lasting relationships with patients and actively listening to their concerns. For patients who prefer a holistic approach, the practice has ties to the community of alternative medicine.</li>
                    <li>The compassionate staff at Dr. Punkesh's Advanced Skin, Hair, and Laser Clinic enhances the patient experience by combining modern technology with individualized care.</li>
                    <li>Common skin conditions such as acne, eczema, moles, and rashes are diagnosed and treated by an expert dermatologist. Patients of cosmetic dermatology frequently visit Dr. Punkesh's Advanced Skin, Hair, and Laser Clinic for anti-aging procedures, fillers, and anti-wrinkle injections.</li>
                    <li>We have compiled a thorough treatment guide to assist one in determining which procedures are ideal for skin renewal. Start the journey today with one of the top dermatologists and take the first step toward maintaining healthy skin, hair, and nails.</li>
                </ul>
                <p>If you want to improve the appearance and health of your skin and are interested in learning more about the cosmetic skin care we provide, you can call us or schedule an appointment online.</p>
            </div>
        </div>
    </div>
</section>
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