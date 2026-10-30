@include('website/header')

<section class="privacypolicypage">
  <div class="container con_cus test-d">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-8">
        <h1 class="mt-lg-0 mt-md-0">Privacy Policy</h1>
        <p>At <strong>Advance Skin, Hair & Laser Clinic</strong>, we are committed to maintaining the highest standards of integrity and confidentiality in handling personal information. This Privacy Policy outlines our practices concerning the collection, use, disclosure, and protection of personal data, in accordance with applicable data protection laws and ethical medical standards.<p>
        <p>We may collect personally identifiable information including, but not limited to, your full name, age, gender, contact details (such as phone number, email address, and residential address), medical history, treatment records, payment and billing details, and clinical photographs (with your explicit consent). This information is obtained through consultations, registration forms, and digital interactions to facilitate accurate medical assessments and the delivery of personalized treatment plans.<p>
        <p>The information collected is utilized solely for legitimate clinical, administrative, and operational purposes. These include maintaining comprehensive medical records, facilitating ongoing care and follow-ups, processing payments, enhancing the quality of services, and providing timely updates regarding your treatment or clinic-related communications. All personal data is securely stored and accessible only to authorized personnel, ensuring robust protection against unauthorized access, alteration, or disclosure.<p>
        <p>Advance Skin, Hair & Laser Clinic does not sell, rent, or trade personal information to third parties. Information may be shared strictly on a need-to-know basis with internal medical professionals or trusted third-party service providers (such as payment gateways), where such sharing is essential for the provision of services. Additionally, disclosure of personal information may occur if required by law, regulatory bodies, or judicial authorities.<p>
        <p>Patients reserve the right to access and review their personal data, request corrections or updates, withdraw consent for non-essential communications, and, where applicable, request deletion of their data, subject to regulatory retention requirements. In the event of website usage, we may collect anonymized data through cookies and analytics tools to improve user experience. Users have the option to manage cookie preferences via browser settings.<p>
        <p>This Privacy Policy is subject to periodic review and may be updated to reflect changes in regulatory requirements, operational procedures, or technological advancements. Any amendments will be made available on our official website, with the date of revision clearly indicated.
        <p>For any queries, concerns, or requests related to this Privacy Policy or your personal data, please contact:<p>
        
        <h2>Payment Policy</h2>
<p>At Advance Skin, Hair & Laser Clinic, we are dedicated to maintaining a transparent, client-friendly, and professional approach to financial transactions. This Payment Policy outlines the terms related to billing, payment, cancellations, and refunds for all clinical and cosmetic services offered at our facility.</p>
<p>All services, including consultations, diagnostics, treatments, and product purchases, are payable in full at the time of service unless prior arrangements have been approved in writing. We accept multiple payment methods for your convenience, including cash, major credit and debit cards (Visa, MasterCard, etc.), UPI-based payments, digital wallets, and direct bank transfers (for advance bookings or package purchases). Certain treatments or high-value procedures may require an advance payment prior to the scheduled appointment.</p>
<p>Clients opting for package-based treatments or multi-session services are required to complete full payment in advance unless otherwise communicated. These packages are strictly non-transferable and are valid only for the individual registered at the time of purchase. The duration of validity and usage guidelines for such packages will be clearly explained upon enrollment.</p>
<p>Please note that payments made towards consultations, individual sessions, or treatment packages are generally non-refundable. Refunds will only be considered under specific circumstances and at the sole discretion of clinic management. In cases where a partial refund may be warranted—for instance, due to incomplete use of a treatment package—refunds will be reviewed and processed on a case-by-case basis. If approved, the refund will be initiated via the original mode of payment within 10–15 working days.</p>
<p>To help us serve you efficiently, we kindly request that clients notify us at least 24 hours in advance if they wish to cancel or reschedule an appointment. Appointments cancelled or missed without such notice may incur a cancellation fee. Repeated no-shows may result in the forfeiture of prepaid sessions, particularly in the case of packages. For treatments requiring resource allocation (e.g., laser therapy or specialized equipment), an advance booking fee may be collected and may be forfeited in case of late cancellations.</p>
<p>All prices are subject to applicable government taxes. The clinic reserves the right to revise prices, promotional offers, or service structures at its discretion and without prior notice. Clients will be charged based on the prevailing rates on the day the service is availed.</p>
<p>In case of any concerns, discrepancies, or disputes regarding billing or payments, we encourage clients to contact our billing desk or clinic administrator for swift resolution. By availing any services at Advance Skin, Hair & Laser Clinic, the client acknowledges and agrees to the terms outlined in this Payment Policy. A copy of this policy is available on request and may be updated periodically to reflect any changes in regulations or internal processes.</p>
<p>For any queries or payment-related assistance, please contact Advance Skin, Hair & Laser Clinic at Advance clinic, email us at <a href="mailto:info@advanceskinhairclinic.com">info@advanceskinhairclinic.com</a>, or visit our website at <a href="https://www.advanceskinhairclinic.com/">https://www.advanceskinhairclinic.com/</a></p>
<p><strong>Advance Skin, Hair & Laser Clinic</strong><br/>
        +91-7061400830 | +91-7667445571</p>
</div>

      <div class="col-12 col-sm-12 col-md-12 col-lg-4">
        <div class="blogsform form-section">
          <h5 class="text-p">SCHEDULE A CONSULTATION</h5>
          <form method="POST" class="form">
            <input type="hidden" id="page1" value="appointment">
            <input type="hidden" id="getid" value="1">
            <input type="hidden" name="_token" id="token1" value="{{ csrf_token() }}">
            <div class="row">
              <div class="col-md-12">
                <input placeholder="Name*" type="text" id="name1" name="name">
                <p id="validname1" class="error"></p>
              </div>

              <div class="col-md-12">
                <input placeholder="Email*" type="email" id="email1" name="email">
                <p id="validemail1" class="error"></p>
              </div>

              <div class="col-md-12">
                <input placeholder="Phone*" type="tel" id="phone1" onkeypress='return isNumberKey(event)' maxlength="10" name="phone">
                <p id="validphone1" class="error"></p>
              </div>

              <div class="col-md-12 calcdat">
                <div class="calender">
                  <input type="text" id="date1" name="date" class="dateselect form-control for-icon" placeholder="Date*" autocomplete="off"> <span class="dateselect fa  fa-calendar"></span>
                  <p id="validdate1" class="error"></p>
                </div>
              </div>

              <div class="col-md-12">
                <textarea style="font-size: 1.6rem" placeholder="Message" id="message1" name="message"></textarea>
              </div>

              <div class="col-md-6" style="margin-top: 1.5rem;">
                <div class="cptchabox">
                  <div id="captcha_appointment"></div>
                  <button type="button" onclick="appointmentForm()" class="comBtn BtnRfresh" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                </div>
              </div>

              <div class="col-md-6" style="margin-top: 1.5rem;">
                <input type="hidden" id="code1_request">
                <input type="hidden" id="code1_appointment">
                <input type="hidden" id="code1_request_mobile">
                <input type="text" name="captcha" id="captcha1" class="form-control" maxlength="6" autocomplete="off" placeholder="Enter code">
                <p id="validcaptcha1" class="error"></p>
              </div>

              <div class="col-md-12 " style="text-align: right;  margin-top: 1.5rem;">
                <input value="Submit" id="submit1" class="sub-but" type="button" onclick="checkvalidation('1')">
                <img style="height: 50px; display:none;" src="{{url('website/loading-gif.gif')}}" id="loading1" alt="Wait" />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@include('website/footer')