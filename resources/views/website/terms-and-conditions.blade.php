@include('website.header')

<link href="{{ asset('new-website/css/privacy.css') }}" rel="stylesheet"/>

<main class="main">

  <!-- Start of BreadCrumb -->
  <section class="breadcrumbsection">
    <div class="breadcrumbcontainer">
      <h1 class="commonheading">Terms &amp; Conditions</h1>
      <ul class="breadcrumblist">
        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="breadcrumb-link">Home</a></li>
        <li class="breadcrumb-item">Terms &amp; Conditions</li>
      </ul>
    </div>
  </section>
  <!-- // End of BreadCrumb -->

  <!-- Start of privacypage -->
  <section class="privacypage">
    <div class="privacyconatiner">
      <p>
        Welcome to <strong>Dr. Punkesh's Advance Skin, Hair &amp; Laser Clinic</strong>. By accessing or using our website (<a href="https://www.advanceskinhairclinic.com/">https://www.advanceskinhairclinic.com/</a>) or scheduling an appointment for clinical, aesthetic, laser, or hair restoration services, you agree to be bound by the following Terms and Conditions. Please review them carefully prior to availing our services.<br/><br/>
        These terms govern your access to our clinical facility, consultation procedures, treatments, payment transactions, and website interactions. If you do not agree with any part of these terms, please refrain from using our website or scheduling appointments with our clinic.
      </p>

      <h2 class="cardtitle">1. Consultations &amp; Medical Procedures</h2>
      <p>
        All clinical evaluations, diagnosis, and treatment recommendations are provided by qualified dermatologists and medical professionals at Advance Skin, Hair &amp; Laser Clinic. Consultations are scheduled based on mutual convenience and clinic availability.<br/><br/>
        Every individual's skin, scalp, and systemic health status is unique. A clinical examination is mandatory prior to undergoing any dermatological procedure, laser therapy, or aesthetic intervention. The clinic reserves the right to decline or postpone any procedure if, in the treating physician's professional opinion, the treatment is not medically indicated or poses a health risk to the patient.
      </p>

      <h2 class="cardtitle">2. Appointments, Rescheduling &amp; Cancellations</h2>
      <p>
        Appointments can be scheduled through our website consultation form, direct telephone calls, or in-person at our reception desk. We request patients to arrive at least 10–15 minutes prior to their scheduled appointment time to complete any required clinical paperwork or pre-treatment preparations.<br/><br/>
        If you need to reschedule or cancel an appointment, please notify our reception team at least 24 hours in advance. While we make every endeavor to adhere to scheduled consultation times, unforeseen clinical emergencies or procedural extensions may occasionally cause delays. We appreciate your patience and understanding in such circumstances.
      </p>

      <h2 class="cardtitle">3. Treatment Plans &amp; Package Guidelines</h2>
      <p>
        Certain advanced aesthetic and laser treatments (e.g., Laser Hair Reduction, Acne Scar Resurfacing, PRP Therapy) require multiple sequential sessions to achieve optimal outcomes. Treatment packages are customized for the registered patient and are strictly non-transferable and non-refundable.<br/><br/>
        Package validity periods and session intervals will be communicated at the time of enrollment. Patients are strongly advised to adhere to the recommended session timelines and follow pre- and post-procedure medical instructions diligently to ensure safety and desired efficacy.
      </p>

      <h2 class="cardtitle">4. Pricing &amp; Payment Terms</h2>
      <p>
        Consultation fees, procedure charges, and product costs are due at the time the service is rendered, unless an advance package plan has been selected. We accept payment via cash, credit/debit cards, UPI, digital payment wallets, and direct bank transfers.<br/><br/>
        All fees are subject to applicable taxes as mandated by regulatory authorities. The clinic reserves the right to revise treatment prices and consultation tariffs without prior notice. Prevailing rates at the time of service execution will apply.
      </p>

      <h2 class="cardtitle">5. Patient Responsibilities &amp; Medical Disclosures</h2>
      <p>
        Patients are required to provide complete, accurate, and truthful information concerning their medical history, known allergies, ongoing medications, prior cosmetic or surgical interventions, pregnancy status, and lifestyle factors during consultation.<br/><br/>
        Withholding relevant medical history or failure to follow post-procedure care protocols can adversely affect treatment results and increase the risk of complications. Advance Skin, Hair &amp; Laser Clinic will not be held liable for adverse reactions resulting from undisclosed medical conditions or non-compliance with post-care instructions.
      </p>

      <h2 class="cardtitle">6. Website Use &amp; Intellectual Property</h2>
      <p>
        All content on this website—including text, graphics, logos, procedural descriptions, photographs, and layouts—is the intellectual property of Advance Skin, Hair &amp; Laser Clinic and Dr. Punkesh Kumar. Unauthorized reproduction, distribution, modification, or commercial exploitation of any website content without prior written permission is strictly prohibited.
      </p>

      <h2 class="cardtitle">7. Governing Law &amp; Jurisdiction</h2>
      <p>
        These Terms and Conditions shall be governed by and construed in accordance with the laws of India. Any disputes, claims, or controversies arising out of or related to our clinical services or website usage shall be subject to the exclusive jurisdiction of the competent courts in Patna, Bihar, India.
      </p>

      <h2 class="cardtitle">8. Contact Information</h2>
      <p>
        For any questions, clarifications, or feedback regarding these Terms and Conditions, please contact us at:<br/><br/>
        <strong>Dr. Punkesh's Advance Skin, Hair &amp; Laser Clinic</strong><br/>
        50 feet East of Dinkar Golambar, J566+52F, RK Ave, in front of Mittal traders, Bangali Akhara, Rajendra Nagar, Patna, Bihar 800016<br/>
        Phone: +91-7061400830 | +91-7667445571<br/>
        Email: <a href="mailto:info@advanceskinhairclinic.com">info@advanceskinhairclinic.com</a>
      </p>
    </div>
  </section>
  <!-- // End of privacypage -->

  <!-- Start of Appointment form -->
  @include('website.common-appointment')

</main>

@include('website.footer')
