@extends('frontend.master')

@section('content')
{{-- @php
    $privacy_policy =  \App\Models\Page::where('type', 'privacy_policy_page')->first();
@endphp
<section class="pt-4 mb-4">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <h1 class="fw-600 h4">{{ $privacy_policy->getTranslation('title') }}</h1>
            </div>
            <div class="col-lg-6">
                <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
                    <li class="breadcrumb-item opacity-50">
                        <a class="text-reset" href="{{ route('home') }}">{{ translate('Home')}}</a>
                    </li>
                    <li class="text-dark fw-600 breadcrumb-item">
                        <a class="text-reset" href="{{ route('privacypolicy') }}">"{{ translate('Privacy Policy') }}"</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section> --}}
{{-- <section class="mb-4">
    <div class="container">
        <div class="p-4 bg-white rounded shadow-sm overflow-hidden mw-100 text-left">
            @php
                echo $privacy_policy->getTranslation('content');
            @endphp
        </div>
    </div>
</section> --}}

<section class="pageTitle"
      style="background-image:url({{static_asset('assets_web/img/small_banner.jpg')}});height: 240px; background-size: contain;">
      <div class="container">
      </div>
   </section>
   <!--top banner end -->
   <div class="discription_section new-post">
      <div class="container">
         <div class="row">
            <div class="col-md-12 breadmcrumsize">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
                  </ol>
               </nav>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">

               <div class="ebuild_terms product-box1">
                  <div class="discrptions">

                     <div class="border-bottom1 border-color-111 mt-3 mb-3">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18"> {{ env('APP_NAME') }} Privacy Policy
                        </h3>
                        <div class="deals">
                           <hr>
                        </div>
                     </div>
                     <div>
                        <p><strong><em>Updated June 13, 2024</em></strong></p>

                        <p>Growciti Tech Services Private Limited (here in after referred to as Growciti) is committed to
                           safeguarding its
                           users’ privacy (hereinafter referred to as “You”) accessing its website <a
                              href="https://growciti.in/"> www.growciti.in </a> (hereinafter referred
                           to as “Website”) and has provided this privacy policy (hereinafter referred to as “Privacy
                           Policy”) to familiarise
                           the user with the manner in which Growciti collects, uses and discloses their information
                           collected through
                           the Website. Before you subscribe to and/or begin participating in or using the Website, you
                           agree that you have
                           fully read, understood, and accept the terms and conditions of this Privacy Policy.</p>
                        <p>The Policy applies to all information that Growciti has about you and your account. If
                           you do not wish to be
                           bound by the terms and conditions of this Privacy Policy, you may not proceed further to use
                           the Website. This
                           Policy should be at all times read along with the Terms of Use & Service of the Website,
                           available here.</p>
                        <p>This Privacy Policy is published in accordance with the provisions of Rule 3(1) of the
                           Information Technology
                           (Intermediaries Guidelines) Rules, 2011 that require publishing the rules and regulations,
                           the privacy policy for
                           access or usage of the Website.</p>

                        <p><strong>1. Collection of Information</strong></p>
                        <ol>
                           <li>Growciti collects information, including sensitive personal data and information
                              (hereinafter
                              referred to as “Information”), from the users, when they register to gain access to the
                              services provided
                              by Growciti, or registration in embedded APIs, or at other specific instances when
                              Growciti
                              deems it necessary and requests users to provide the Information.</li>
                           <li>For individuals, Information shall include, but not be limited to, the following:
                              Name of User; Date of Birth; Gender; Address; Geo-Location Details; Telephone Number;
                              E-Mail;
                              Address; Password(s); Financial Information such as et. al. Bank Account, Credit Card,
                              Debit Card or
                              other Payment Instrument Details; Social Media Details.</li>
                           <li>For business entities, Information shall include, but not be limited to, the following:
                              Name of User; Name of Business Entity; GST Number; CIN; Address; Geo-Location Details;
                              Telephone
                              Number; E-Mail Address; Password(s); Financial Information such as et. al. Bank Account,
                              Credit Card,
                              Debit Card, or other Payment Instrument Details; Social Media Details.</li>
                           <li>You can always choose not to provide information and in such cases, if the information
                              required is
                              classified as mandatory, you will not be able to avail of that part of the Services,
                              features, or content.
                              You can add or update your Personal Information on a regular basis. When you update
                              information,
                              Growciti will keep a copy of the prior version for its records. User in the case of
                              business entities
                              will either be the Director, or duly appointed Authorised Representative only.</li>
                           <li>Growciti’s primary goal in collecting information is to provide the user with a
                              customized
                              experience on our websites. This includes personalized services, interactive
                              communication, and other
                              services. Growciti collects your Personal Information in order to record, support, and
                              facilitate your
                              participation in the activities you select, track your preferences, to notify you of any
                              updated
                              information and new activities and other related functions offered by Growciti, keep
                              you informed
                              about the latest content available on the Website, special offers, and other products and
                              services of
                              Growciti, to provide you with a customized Website experience, to assist you with
                              customer service
                              or technical support issues, to follow up with you after your visit, to otherwise support
                              your relationship
                              with Growciti, or to prevent fraud and unlawful use.</li>
                           <li>Certain information may be collected when you visit the Website and such information may
                              be
                              stored in server logs in the form of data. Through this Data Growciti understand the
                              use and
                              number of users visiting the Website. Some or all data collected may be shared with the
                              sponsors,
                              investors, advertisers, developers, strategic business partners of Growciti. While
                              using the
                              Website, Growciti’s servers (hosted by a third-party service provider) may collect
                              information
                              indirectly and automatically about your activities on the Website, for instance by way of
                              cookies.</li>
                           <li>Promotions that run on our website may be sponsored by companies other than Growciti
                              or
                              may be co-sponsored by Growciti and another company. We use third-party service
                              providers to
                              serve ads on our behalf across the internet and sometimes on the Website. They may collect
                              information about your visits to our website. Growciti uses the log file which
                              includes but not
                              limited to internet protocol (IP) addresses, browser software, number of clicks, number of
                              unique
                              visitors, internet service provider, exit/referring pages, type of platform, date/time
                              stamp, screen
                              resolution, etc. for analysis that helps us provide you improved user experience and
                              services.</li>
                           <li>We record the buying and browsing activities of our users including but not limited to
                              your contact
                              details and profiles and use the same to provide value-added services to our users.</li>
                           <li>
                              We use them to administer the site, track a user’s movement, and gather broad demographic
                              information for aggregate use. Once a user registers, he/she is no longer anonymous to
                              Growciti
                              and it is deemed that you have given Growciti the right to use the personal &
                              non-personal
                              information.
                           </li>
                        </ol>

                        <p><strong>Use of Information</strong></p>
                        <ol>
                           <li>
                              Business information is used to display the user’s business listing or product offerings across our
                              website to fetch maximum business opportunities for the user. If you upload any content on the
                              Website and the same may be available to the other users of the Website. Growciti will not be
                              liable for the disclosure and dissemination of such content to any third-parties. Once the user’s content
                              is displayed on our website, the user may start receiving business enquiries through email, phone calls,
                              or SMS notifications, from third-parties that might or might not be of their interest, Growciti does
                              not exercise any control over it.
                           </li>
                           <li>
                              Growciti may, if you so choose, send direct advertisement mailers to you at the address given
                              by you which could contain details of the products or services displayed on Growciti or of any third-
                              party not associated with Growciti. You have the option to opt-out of this direct or third-party
                              mailer by clicking on the unsubscribed link option attached to the e-mail. Growciti respects your
                              privacy and if you do not want to receive e-mail or other communications from Growciti.
                           </li>
                        </ol>

                        <p><strong>Disclosure of Information</strong></p>
                        <p>In situations when Growciti is legally obligated to disclose information to the government or other
                           third parties, Growciti will do so.</p>

                        <p><strong>Sharing of information</strong></p>
                        <p>As a general rule, Growciti will not disclose or share any of the user’s personally identifiable
                           information except when Growciti has the user’s permission or under special circumstances, such
                           as when Growciti believes in good faith that the law requires it or as permitted in terms of this
                           policy.
                        </p>
                        <p>You are required to submit your information at the time of making an online purchase on the
                           Website. Growciti uses online payment gateways that are operated by either RazorPay, Bharatpe
                           or PayPal and the information that you share with Growciti is transferred and shared with such
                           third-party payment gateway operators. Privacy Policy of RazorPay, Bharatpe and PayPal are available
                           here, here and here. The RazorPay may also have access to your online purchase history/details that
                           you make from the Website. Extremely sensitive information, like your credit card or debit card details,
                           are transacted upon secure sites of approved payment gateways which are digitally under encryption,
                           thereby providing the highest possible degree of care as per current technology. You are advised,
                           however, to exercise discretion on usage.
                        </p>

                        <p><strong>Redirection to Third-Party Sites</strong></p>
                        <p>Links to third-party sites are provided by the Website as a convenience to user(s) and Growciti does
                           not have any control over such sites i.e. content and resources provided by them. Growciti may
                           allow user(s) access to content, products, or services offered by third-parties through hyperlinks (in the
                           form of word link, banners, channels or otherwise) to such third-party’s web site. You are cautioned to
                           read such sites’ terms and conditions and/or privacy policies before using such sites in order to be
                           aware of the terms and conditions of your use of such sites. You acknowledge and agree that
                           Growciti has no control over such third-party’s site, does not monitor such sites, and Growciti
                           shall not be responsible or liable to anyone for such third-party site, or any content, products, or
                           services made available on such a site.</p>

                        <p><strong>Protection of Information</strong></p>
                        <p>Links to third-party sites are provided by the Website as a convenience to user(s) and Growciti does
                           not have any control over such sites i.e. content and resources provided by them. Growciti may
                           allow user(s) access to content, products, or services offered by third-parties through hyperlinks (in the
                           form of word link, banners, channels or otherwise) to such third-party’s web site. You are cautioned to
                           read such sites’ terms and conditions and/or privacy policies before using such sites in order to be
                           aware of the terms and conditions of your use of such sites. You acknowledge and agree that
                           Growciti has no control over such third-party’s site, does not monitor such sites, and Growciti
                           shall not be responsible or liable to anyone for such third-party site, or any content, products, or
                           services made available on such a site.</p>

                        <p><strong>Protection of Information</strong></p>
                        <ol>
                           <li>
                              Growciti takes stringent steps, within its limits of commercial viability and necessity, to ensure
                              that the user’s information is always treated securely.
                           </li>
                           <li>
                              We request our users to sign out of their Growciti account and close their browser window
                              when they have finished their work. This is to ensure that others cannot access their personal or
                              business information and correspondence if the user shares the computer with someone else or is using
                              a computer in a public place.
                           </li>
                           <li>
                              Unfortunately, no data transmission over the Internet can be guaranteed to be 100% secure. As a
                              result, while Growciti strives to protect the user’s personal & business information, it cannot
                              ensure the security of any information transmitted to Growciti and you do so at your own risk.
                              Once Growciti receives your transmission, it makes best efforts to ensure its security in its systems.
                              Please keep in mind that whenever you post personal & business information online, that is accessible
                              to the public, you may receive unsolicited messages from other parties.
                           </li>
                           <li>
                              Growciti is not responsible for any breach of security or for any actions of any third parties that
                              receive your Information. The Website also linked to many other sites and we are not/shall not be
                              responsible for their privacy policies or practices as it is beyond our control.
                           </li>
                           <li>
                              Notwithstanding anything contained in this Policy or elsewhere, Growciti shall not be held
                              responsible for any loss, damage, or misuse of your Information, if such loss, damage or misuse is
                              attributable to a Force Majeure Event (as defined in Terms of Use).
                           </li>
                        </ol>

                        <p><strong>Communication Through Information</strong></p>
                        <p>Growciti may, from time to time, send its users emails and instant messages, through designated
                           platforms, regarding its products and services. Growciti constantly tries and improves the Website
                           for better efficiency, more relevancy, innovative business matchmaking, and better personal
                           preferences. Growciti may allow direct mails using its own scripts (without disclosing the email
                           address) with respect/pertaining to the products and services of third-parties that it feels may be of
                           interest to the user or if the user has shown interest in the same.
                        </p>

                        <p><strong>Amendment</strong></p>
                        <p>
                           The policy may be amended from time to time so please check periodically. The revised Policy shall be
                           made available on the Website. Your continued use of the Website, following changes to the Policy, will
                           constitute your acceptance of those changes. Any disputes arising under this Policy shall be governed
                           by the laws of India.
                        </p>
                        <p><strong>Grievance Redressal</strong></p>
                        <p>
                           Growciti has a designated grievance officer in compliance with Rule 5(9) of the Information
                           Technology (Reasonable Security Practices and Procedures and Sensitive Personal Data or Information)
                           Rules, 2011.
                           <br>
                           <b>Name: Aman Kumar
                           <br>
                           Email: kramansrivastava@gmail.com
                           </b>
                        </p>

                        <p><strong>Applicable Law</strong></p>
                        <p>Your use of this Website will be governed by and construed in accordance with the laws of India.</p>
                        <p>You agree that any legal action or proceedings arising out of your use may be brought exclusively
                           before the competent courts/fora/authorities having jurisdiction in Purnia, India and irrevocably
                           submit yourself to the jurisdiction of such courts/fora/authorities.
                        </p>
                        <p><em>Last Updated: 13th June 2024</em></p>
                     </div>
                  </div>
               </div>
            </div>


         </div>
      </div>
   </div>
@endsection
