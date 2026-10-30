<section class="footer-section">
    <div class="container-fluid">
        <div class="container con_cus">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <a href="{{ url('/')}}">
                        <img data-src="{{ url('website/assets/images/logo.png')}}" alt="dr. Punkesh" class="mb-5 lazyload">
                    </a>
                    <p>Welcome to Dr. Punkesh's Advance Skin Hair and Laser Clinic. We cater to all needs concerning Skincare,
                        Hair care and Laser services. </p>
                    <a href="{{ url('schedule-a-consultation')}}">
                        <button class="appt-btn">Schedule A Consultation</button>
                    </a>
                    <!-- <h4 class="mb-4 mt-5">Follow us</h4> -->
                    <div class="footer-h4 mb-4 mt-5">Follow us</div>
                    <div class="socila-links">
                        <a href="https://www.facebook.com/advanceskinhairandclinic" target="_blank" class="facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>

                        <a href="https://twitter.com/AdvanceHairSkin" target="_blank" class="twitter">
                            <i class="fab fa-twitter"></i>
                        </a>

                        <a href="https://www.instagram.com/advanceskinhairclinic/" target="_blank" class="instagram">
                            <i class="fab fa-instagram"></i>
                        </a>

                        <a href="https://www.linkedin.com/company/105107692/" target="_blank" class="linkedin">
                            <i class="fab fa-linkedin-in"></i>
                        </a>

                        <a href="https://www.youtube.com/channel/UCs3__EY-lUnIegih5ziKhIA/featured" target="_blank" class="youtube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-6 text-left userfull-links">
                    <!-- <h4>Useful Links</h4> -->
                    <div class="footer-h4">Useful Links</div>
                    <ul>
                        <li>
                            <a href="{{ url('/')}}" class="no">Home</a>
                        </li>
                        <li>
                            <a href="{{ url('about-clinic')}}">About Clinic</a>
                        </li>
                        <li>
                            <a href="{{ url('about-doctor')}}">About Doctor</a>
                        </li>
                        <li>
                            <a href="{{ url('treatments')}}">Treatments</a>
                        </li>
                        <li>
                            <a href="{{ url('written-testimonials')}}">Testimonials</a>
                        </li>
                        <li>
                            <a href="{{ url('blogs')}}">Blogs</a>
                        </li>
                        <li>
                            <a href="{{ url('technology')}}">Technology</a>
                        </li>
                        <li>
                            <a href="{{ url('clinic-gallery')}}">Clinic Gallery</a>
                        </li>
                        <li>
                            <a href="{{ url('contact-us')}}">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-6 text-left treatments count-col">
                    <!-- <h4>Treatments</h4> -->
                    <div class="footer-h4">Treatments</div>
                    <ul>
                        <li>
                            <a href="{{ url('helios-ndyag')}}" class="no">Helios NDYAG </a>
                        </li>
                        <li>
                            <a href="{{url('photofacial')}}">Photo Facial</a>
                        </li>
                        <li>
                            <a href="{{url('vivace-mnrf') }}">MNRF Vivace </a>
                        </li>
                        <li>
                            <a href="{{url('triple-wavelength-diode')}}">Triple Wavelength Diode</a>
                        </li>
                        <li>
                            <a href="{{url('laser-hair-removal')}}">Laser Hair Removal</a>
                        </li>
                        <li>
                            <a href="{{url('anti-wrinkle-injection') }}">Anti Wrinkle Injection</a>
                        </li>
                        <li>
                            <a href="{{ url('hairfall-treatment') }}">Hairfall Treatment</a>
                        </li>
                        <li>
                            <a href="{{ url('growth-factor-therapy-for-hair-loss') }}">Growth Factor concentrate</a>
                        </li>
                        <li>
                            <a href="{{ url('mesotherapy') }}">Mesotherapy</a>
                        </li>
                        <li>
                            <a href="{{ url('dandruff-treatment') }}">Dandruff</a>
                        </li>
                        <li>
                            <a href="{{ url('lllt') }}">LLLT</a>
                        </li>
                        <li>
                            <a href="{{url('peeling')}}">Peeling</a>
                        </li>
                        <li>
                            <a href="{{ url('hydrafacial')}}">Hydrafacial</a>
                        </li>
                        <li>
                            <a href="{{ url('oxygeneo-treatment')}}">Oxygeneo Treatment</a>
                        </li>
                        <li>
                            <a href="{{url('bb-glow-treatment')}}">BB Glow Facial</a>
                        </li>
                        <li>
                            <a href="{{url('vitiligo')}}">Vitiligo</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 text-left address">
                    <!-- <h4>Address</h4> -->
                    <div class="footer-h4">Address</div>
                    <p>50 feet East of Dinkar Golambar, R.K. Avenue Road, In front of Mittal traders, Rajendra Nagar, Patna (800016)</p>
                    <ul class="social-media">
                        <li>
                            <img data-src="{{url('website/assets/images/phone.png')}}" alt="contact no." class="lazyload">
                            <p class="ml-2 m-0">
                                <a href="tel:+91-7061400830">+91-7061400830</a>
                                <br class="mob-v">
                                <span class="desk-v dvdr">|</span>
                                <a href="tel:+91-7667445571">+91-7667445571</a>
                            </p>
                        </li>
                        <li>
                            <img data-src="{{ url('website/assets/images/mail.png')}}" alt="emil id" class="lazyload">
                            <p>
                                <a href="mailto:info@advanceskinhairclinic.com">info@advanceskinhairclinic.com</a>
                            </p>
                        </li>
                    </ul>
                    <!--subscriber form -->
                    <p><strong>Subscribe to News Letter</strong></p>
                    <form method="post" action="{{url('/save-emailsubscription')}}">
                        <div class="form">
                            @csrf
                            <input type="email" class="mt-2 mb-3 p-2" placeholder="Enter your email id" name="email" required>
                        </div>
                        <input type="submit" class="appt-btn" value="Subscribe" />
                    </form>
                    <!--end of subscriber form -->
                </div>
            </div>
        </div>
        <div class="disclaimer my-5">
            <p>
                <span>Disclaimer :</span>The website content is created with the aim of imparting knowledge and information
                about the domain called Dermatology among the people. The treatments mentioned here must not be taken as
                prescriptions. Also, the result for any treatment will vary from person to person as per the skin and hair
                condition.
            </p>
        </div>
    </div>
</section>
<section class="footer-bottom">
    <div class="container-fluid">
        <div class="container con_cus">
            <div class="row">
                <div class="col-lg-5 col-md-12 policies">
                    <a href="{{url('privacy-policy')}}">Privacy Policy</a>
                    <a href="{{url('schedule-a-consultation')}}">Terms &amp; Conditions</a>
                    <a href="{{url('schedule-a-consultation')}}">Legal Disclaimer</a>
                </div>
                <div class="col-lg-7 col-md-12 copy text-end">
                    <p class="text-light m-0 w-100">&copy; 2022 - <span id="year" style="color:#fff;"></span>, Advance Skin Hair Laser Clinic. All Rights Reserved.</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="mob-v sticky">
    <div class="container-fluid">
        <div class="container con_cus">
            <div class="row">
                <ul class="">
                    <li>
                        <a href="mailto:info@advanceskinhairclinic.com">
                            <img data-src="{{ url('website/assets/images/mail.svg')}}" class="lazyload my-2" alt="email id">
                            <p>Email</p>
                        </a>
                    </li>
                    <li class="email">
                        <a href="{{ url('schedule-a-consultation')}}">
                            <img data-src="{{ url('website/assets/images/cal.svg')}}" class="lazyload" alt="Schedule">
                            <p></p>
                        </a>
                    </li>
                    <li>
                        <a href="tel:+91-7061400830">
                            <img data-src="{{ url('website/assets/images/phone.svg')}}" class="lazyload my-2" alt="call us">
                            <p>Call</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<section class="p-0">
    <a href="https://api.whatsapp.com/send?phone=917667445571&amp;text=Hi" class="whatsapp sticky-bot">
        <i class="fab fa-whatsapp"></i>
    </a>
    <a href="#" class="backtotop sticky-bot">
        <i class="fa fa-arrow-up"></i>
    </a>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" async></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" async></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js" async></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
</script>
<script src="{{ url('website/assets/js/jquery.lazy.min.js')}}" defer="defer"></script>
<script src="{{ url('website/assets/js/main.js')}}" defer="defer"></script>
<!-- Start of Year code -->
<script>
    document.getElementById("year").textContent = new Date().getFullYear();
</script>
<!-- Custom scripts -->
<script type="text/javascript">
    $(document).ready(function() {

        $.ajax({
            type: 'GET',
            url: "{{url('/googlecaptcha')}}",
            data: {
                'post': 'ok'
            },
            dataType: 'json',
            success: function(result) {
                $.each(result, function(i, item) {
                    console.log("item", result.uniqid);
                    $("#captcha_request_mobile").html(result.captchashows);
                    $("#code1_request_mobile").val(result.uniqid);

                });
            },
        });
    });

    requestFormMobile();

    function requestFormMobile() {
        // alert('hi');
        $.ajax({
            type: "get",
            url: "{{url('/googlecaptcha')}}",
            data: {
                'post': 'ok'
            },
            dataType: 'json',
            success: function(result) {
                $.each(result, function(i, item) {
                    $("#captcha_request_mobile").html(result.captchashows);
                    $("#code1_request_mobile").val(result.uniqid);
                });
            },
            complete: function() {},
        });
    }



    // $(document).ready(function(){

    // $(document).on("click", ".open-AddBookDialog", function () {

    //             $.ajax({
    //                 type: "get",
    //                 url: "{{url('/googlecaptcha')}}",
    //                 data: {
    //                     'post': 'ok'
    //                 },
    //                 dataType: 'json',
    //                 success: function(result) {
    //                 $.each( result, function( i, item ) {
    //                   console.log("item",result.uniqid);
    //                   $("#captcharequest").html(result.captchashows);
    //                     // $("#code1_request").val(result.uniqid);
    //                     // $('#exampleModalform').modal('show');

    //                     // var myBookId = 'abha'; //alert(myBookId);
    //                   $("#code1request").val( result.uniqid );

    //                     });
    //                 },
    //                 complete: function() {},
    //             });


    // });});

    // requestFormMob();
    //     function requestFormMob() {
    //         // alert('hi');
    //             $.ajax({
    //                 type: "get",
    //                 url: "{{url('/googlecaptcha')}}",
    //                 data: {
    //                     'post': 'ok'
    //                 },
    //                 dataType: 'json',
    //                 success: function(result) {
    //                 $.each( result, function( i, item ) {
    //                     $("#captcharequest").html(result.captchashows);
    //                     $("#code1request").val(result.uniqid);
    //                     });
    //                 },
    //                 complete: function() {},
    //             });
    //         }




    $('#phone1,#phone2,#phone3,#phone4,#phone5').keypress(function(e) {
        if (![48, 49, 50, 51, 52, 53, 54, 55, 56, 57].includes(e.keyCode)) {
            e.preventDefault();
        }
    });

    // function validatesec() {
    //     var inputvalues = $(this).val();
    //     var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    //     if(!regex.test(inputvalues)){
    //     $('.error_email').html("invalid email id");
    //     $('.error_email').css("color","red");
    //   }
    // }


    helpyousec()

    function helpyousec() {
        var getwidth = $(document).width();
        if (getwidth <= 820) {
            $("#desk").html(" ");
            $("#desk_app").html(" ");
        } else {
            $("#mobile").html(" ");
            $("#mobile_app").html(" ");
        }
    }


    requestForm();

    function requestForm() {
        // alert('hi');
        $.ajax({
            type: "get",
            url: "{{url('/googlecaptcha')}}",
            data: {
                'post': 'ok'
            },
            dataType: 'json',
            success: function(result) {
                $.each(result, function(i, item) {
                    $("#captcha_request").html(result.captchashows);
                    $("#code1_request").val(result.uniqid);
                });
            },
            complete: function() {},
        });
    }

    appointmentForm();

    function appointmentForm() {
        // alert('hi');
        $.ajax({
            type: "get",
            url: "{{url('/googlecaptcha')}}",
            data: {
                'post': 'ok'
            },
            dataType: 'json',
            success: function(result) {
                $.each(result, function(i, item) {
                    $("#captcha_appointment").html(result.captchashows);
                    $("#code1_appointment").val(result.uniqid);
                });
            },
            complete: function() {},
        });
    }

    // sideappointmentForm();
    // function sideappointmentForm() {
    //     // alert('hi');
    //         $.ajax({
    //             type: "get",
    //             url: "{{url('/googlecaptcha')}}",
    //             data: {
    //                 'post': 'ok'
    //             },
    //             dataType: 'json',
    //             success: function(result) {
    //             $.each( result, function( i, item ) {
    //                 $("#side_captcha_appointment").html(result.captchashows);
    //                 $("#code1_sideappointment").val(result.uniqid);
    //                 });
    //             },
    //             complete: function() {},
    //         });
    //     }




    function checkvalidation(getid) {
        //   console.log("getid",page);
        var capminlenth = 6;
        var phoneminLength = 9;
        var phonemaxLength = 12;
        var checkcode = false;
        var checkname = false;
        var checkemail = false;
        var checkphone = false;
        var checkdate = false;
        var checksername = false;
        var checkquote = false;


        var page = document.getElementById("page" + getid).value
        var name = document.getElementById("name" + getid).value
        var code1_request = document.getElementById("code1_request").value
        var code1_request_mobile = document.getElementById("code1_request_mobile").value
        var code1_appointment = document.getElementById("code1_appointment").value
        // var code1_sideappointment = document.getElementById("code1_sideappointment").value


        var phone = document.getElementById("phone" + getid).value
        var captcha = document.getElementById("captcha" + getid).value

        if (getid == 1 || getid == 2 || getid == 3) {
            if (getid == 1 || getid == 2) {
                var date = document.getElementById("date" + getid).value
                var date_regex = /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/;
                if (date == '') {
                    document.getElementById("validdate" + getid).innerHTML = 'This field is required.';
                    document.getElementById("date" + getid).classList.add("errorsection");
                    document.getElementById("date" + getid).classList.remove("validsection");
                } else {
                    var checkdate = true;
                    document.getElementById("validdate" + getid).innerHTML = '';
                    document.getElementById("date" + getid).classList.add("validsection");
                    document.getElementById("date" + getid).classList.remove("errorsection");
                }
            }

        }

        if (captcha == '') {
            document.getElementById("validcaptcha" + getid).innerHTML = 'This field is required.';
            document.getElementById("captcha" + getid).classList.add("errorsection");
            document.getElementById("captcha" + getid).classList.remove("validsection");
            // e.preventDefault();
        } else {
            var checkcode = true;
            document.getElementById("validcaptcha" + getid).innerHTML = ' ';
            document.getElementById("captcha" + getid).classList.add("validsection");
            document.getElementById("captcha" + getid).classList.remove("errorsection");
        }


        var regName = /^[a-zA-Z ]*$/;
        if (name == '') {
            console.log("getid", getid);
            document.getElementById("validname" + getid).innerHTML = 'This field is required.';
            document.getElementById("name" + getid).classList.add("errorsection");
            document.getElementById("name" + getid).classList.remove("validsection");

        } else if (!regName.test(name)) {
            document.getElementById("validname" + getid).innerHTML = 'Please Enter Valid Name.';
            document.getElementById("name" + getid).classList.add("errorsection");
            document.getElementById("name" + getid).classList.remove("validsection");

        } else {
            var checkname = true;
            document.getElementById("validname" + getid).innerHTML = ' ';
            document.getElementById("name" + getid).classList.add("validsection");
            document.getElementById("name" + getid).classList.remove("errorsection");
        }








        if (getid != 4 && getid != 5) {
            var email = document.getElementById("email" + getid).value
            var regex = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i; // /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.) +([a-zA-Z0-9]{2,4})+$/;
            // emailExp.test(email);
            if (email == '') {
                document.getElementById("validemail" + getid).innerHTML = 'This field is required.';
                document.getElementById("email" + getid).classList.add("errorsection");
                document.getElementById("email" + getid).classList.remove("validsection");
                // e.preventDefault();
            } else if (!regex.test(email)) {
                document.getElementById("validemail" + getid).innerHTML = 'Please Enter Valid Email ID.';
                document.getElementById("email" + getid).classList.add("errorsection");
                document.getElementById("email" + getid).classList.remove("validsection");

                // e.preventDefault();
            } else {
                var checkemail = true;
                document.getElementById("validemail" + getid).innerHTML = ' ';
                document.getElementById("email" + getid).classList.add("validsection");
                document.getElementById("email" + getid).classList.remove("errorsection");
            }

        }

        console.log("checkemail", checkemail);

        // var phone_Exp = /^[+0]{0,9}(91)?[0-9]{10}$/;
        var phone_Exp = /^[6,7,8,9][0-9]{0,9}$/;
        if (phone == '') {
            document.getElementById("validphone" + getid).innerHTML = 'This field is required.';
            document.getElementById("phone" + getid).classList.add("errorsection");
            document.getElementById("phone" + getid).classList.remove("validsection");
            // e.preventDefault();
        } else if (!phone_Exp.test(phone)) {
            document.getElementById("validphone" + getid).innerHTML = 'Please Enter Valid Phone Number';
            document.getElementById("phone" + getid).classList.add("errorsection");
            document.getElementById("phone" + getid).classList.remove("validsection");
            // e.preventDefault();
        } else if (phone.length < phoneminLength) {
            document.getElementById("validphone" + getid).innerHTML = 'Please Enter Minimum 10 digit Number.';
            document.getElementById("phone" + getid).classList.add("errorsection");
            document.getElementById("phone" + getid).classList.remove("validsection");
            // e.preventDefault();
        } else {
            var checkphone = true;
            document.getElementById("validphone" + getid).innerHTML = ' ';
            document.getElementById("phone" + getid).classList.add("validsection");
            document.getElementById("phone" + getid).classList.remove("errorsection");
        }



        if (checkname == true && checkphone == true) {
            console.log("aaaaa", checkemail);
            if (page == 'appointment' && checkemail == true) {
                var code = code1_appointment;
                var url = "{{url('/appointmentsave')}}";
            } else if (page == 'contactus' && checkemail == true) {
                var code = code1_request;
                var url = "{{url('/contactussave')}}";
            } else if (page == 'requestCallback') {
                var code = code1_request;
                var url = "{{url('/requestAcallback')}}";
            } else if (page == 'requestCallbackMobile') {
                var code = code1_request_mobile;
                var url = "{{url('/requestAcallback')}}";
            }
            // else if(page == 'sideappointment' && checkemail == true){
            //     var code = code1_sideappointment;
            //     var  url = "{{url('/appointmentsave')}}";
            // }
            console.log("page", page);
            getFormData(url, getid, code)
        }
    }


    function getFormData(urlsend, serialno, code) {
        console.log("urlsend", urlsend);
        console.log("serialno", serialno);
        console.log("code", code);


        var token = $("#token" + serialno).val();
        var name = $('#name' + serialno).val();
        var email = $('#email' + serialno).val();
        var phone = $('#phone' + serialno).val();
        var date = $('#date' + serialno).val();
        var message = $('#message' + serialno).val();
        // var captcha = $('#captcha').val();
        var captcha = $('#captcha' + serialno).val();

        $("#loading1").show();
        $("#loading2").show();
        $("#submit2").prop('disabled', true);
        $("#submit1").prop('disabled', true);


        $.ajax({
            type: "post",
            url: urlsend,
            data: {
                '_token': token,
                'name': name,
                'email': email,
                'phone': phone,
                'message': message,
                'date': date,
                'captcha': captcha,
                'unic': code
            },
            success: function(result) {
                // console.log("result",result);return false;
                location.href = "{{url('/thank-you')}}";
            },
            error: function(result) {
                console.log("error", result.responseJSON);
                $("#loading1").hide();
                $("#loading2").hide();
                $("#submit2").prop('disabled', false);
                $("#submit1").prop('disabled', false);
                if (result.status === 400) {
                    document.getElementById("validcaptcha" + serialno).innerHTML = 'Captcha Code is not valid!!..';
                }
            },
            complete: function() {},
        });
    }
</script>
</body>

</html>