<!-- Start of APPOINTMENT SECTION -->
<section id="appointment-section" class="appointment-map-section">
    <div class="appointment-map-grid">

        <!-- Left Column: Request An Appointment Form -->
        <div class="appointment-form-col">
            <h2 class="appointment-main-title">
                REQUEST<br /> AN APPOINTMENT
            </h2>
            <form id="requestAppointmentForm" class="appointment-section-form" method="POST" onsubmit="return false;">
                <input type="hidden" id="page1" value="appointment">
                <input type="hidden" id="getid" value="1">
                <input type="hidden" name="_token" id="token1" value="{{ csrf_token() }}">
                <input type="hidden" id="code1_request">
                <input type="hidden" id="code1_request_mobile">
                <input type="hidden" id="code1_appointment">

                <div class="form-row-2col">
                    <div class="form-input-wrap">
                        <input type="text" class="app-input" id="name1" name="name"
                            placeholder="ENTER FULL NAME" required>
                        <p id="validname1" class="error"></p>
                    </div>
                    <div class="form-input-wrap">
                        <input type="email" class="app-input" id="email1" name="email"
                            placeholder="ENTER EMAIL ADDRESS" required>
                        <p id="validemail1" class="error"></p>
                    </div>
                </div>

                <div class="form-row-2col">
                    <div class="form-input-wrap">
                        <input type="tel" class="app-input" id="phone1" name="phone"
                            onkeypress="return isNumberKey(event)" maxlength="10" placeholder="ENTER PHONE NO."
                            required>
                        <p id="validphone1" class="error"></p>
                    </div>
                    <div class="form-input-wrap date-input-wrap">
                        <input type="date" id="date1" name="date" class="app-input"
                            placeholder="SELECT DATE" min="{{ date('Y-m-d') }}" required autocomplete="off">
                        <span class="calendar-icon" onclick="var inp=document.getElementById('date1'); inp.focus(); try{inp.showPicker();}catch(e){}" title="Select Date">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#7A7063"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </span>
                        <p id="validdate1" class="error"></p>
                    </div>
                </div>

                <div class="form-row-full">
                    <textarea class="app-textarea" id="message1" name="message" placeholder="TYPE MESSAGE HERE..." rows="4" required></textarea>
                </div>

                <!-- Bottom Action Row: Captcha & Submit Button -->
                <div class="appointment-bottom-row">
                    <!-- Captcha Component -->
                    <div class="captcha-box-wrap">
                        <div class="captchaimage" id="captcha_appointment">
                            <img src="{{ asset('new-website/images/captcha.webp') }}" loading="lazy" width="150"
                                height="44" alt="captcha">
                        </div>
                        <button type="button" onclick="appointmentForm()" id="refreshCaptchaBtn"
                            class="captcha-refresh-btn" title="Refresh Captcha" aria-label="Refresh Captcha">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1A1A1A"
                                stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 4 23 10 17 10"></polyline>
                                <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="captcha-input-wrap">
                        <input type="text" name="captcha" id="captcha1" class="app-input captcha-input" maxlength="6"
                            autocomplete="off" placeholder="ENTER CODE">
                        <p id="validcaptcha1" class="error"></p>
                    </div>

                    <!-- Submit Button -->
                    <div class="submit-btn-wrap">
                        <button type="button" id="submit1" onclick="checkvalidation('1')" class="app-submit-btn"
                            aria-label="Submit">SUBMIT</button>
                        <img class="form-loading-img" src="{{ url('website/loading-gif.gif') }}" id="loading1" alt="Wait" style="display: none;" />
                    </div>
                </div>
            </form>
        </div>

        <!-- Right Column: Interactive Map & Location Badge -->
        <div class="appointment-map-col">
            <iframe class="clinic-google-map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3597.8287826258356!2d85.1598961!3d25.610605099999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ed5941543fadcb%3A0xe4e9ab711450dccb!2sDr.%20Punkesh's%20Advance%20Skin%20Hair%20and%20Laser%20Clinic!5e0!3m2!1sen!2sin!4v1791003959172!5m2!1sen!2sin"
                width="600" height="450" title="Google Maps showing the clinic location"
                allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>

            <!-- Floating Location Address Overlay Card -->
            <div class="map-location-card">
                <div class="location-gold-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                    </svg>
                </div>
                <div class="location-card-text">
                    <div class="locationname">Dr. Punkesh's Advance Skin Hair and Laser Clinic</div>
                    50 feet East of Dinkar Golambar, J566+52F, RK Ave, in front of Mittal traders, Bangali Akhara,
                    Rajendra
                    Nagar, Patna, Bihar 800016
                </div>
            </div>
        </div>

    </div>
</section>
<!-- // End of APPOINTMENT SECTION -->
