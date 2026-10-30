  <!-- ================= GLOBAL FOOTER ================= -->
  <footer id="contact" class="custom-footer">
    <div class="footer-upper-wrap">
      <div class="footer-main-grid">

        <!-- Left Column: Brand Logo & Contacts Stack -->
        <div class="footer-left-brand-stack">
          <!-- Sub-cell 1: Logo -->
          <div class="footer-brand-cell">
            <a href="{{ url('/') }}">
              <img src="{{ asset('new-website/images/logo.webp') }}" class="footer-brand-logo" width="109" height="70" alt="Dr. Punkesh's Advance Skin Hair & Laser Clinic"/>
            </a>
          </div>

          <!-- Sub-cell 2: Phone Numbers -->
          <div class="footer-contact-cell">
            <div class="contact-icon-circle">
              <!-- Phone Icon -->
              <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                <path
                  d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
              </svg>
            </div>
            <span class="contact-text">
              <a href="tel:+917061400830">+91-7061400830</a> | <a href="tel:+917667445571">+91-7667445571</a>
            </span>
          </div>

          <!-- Sub-cell 3: Email -->
          <div class="footer-contact-cell">
            <div class="contact-icon-circle">
              <!-- Mail Icon -->
              <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                <path
                  d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
              </svg>
            </div>
            <span class="contact-text">
              <a href="mailto:info@advanceskinhairclinic.com">info@advanceskinhairclinic.com</a>
            </span>
          </div>
        </div>

        <!-- Column 2: USEFUL LINKS -->
        <div class="footer-links-col footer-accordion-col active">
          <div class="footer-col-heading accordion-trigger">
            <span>USEFUL LINKS</span>
            <span class="accordion-icon">−</span>
          </div>
          <ul class="footer-link-list">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('about-clinic') }}">About Clinic</a></li>
            <li><a href="{{ url('about-doctor') }}">About Doctor</a></li>
            <li><a href="{{ url('written-testimonials') }}">Testimonials</a></li>
            <li><a href="{{ url('real-results') }}">Real Results</a></li>
            <li><a href="{{ url('videos') }}">Videos</a></li>
            <li><a href="{{ url('clinic-gallery') }}">Clinic Gallery</a></li>
            <li><a href="{{ url('technology') }}">Technology</a></li>
            <li><a href="{{ url('blogs') }}">Blogs</a></li>
            <li><a href="{{ url('contact-us') }}">Contact</a></li>
          </ul>
        </div>

        <!-- Column 3: TREATMENTS -->
        <div class="footer-links-col footer-accordion-col">
          <div class="footer-col-heading accordion-trigger">
            <span>TREATMENTS</span>
            <span class="accordion-icon">+</span>
          </div>
          <ul class="footer-link-list">
            <li><a href="{{ url('helios-ndyag') }}">Helios NDYAG</a></li>
            <li><a href="{{ url('photofacial') }}">Photo Facial</a></li>
            <li><a href="{{ url('vivace-mnrf') }}">MNRF Vivace</a></li>
            <li><a href="{{ url('triple-wavelength-diode') }}">Triple Wavelength Diode</a></li>
            <li><a href="{{ url('laser-hair-removal') }}">Laser Hair Removal</a></li>
            <li><a href="{{ url('anti-wrinkle-injection') }}">Anti Wrinkle Injection</a></li>
            <li><a href="{{ url('hairfall-treatment') }}">Hairfall Treatment</a></li>
            <li><a href="{{ url('growth-factor-therapy-for-hair-loss') }}">Growth Factor Concentrate</a></li>
            <li><a href="{{ url('treatments') }}" class="view-more-link">View More</a></li>
          </ul>
        </div>

        <!-- Column 4: TECHNOLOGY -->
        <div class="footer-links-col footer-accordion-col">
          <div class="footer-col-heading accordion-trigger">
            <span>TECHNOLOGY</span>
            <span class="accordion-icon">+</span>
          </div>
          <ul class="footer-link-list">
            <li><a href="{{ url('technology/hifu-ultracelq') }}">HIFU (UltracelQ+)</a></li>
            <li><a href="{{ url('technology/alma-soprano-ice-hair-removal-laser') }}">ALMA Soprano Ice</a></li>
            <li><a href="{{ url('triple-wavelength-diode') }}">Triple Wavelength Diode</a></li>
            <li><a href="{{ url('technology/qsndy-q-switched-nd-yag-helios-iii') }}">Helios NDYAG</a></li>
            <li><a href="{{ url('technology/radio-frequencyrf') }}">Radio Frequency (RF)</a></li>
            <li><a href="{{ url('technology/hydra-facial') }}">Hydra Facial</a></li>
            <li><a href="{{ url('technology/dermapen-4') }}">Dermapen 4</a></li>
            <li><a href="{{ url('technology/vivace-mnrf-microneedling-radio-frequency') }}">Vivace (MNRF)</a></li>
            <li><a href="{{ url('technology') }}" class="view-more-link">View More</a></li>
          </ul>
        </div>

      </div>
    </div>

    <!-- Disclaimer Row -->
    <div class="footer-disclaimer-wrap">
      <span class="disclaimer-label">DISCLAIMER :</span>
      <p class="disclaimer-content">
        The website content is created with the aim of imparting knowledge and information about the domain called
        Dermatology among the people. The treatments mentioned here must not be taken as prescriptions. Also, the
        result for any treatment will vary from person to person as per the skin and hair condition.
      </p>
    </div>

    <!-- Bottom Gold Copyright Bar -->
    <div class="footer-bottom-gold-bar">
      <div class="footer-legal-links">
        <a href="{{ url('privacy-policy') }}">Privacy Policy</a> |
        <a href="{{ url('terms-and-conditions') }}">Terms &amp; Conditions</a> |
        <a href="{{ url('legal-disclaimer') }}">Legal Disclaimer</a>
      </div>
      <div class="footer-copyright">
        &copy; 2022 - <span id="currentYear">{{ date('Y') }}</span>, Advance Skin Hair Laser Clinic. All Rights Reserved.
      </div>
    </div>
  </footer>
  <!-- // End of footer -->

  <!-- Fixed Bottom Navigation Bar (Phone | Center Appointment | Email) -->
  <div class="bottomfooterfixed">
    <div class="bff-bar-container">
      <!-- SVG Upward Bump in Center -->
      <div class="bff-notch-wrap">
        <svg class="bff-notch-svg" width="140" height="24" viewBox="0 0 140 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M 0 20 L 40 20 C 52 20 58 14 62 7 C 65 2 68 2 70 2 C 72 2 75 2 78 7 C 82 14 88 20 100 20 L 140 20 L 140 24 L 0 24 Z" fill="#FFFFFF" />
          <path d="M 0 20 L 40 20 C 52 20 58 14 62 7 C 65 2 68 2 70 2 C 72 2 75 2 78 7 C 82 14 88 20 100 20 L 140 20" stroke="#E5D5BA" stroke-width="1.5" fill="none" />
          <circle cx="70" cy="11" r="3" fill="#B38D32" />
        </svg>
      </div>

      <!-- Column 1: Phone -->
      <a href="tel:+917061400830" class="bff-col bff-phone" aria-label="contact">
        <div class="bff-icon-wrap">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
          </svg>
        </div>
        <span class="bff-text">Phone</span>
      </a>

      <!-- Column 2: Center Active Item (Request An Appointment) -->
      <a href="{{ url('schedule-a-consultation') }}" class="bff-col bff-center active" aria-label="Appointment">
        <div class="bff-icon-wrap">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
            <line x1="16" y1="2" x2="16" y2="6"></line>
            <line x1="8" y1="2" x2="8" y2="6"></line>
            <line x1="3" y1="10" x2="21" y2="10"></line>
            <path d="M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01M16 18h.01"></path>
          </svg>
        </div>
        <span class="bff-text">Request An Appointment</span>
      </a>

      <!-- Column 3: Email -->
      <a href="mailto:info@advanceskinhairclinic.com" class="bff-col bff-email" aria-label="Email">
        <div class="bff-icon-wrap">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
            <polyline points="22,6 12,13 2,6"></polyline>
          </svg>
        </div>
        <span class="bff-text">Email</span>
      </a>
    </div>
  </div>

  <!-- Scroll to Top Button -->
  <a href="#" id="scrollToTopBtn" class="scroll-to-top" aria-label="Scroll to Top">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
      <path d="M18 15l-6-6-6 6"/>
    </svg>
  </a>

  <!-- Floating WhatsApp Button -->
  <a href="https://api.whatsapp.com/send?phone=917667445571&amp;text=Hi" class="whatsapplink" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
    <svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor">
      <path d="M12.031 0C5.404 0 0 5.394 0 12.016c0 2.115.551 4.175 1.597 5.986L0 24l6.166-1.618a11.97 11.97 0 005.865 1.535c6.627 0 12.031-5.394 12.031-12.016C24.062 5.394 18.658 0 12.031 0zm0 22.022a9.96 9.96 0 01-5.076-1.391l-.364-.216-3.766.988 1.006-3.67-.238-.379a9.948 9.948 0 01-1.522-5.336c0-5.508 4.482-9.99 9.96-9.99 5.478 0 9.96 4.482 9.96 9.99 0 5.508-4.482 9.99-9.96 9.99zm5.46-7.48c-.299-.149-1.767-.872-2.041-.971-.274-.1-.473-.149-.672.149-.199.299-.772.971-.947 1.17-.174.199-.349.224-.648.075-.299-.149-1.262-.465-2.403-1.484-.888-.792-1.488-1.77-1.662-2.069-.174-.299-.019-.461.13-.61.135-.133.299-.349.448-.523.149-.174.199-.299.299-.498.099-.199.05-.373-.025-.523-.075-.149-.672-1.62-.921-2.217-.243-.583-.49-.504-.672-.514-.174-.01-.373-.01-.572-.01s-.523.075-.797.373c-.274.299-1.046 1.021-1.046 2.49 0 1.47 1.071 2.89 1.221 3.089.149.199 2.109 3.22 5.109 4.516.713.308 1.27.493 1.704.63.716.228 1.368.196 1.883.119.575-.086 1.767-.722 2.016-1.42.249-.697.249-1.294.174-1.42-.075-.125-.274-.199-.573-.348z"/>
    </svg>
  </a>

  <!-- Start of Video Modal -->
  <div id="youtubemodal" class="modal-backdrop video-modal" role="dialog" aria-hidden="true" style="display:none;">
    <div class="video-modal-dialog">
      <button type="button" class="video-modal-close" onclick="closeVid()" aria-label="Close Modal">&times;</button>
      <div class="video-modal-body">
        <iframe id="videoIframe" src="" title="YouTube Video Player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>
  <!-- // End of Video Modal -->

  <!-- jQuery Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Main JavaScript File -->
  <script src="{{ asset('new-website/js/main.js') }}" defer></script>

  <!-- Interactive Logic & Form Scripts -->
  <script type="text/javascript">
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');
    if (scrollToTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 250) {
                scrollToTopBtn.classList.add('show');
            } else {
                scrollToTopBtn.classList.remove('show');
            }
        });

        scrollToTopBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // Global Video Modal Functions
    window.setVid = function (url) {
        const modal = document.getElementById('youtubemodal');
        const iframe = document.getElementById('videoIframe');
        if (iframe) {
            iframe.src = url;
        }
        if (modal) {
            modal.style.display = 'flex';
            setTimeout(() => {
                modal.classList.add('active');
            }, 10);
            document.body.style.overflow = 'hidden';
        }
    };

    window.closeVid = function () {
        const modal = document.getElementById('youtubemodal');
        const iframe = document.getElementById('videoIframe');
        if (modal) {
            modal.classList.remove('active');
            setTimeout(() => {
                modal.style.display = 'none';
            }, 300);
            document.body.style.overflow = '';
        }
        if (iframe) {
            iframe.src = '';
        }
    };

    // Number key filter
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    // Initialize Datepicker
    $(document).ready(function() {
        if ($('.dateselect').length) {
            $('.dateselect').datepicker({
                format: 'dd/mm/yyyy',
                startDate: 'today',
                autoclose: true
            });
        }
        appointmentForm();
        requestForm();
    });

    // Captcha loader for Appointment
    function appointmentForm() {
        if ($("#captcha_appointment").length) {
            $.ajax({
                type: "get",
                url: "{{ url('/googlecaptcha') }}",
                data: { 'post': 'ok' },
                dataType: 'json',
                success: function(result) {
                    var img = result ? (result.captchashows || result.captcha) : '';
                    var uid = result ? (result.uniqid || result.unic) : '';
                    if (img) {
                        $("#captcha_appointment").html(img);
                    }
                    if (uid) {
                        $("#code1_appointment").val(uid);
                    }
                },
                error: function(err) {
                    console.log("Appointment captcha load error:", err);
                }
            });
        }
    }

    // Captcha loader for Contact / Callback Request
    function requestForm() {
        if ($("#captcha_request").length || $("#captcha_request_mobile").length) {
            $.ajax({
                type: "get",
                url: "{{ url('/googlecaptcha') }}",
                data: { 'post': 'ok' },
                dataType: 'json',
                success: function(result) {
                    var img = result ? (result.captchashows || result.captcha) : '';
                    var uid = result ? (result.uniqid || result.unic) : '';
                    if (img) {
                        $("#captcha_request").html(img);
                        $("#captcha_request_mobile").html(img);
                    }
                    if (uid) {
                        $("#code1_request").val(uid);
                    }
                },
                error: function(err) {
                    console.log("Request captcha load error:", err);
                }
            });
        }
    }

    // Form validation and submission
    function checkvalidation(getid) {
        var phoneminLength = 9;
        var checkcode = false;
        var checkname = false;
        var checkemail = false;
        var checkphone = false;
        var checkdate = false;

        var page = document.getElementById("page" + getid) ? document.getElementById("page" + getid).value : 'appointment';
        var name = document.getElementById("name" + getid) ? document.getElementById("name" + getid).value.trim() : '';
        var code1_appointment = document.getElementById("code1_appointment") ? document.getElementById("code1_appointment").value : '';
        var phone = document.getElementById("phone" + getid) ? document.getElementById("phone" + getid).value.trim() : '';
        var captcha = document.getElementById("captcha" + getid) ? document.getElementById("captcha" + getid).value.trim() : '';
        var dateEl = document.getElementById("date" + getid);
        var date = dateEl ? dateEl.value.trim() : '';

        // Validate Date
        if (dateEl) {
            if (date == '') {
                var el = document.getElementById("validdate" + getid);
                if (el) el.innerHTML = 'This field is required.';
            } else {
                checkdate = true;
                var el = document.getElementById("validdate" + getid);
                if (el) el.innerHTML = '';
            }
        } else {
            checkdate = true;
        }

        // Validate Captcha
        if (captcha == '') {
            var el = document.getElementById("validcaptcha" + getid);
            if (el) el.innerHTML = 'This field is required.';
        } else {
            checkcode = true;
            var el = document.getElementById("validcaptcha" + getid);
            if (el) el.innerHTML = '';
        }

        // Validate Name
        var regName = /^[a-zA-Z\s.]+$/;
        if (name == '') {
            var el = document.getElementById("validname" + getid);
            if (el) el.innerHTML = 'This field is required.';
        } else if (!regName.test(name)) {
            var el = document.getElementById("validname" + getid);
            if (el) el.innerHTML = 'Please enter a valid name.';
        } else {
            checkname = true;
            var el = document.getElementById("validname" + getid);
            if (el) el.innerHTML = '';
        }

        // Validate Email
        var emailEl = document.getElementById("email" + getid);
        if (emailEl) {
            var email = emailEl.value.trim();
            var regex = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
            if (email == '') {
                var el = document.getElementById("validemail" + getid);
                if (el) el.innerHTML = 'This field is required.';
            } else if (!regex.test(email)) {
                var el = document.getElementById("validemail" + getid);
                if (el) el.innerHTML = 'Please enter a valid email address.';
            } else {
                checkemail = true;
                var el = document.getElementById("validemail" + getid);
                if (el) el.innerHTML = '';
            }
        } else {
            checkemail = true;
        }

        // Validate Phone
        var phone_Exp = /^[6,7,8,9][0-9]{9}$/;
        if (phone == '') {
            var el = document.getElementById("validphone" + getid);
            if (el) el.innerHTML = 'This field is required.';
        } else if (!phone_Exp.test(phone)) {
            var el = document.getElementById("validphone" + getid);
            if (el) el.innerHTML = 'Please enter a valid 10-digit mobile number.';
        } else {
            checkphone = true;
            var el = document.getElementById("validphone" + getid);
            if (el) el.innerHTML = '';
        }

        if (checkname && checkemail && checkphone && checkcode && checkdate) {
            var url = (page === 'contactus') ? "{{ url('/contactussave') }}" : "{{ url('/appointmentsave') }}";
            var code = (page === 'contactus' && document.getElementById("code1_request")) ? document.getElementById("code1_request").value : code1_appointment;
            getFormData(url, getid, code);
        }
    }

    function getFormData(urlsend, serialno, code) {
        var token = $("#token" + serialno).val();
        var name = $('#name' + serialno).val();
        var email = $('#email' + serialno).val();
        var phone = $('#phone' + serialno).val();
        var date = $('#date' + serialno).length ? $('#date' + serialno).val() : '';
        var message = $('#message' + serialno).length ? $('#message' + serialno).val() : '';
        var captcha = $('#captcha' + serialno).val();

        $("#loading" + serialno).show();
        $("#submit" + serialno).prop('disabled', true);

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
                window.location.href = "{{ url('/thank-you') }}";
            },
            error: function(result) {
                $("#loading" + serialno).hide();
                $("#submit" + serialno).prop('disabled', false);
                if (result.status === 400) {
                    var el = document.getElementById("validcaptcha" + serialno);
                    if (el) el.innerHTML = 'Captcha code is not valid.';
                    $('#captcha' + serialno).val('');
                    if (serialno === '1') {
                        appointmentForm();
                    } else {
                        requestForm();
                    }
                } else {
                    alert("Submission failed. Please check your inputs and try again.");
                }
            }
        });
    }

    // Scroll to appointment section when clicking trigger buttons
    document.addEventListener('click', function(e) {
        if (e.target && (e.target.classList.contains('trigger-appointment') || e.target.closest('.trigger-appointment'))) {
            var appSection = document.getElementById('appointment-section');
            if (appSection) {
                e.preventDefault();
                appSection.scrollIntoView({ behavior: 'smooth' });
            } else {
                window.location.href = "{{ url('schedule-a-consultation') }}";
            }
        }
    });
  </script>
</body>
</html>