@include('website/header')

<link href="{{ asset('new-website/css/contact.css') }}" rel="stylesheet" />

<main class="main">

    <!-- Start of BreadCrumb -->
    <section class="breadcrumbsection">
        <div class="breadcrumbcontainer">
            <h1 class="commonheading">Contact Us</h1>
            <ul class="breadcrumblist">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}" class="breadcrumb-link">Home</a>
                </li>
                <li class="breadcrumb-item">Contact Us</li>
            </ul>
        </div>
    </section>
    <!-- // End of BreadCrumb -->

    <!-- Start of contactpage -->
    <section class="contactpage">
        <div class="container">
            <div class="contactgrid">

                <!-- Left Column: Contact Form -->
                <div class="contactleft">
                    <div class="contactleftbox">
                        <h3 class="contactheading">GET IN TOUCH</h3>
                        <form method="post" class="contactform"
                            onsubmit="event.preventDefault(); checkvalidation('3');">
                            <input type="hidden" id="page3" value="contactus">
                            <input type="hidden" id="getid" value="3">
                            <input type="hidden" name="_token" id="token3" value="{{ csrf_token() }}">
                            <input type="hidden" id="code1_request">

                            <div class="form-row-2col">
                                <div class="form-group">
                                    <input type="text" name="name" id="name3" autocomplete="off"
                                        class="form-control" placeholder="Name*" required>
                                    <p id="validname3" class="error"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" autocomplete="off" name="email"
                                        id="email3" placeholder="Email Address*" required>
                                    <p id="validemail3" class="error"></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="tel" class="form-control" autocomplete="off" name="phone"
                                    id="phone3" maxlength="10" placeholder="Phone No.*" required>
                                <p id="validphone3" class="error"></p>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="4" autocomplete="off" id="message3"
                                    placeholder="Message Here*"></textarea>
                            </div>

                            <!-- Captcha Row -->
                            <div class="form-row-2col">
                                <div class="form-group">
                                    <div class="contact-captcha-box">
                                        <div id="captcha_request" class="contact-captcha-img-wrap">
                                            <img src="{{ asset('new-website/images/captcha.webp') }}" loading="lazy"
                                                width="130" height="44" alt="captcha">
                                        </div>
                                        <button type="button" class="contact-captcha-refresh" onclick="requestForm()"
                                            title="Refresh Captcha" aria-label="Refresh Captcha">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <polyline points="23 4 23 10 17 10"></polyline>
                                                <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="captcha" id="captcha3" class="form-control contact-captcha-input"
                                        maxlength="6" autocomplete="off" placeholder="Enter code*" required>
                                    <p id="validcaptcha3" class="error"></p>
                                </div>
                            </div>

                            <div class="form-group contact-submit-group">
                                <button type="button" id="submit3" onclick="checkvalidation('3')"
                                    class="submitbtn">SUBMIT</button>
                                <div id="loading3" class="contact-loading">
                                    <img class="contact-loading-img" src="{{ url('website/loading-gif.gif') }}" alt="Wait" />
                                    <span class="contact-loading-text">Submitting, please wait...</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right Column: Contact Info -->
                <div class="contactright">
                    <div class="info-wrap">
                        <div class="addressbox">
                            <h3 class="contactheading">CONTACT INFO</h3>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                </svg>
                            </div>
                            <div class="info-details">
                                <h3>Dr. Punkesh's Advance Skin Hair and Laser Clinic</h3>
                                <p>50 feet East of Dinkar Golambar, J566+52F, RK Ave, in front of Mittal traders,
                                    Bangali Akhara, Rajendra Nagar, Patna, Bihar 800016</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                                </svg>
                            </div>
                            <div class="info-details">
                                <h3>CALL US</h3>
                                <p><a href="tel:+917061400830">+91-7061400830</a> / <a
                                        href="tel:+917667445571">+91-7667445571</a></p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                                </svg>
                            </div>
                            <div class="info-details">
                                <h3>EMAIL US</h3>
                                <p><a href="mailto:info@advanceskinhairclinic.com">info@advanceskinhairclinic.com</a>
                                </p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                                </svg>
                            </div>
                            <div class="info-details">
                                <h3>Clinic Timings</h3>
                                <p>Monday to Saturday : 10:00AM - 7:00PM</p>
                                <p>Sunday: Closed</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End of contactpage -->

    <!-- Start of mapbox -->
    <section class="mapbox">
        <iframe class="clinic-google-map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3597.8287826258356!2d85.1598961!3d25.610605099999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ed5941543fadcb%3A0xe4e9ab711450dccb!2sDr.%20Punkesh's%20Advance%20Skin%20Hair%20and%20Laser%20Clinic!5e0!3m2!1sen!2sin!4v1791003959172!5m2!1sen!2sin"
            width="100%" height="400" allowfullscreen="" loading="lazy"
            referrerpolicy="strict-origin-when-cross-origin"></iframe>
    </section>
    <!-- // End of mapbox -->

</main>

@include('website/footer')
