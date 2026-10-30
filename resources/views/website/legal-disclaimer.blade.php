@include('website.header')

<link href="{{ asset('new-website/css/privacy.css') }}" rel="stylesheet"/>

<main class="main">

  <!-- Start of BreadCrumb -->
  <section class="breadcrumbsection">
    <div class="breadcrumbcontainer">
      <h1 class="commonheading">Legal Disclaimer</h1>
      <ul class="breadcrumblist">
        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="breadcrumb-link">Home</a></li>
        <li class="breadcrumb-item">Legal Disclaimer</li>
      </ul>
    </div>
  </section>
  <!-- // End of BreadCrumb -->

  <!-- Start of privacypage -->
  <section class="privacypage">
    <div class="privacyconatiner">
      <p>
        The information provided on this website (<a href="https://www.advanceskinhairclinic.com/">https://www.advanceskinhairclinic.com/</a>) by <strong>Dr. Punkesh's Advance Skin, Hair &amp; Laser Clinic</strong> is published in good faith and is intended solely for general informational and educational purposes. By accessing or using this site, you acknowledge and agree to the disclaimers set forth below.
      </p>

      <h2 class="cardtitle">1. No Medical Advice or Doctor-Patient Relationship</h2>
      <p>
        The content on this website—including articles, treatment descriptions, technology overviews, FAQs, and multimedia—does not constitute medical advice, diagnosis, or professional therapeutic guidance. It should not be used as a substitute for a comprehensive clinical consultation, diagnosis, or treatment by a licensed dermatologist or certified healthcare professional.<br/><br/>
        Browsing our website, submitting an appointment inquiry, or corresponding via electronic forms or emails does not establish a formal doctor-patient relationship. A doctor-patient relationship is created only after an in-person clinical assessment and formal registration at our clinical facility in Patna.
      </p>

      <h2 class="cardtitle">2. Individual Variability &amp; Treatment Outcomes</h2>
      <p>
        Dermatology, trichology, and aesthetic laser treatments are inherently biological and individualized. Response to any procedure—including but not limited to Laser Hair Removal, Pigmentation Correction, Acne Scar Treatments, Chemical Peels, and PRP Therapy—varies significantly from person to person based on age, skin type, genetic predisposition, lifestyle, systemic health, and compliance with pre- and post-procedure guidelines.<br/><br/>
        Advance Skin, Hair &amp; Laser Clinic does not guarantee identical, uniform, or permanent results for any medical or cosmetic procedure. Testimonials and case studies featured on the website reflect individual experiences and do not represent a guarantee of similar outcomes for all patients.
      </p>

      <h2 class="cardtitle">3. Before and After Photographs</h2>
      <p>
        Photographs and clinical imagery displayed on this website showcase actual clinical outcomes achieved by patients treated at Advance Skin, Hair &amp; Laser Clinic, published with their informed consent. These images are provided solely for visual reference and illustrative purposes to depict potential therapeutic changes. Results cannot be guaranteed to be identical for every individual, as physiological factors differ between patients.
      </p>

      <h2 class="cardtitle">4. Third-Party Links &amp; Content</h2>
      <p>
        Our website may contain links to external third-party websites, map locations, or resource providers for user convenience. Advance Skin, Hair &amp; Laser Clinic has no control over the content, privacy practices, or accuracy of information on external sites and assumes no responsibility for third-party materials.
      </p>

      <h2 class="cardtitle">5. Limitation of Liability</h2>
      <p>
        Under no circumstances shall Dr. Punkesh Kumar, Advance Skin, Hair &amp; Laser Clinic, or its staff be liable for any direct, indirect, incidental, consequential, or punitive damages arising out of your access to, use of, or inability to use this website, or any reliance placed on the information provided herein. Users are encouraged to seek direct medical evaluation from our clinic for any personal health inquiries.
      </p>

      <h2 class="cardtitle">6. Contact for Clinical Inquiries</h2>
      <p>
        If you have questions regarding our treatments, medical qualifications, or legal disclaimers, please reach out to us directly:<br/><br/>
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
