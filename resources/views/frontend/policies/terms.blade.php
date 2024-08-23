@extends('frontend.master')

@section('content')
{{-- @php
    $terms =  \App\Models\Page::where('type', 'terms_conditions_page')->first();
@endphp
<section class="pt-4 mb-4">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <h1 class="fw-600 h4">{{ $terms->getTranslation('title') }}</h1>
            </div>
            <div class="col-lg-6">
                <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
                    <li class="breadcrumb-item opacity-50">
                        <a class="text-reset" href="{{ route('home') }}">{{ translate('Home')}}</a>
                    </li>
                    <li class="text-dark fw-600 breadcrumb-item">
                        <a class="text-reset" href="{{ route('terms') }}">"{{ translate('Terms & conditions') }}"</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="mb-4">
    <div class="container">
        <div class="p-4 bg-white rounded shadow-sm overflow-hidden mw-100 text-left">
            @php
                echo $terms->getTranslation('content');
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
                     <li class="breadcrumb-item active" aria-current="page">Terms of Service</li>
                  </ol>
               </nav>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">

               <div class="ebuild_terms product-box1">
                  <div class="discrptions">

                     <div class="border-bottom1 border-color-111 mt-3 mb-3">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18"> Growciti Terms of
                           Service
                        </h3>
                        <div class="deals">
                           <hr>
                        </div>
                     </div>
                     <div>
                        <p><strong><em>Updated June 13, 2024</em></strong></p>

                        <p>Please read these conditions carefully before placing an order for any products or services
                           with the Vendors
                           registered with Growciti Tech Services Private Limited through Growciti Site (hereinafter referred
                           to as “Website” or
                           “Platform” or “Us”). These conditions signify the customer’s (hereinafter referred to as
                           “You”) agreement to be
                           bound by these conditions.
                        </p>
                        <p>In addition, when you use any current or future growciti.in service (e.g.: Account,
                           Cart, Wishlist,
                           Professional Services Page, Special Requests or Product Marketplace), you will also be
                           subject to these terms,
                           guidelines, and conditions as applicable (hereinafter referred to as “Terms”).
                        </p>
                        <p><strong>Conditions Relating to Sale</strong></p>
                        <p>
                           These terms deal with conditions relating to the sale of products and services on the Website
                           by
                           Vendors to you. You agree to these terms for each transaction made by you.
                        </p>
                        <p><strong>Our Contract</strong></p>
                        <ul>
                           <li>
                              Your order is an invitation to offer to the Vendor through Us and the Website to buy the
                              product/service from the Vendors on your behalf. When you place an order through Us to
                              purchase a
                              product/service from our Vendors, you give you authority to this extent, and you will
                              receive an email
                              confirming receipt of your order and details of your order (hereinafter referred to as
                              “Order
                              Confirmation Email”). The Order Confirmation Email is acknowledgement that we have
                              received your
                              order and does not confirm acceptance of your offer to buy the product/service ordered. We
                              only
                              accept your offer through our Vendors, and conclude the contract of sale for a
                              product/service ordered
                              by you, when the product/service is dispatched to you by the Vendor, after negotiations on
                              the final
                              price and amount if applicable and confirmation of the final price and amount and payment
                              towards
                              the product/service by you, post which an email confirmation is sent to you that the
                              product has been
                              dispatched to you by the Vendor (hereinafter referred to as "Dispatch Confirmation
                              Email"). If your
                              order is dispatched in more than one package, you may receive a separate Dispatch
                              Confirmation Emails
                              for each package, and each Dispatch Confirmation Email and corresponding dispatch will
                              conclude a
                              separate contract of sale between you and our Vendors for the product/service specified in
                              that
                              Dispatch Confirmation Email.
                           </li>
                           <li>
                              Your contract is with the Vendors, and we are an intermediary to this extent, and you
                              confirm that
                              the product/service ordered by you is in the capacity to contract. You authorize Us, as
                              well as the
                              Website, to declare and provide declaration to any governmental authority on your behalf
                              stating the
                              aforesaid purpose of the products ordered by you on the website.
                           </li>
                           <li>
                              You can cancel your order for a product at no cost any time before the Website sends the
                              Dispatch
                              Confirmation Email relating to that product/service.
                           </li>
                           <li>
                              Your confirmations on the platform, secured by adequate two-factor authentications, count
                              as your
                              final agreements towards the different stages of eCommerce prospects.
                           </li>
                           <li>
                              For the avoidance of doubt, it is clarified that any additional by-product or add-on
                              service will
                              constitute a separate contract between you and our Vendors. It is further clarified that
                              you will hold
                              Growciti Tech Services Private Limited harmless in the event of any discrepant act or omission on our
                              part.
                           </li>
                        </ul>
                        <p><strong> Replacement of Products </strong></p>
                        <ul>
                           <li>
                              Most products purchased from the Vendors listed on the Website are replaceable within the
                              replacement window, except those that are explicitly identified as non-replaceable. The
                              replacement
                              is processed only if:
                              <ul>
                                 <li>
                                    it is determined that the product was not damaged while in your possession;
                                 </li>
                                 <li>
                                    the product is not different from what was shipped to you;
                                 </li>
                                 <li>
                                    the product is returned in original condition (with brand’s/manufacturer's box, MRP
                                    tag
                                    intact, user manual, warranty card and accessories);
                                 </li>
                                 <li>
                                    for the products that are not replaceable or returned by the customer for any
                                    material
                                    defect without any stock availability, the refund is issued to the original payment
                                    method
                                    made by you; the timeline for receipt of such refund is solely dependent on your
                                    bank, which
                                    is usually 7-14 business days.
                                 </li>
                              </ul>
                           </li>
                           <li>
                              For the avoidance of doubt, as the orders made between you and our Vendors are in the
                              nature of
                              and for the purposes of et. al. heavy machinery, construction, wet-work, it is clarified
                              that we will not
                              be liable for a second replacement. In such a case, refund will be processed as per Clause
                              3.1.4 above.
                              Refund is subject to the discretion of the Company in cases where one or all the
                              conditions under Clause
                           </li>
                           <li>
                              above is not met, in which case such refund may be alternated with discounts and other
                              coupon
                              codes and offers as per the discretion of the vendor’s arrangement of doing so.
                           </li>
                        </ul>

                        <p><strong>Pricing and availability</strong></p>
                        <ul>
                           <li>
                              We list tentative availability information for products sold and services provided by our
                              Vendors on
                              the website, including on each product information/service profile page. Beyond what we
                              say on these
                              pages or otherwise on the Website, we cannot be more specific about availability. Please
                              note that
                              dispatch estimates are just that. They are not guaranteed dispatch times and should not be
                              relied upon
                              as such. As we process your order, you will be informed by email if any products/services
                              you order
                              turn out to be unavailable or unserviceable.
                           </li>
                           <li>
                              All prices are inclusive of VAT/CST, service tax, GST, duties, and cesses as applicable -
                              unless stated
                              otherwise.
                           </li>
                        </ul>

                        <p><strong>Taxes</strong></p>
                        <p>
                           You shall be responsible for payment of all fees/costs/charges associated with the purchase
                           of
                           products or services from our Vendors through Us and you agree to bear any and all applicable
                           taxes
                           including but not limited to VAT/CST, service tax, GST, duties, and cesses etc.
                        </p>

                        <p><strong>Your Account</strong></p>
                        <p>By creating an account with Us and usage of our Website, you are responsible for maintaining
                           the
                           confidentiality of your account and password and for restricting access to your computer to
                           prevent
                           unauthorised access to Your Account. You agree to accept responsibility for all activities
                           that occur
                           under your account or password. You should take all necessary steps to ensure that the
                           password is
                           kept confidential and secure and should inform the Website immediately if you have any reason
                           to
                           believe that your password has become known to anyone else, or if the password is being, or
                           is likely
                           to be, used in an unauthorised manner. Please ensure that the details you provide the Website
                           with
                           are correct and complete and inform the Website immediately of any changes to the information
                           that
                           you provided when registering. You can access and update much of the information you provided
                           Us
                           with in the Your Account area of the website. growciti.in reserves the right to refuse
                           access to
                           the Website, terminate Your Account, remove, or edit content at any time without notice to
                           you.
                        </p>

                        <p><strong>Privacy</strong></p>
                        <p>Please review the Privacy Policy available here, which also governs your visit to the
                           Website. The
                           personal information / data provided to the Website by you during the course of usage of
                           growciti.in will be treated as strictly confidential and in accordance with the Privacy
                           Policy and
                           applicable laws and regulations. If you object to your information being transferred or used,
                           please do
                           not use the Website.
                        </p>

                        <p><strong>Pricing</strong></p>
                        <p>
                           The pricing of all products and services on the Growciti platform would be derived from
                           the
                           vendors’ pricing model, as per the vendors’ and service providers’ pricing model.
                           Growciti will
                           charge a platform fee/convenience fee, shown in a transparent manner, added separately to the
                           product/service listing wherever applicable.
                        </p>

                        <p><strong>Refunds, Returns, and Cancellations</strong></p>
                        <ul>
                           <li>
                              With respect to the physical materials displayed on the platform, any refund and/or return
                              would
                              depend on the upon vendor’s ability and consent to accept a refund/return. The platform
                              would only
                              facilitate the communication of the same.
                           </li>
                           <li>
                              If you wish to, you can cancel your order for a product at no cost any time before the
                              Website sends
                              the Dispatch Confirmation Email relating to that product/service. Once the platform
                              dispatches your
                              order, the actual delivery of the product/service, including its refund/return would
                              wholly be
                              dependent on the vendor’s ability to do so, wherein the Platform would only facilitate the
                              cancellation
                              of such services if requested by You/the User. The communication of the same would be the
                              Platform’s
                              responsibility, as well as the Vendor’s.
                           </li>
                        </ul>

                        <p><strong>Shipping Policy</strong></p>
                        <p>
                           The Platform uses a range of third-party hyper-local, inter-state, and inter-continental
                           delivery
                           services to facilitate the delivery of the purchased products to the User. Once the item has
                           been shipped
                           to the delivery party, the delivery party has the highest responsibility to ensure the safe
                           communication
                           and delivery of the said items. In this scenario, Growciti as a platform, can only
                           provide
                           communication support of the said deliveries.
                        </p>

                        <p><strong>Access to growciti.in</strong></p>
                        <p>
                           The Website will do its utmost to ensure that availability of the Website will be
                           uninterrupted and
                           that transmissions will be error-free. However, due to the inherent and erratic nature of the
                           Internet,
                           this cannot be guaranteed. Also, your access to the Website may also be occasionally
                           suspended or
                           restricted to allow for repairs, maintenance, or the introduction of new facilities or
                           services at any time
                           without prior notice. Growciti Tech Services Private Limited will attempt to limit the frequency and
                           duration of any
                           such suspension or restriction.
                        </p>

                        <p><strong>Licence</strong></p>
                        <ul>
                           <li>
                              Subject to your compliance with these Terms of Service and Use and payment of applicable
                              fees,
                              if any, Growciti Tech Services Private Limited grants you a limited licence to access and make
                              personal use of this
                              website, but not to download (other than page caching) or modify it, or any portion of it,
                              except with
                              express written consent of Growciti Tech Services Private Limited and / or its affiliates, as may be
                              applicable.
                           </li>
                           <li>
                              The AR service is provided by Growciti Tech Services Pvt. Ltd. along with its business partners for
                              viewing
                              purposes and a limited use licence is to access and view only. You will not, either
                              directly or indirectly,
                              make personal use of this AR service, download (other than page caching) or modify it, or
                              any portion
                              of it, except with express written consent of Growciti Tech Services Private Limited and / or its
                              affiliates, as may be
                              applicable, which will be in the nature of monetary payment alone. Usage, access, and
                              display of such
                              services by our Vendors are subject to the terms of the Vendor Agreement between us and
                              Growciti Tech Services
                               Pvt. Ltd.
                           </li>
                           <li>
                              THIS LICENCE DOES NOT INCLUDE ANY RESALE OR COMMERCIAL USE OF THIS WEBSITE OR ITS
                              CONTENTS; ANY COLLECTION AND USE OF ANY PRODUCT OR SERVICE PROFESSIONAL LISTINGS,
                              DESCRIPTIONS, OR PRICES; ANY DERIVATIVE USE OF THIS WEBSITE OR ITS CONTENTS; ANY
                              DOWNLOADING OR COPYING OF ACCOUNT INFORMATION FOR THE BENEFIT OF ANOTHER SELLER; OR
                              ANY USE OF DATA MINING, ROBOTS, OR SIMILAR DATA GATHERING AND EXTRACTION TOOLS.
                           </li>
                           <li>
                              This website or any portion of this website (including but not limited to any copyrighted
                              material,
                              trademarks, or other proprietary information) may not be reproduced, duplicated, copied,
                              sold, resold,
                              visited, distributed, or otherwise exploited for any commercial purpose without express
                              written
                              consent of Growciti Tech Services Private Limited and / or its affiliates, as may be
                              applicable.
                           </li>
                           <li>
                              You may not frame or use framing techniques to enclose any trademark, logo, or other
                              proprietary
                              information (including images, text, page layout, or form) of growciti.in, its
                              Vendors and its
                              affiliates without express written consent. You may not use any meta tags or any other
                              "hidden text"
                              utilising Growciti Tech Services Private Limited's or its affiliates' names or trademarks
                              without the express
                              written consent of Growciti Tech Services Private Limited and / or its affiliates, as
                              applicable. Any unauthorised
                              use terminates the permission or license granted by Growciti Tech Services Private Limited and
                              / or its
                              affiliates, as applicable.
                           </li>
                           <li>
                              You are granted a limited, revocable, and non-exclusive right to create a hyperlink to the
                              Welcome
                              page of growciti.in as long as the link does not portray Growciti Tech Services Private
                              Limited,
                              growciti.in, their affiliates, or their products or services in a false, misleading,
                              derogatory, or
                              otherwise offensive matter. You may not use any growciti.in logo or other proprietary
                              graphic
                              or trademark as part of the link without express written consent of Growciti Tech Services
                              Private Limited and
                              / or its affiliates, as may be applicable.
                           </li>
                        </ul>

                        <p><strong>Your Conduct</strong></p>
                        <ul>
                           <li>You must not use the Website in any way that causes, or is likely to cause, the Website
                              or access
                              to it to be interrupted, damaged or impaired in any way. You understand that you, and not
                              growciti.in, are responsible for all electronic communications and content sent from
                              your
                              computer to the Website and you must use the website for lawful purposes only. You must
                              not use the
                              website for any of the following:
                              <ul>
                                 <li>for fraudulent purposes, or in connection with a criminal offense or other unlawful
                                    activity.</li>
                                 <li>to send, use or reuse any material that does not belong to you; or is illegal,
                                    offensive
                                    (including but not limited to material that is sexually explicit content or which
                                    promotes
                                    racism, bigotry, hatred or physical harm), deceptive, misleading, abusive, indecent,
                                    insulting
                                    or harassing, blasphemous, defamatory, libellous, obscene, pornographic,
                                    paedophilic, or
                                    menacing; ethnically objectionable, disparaging or in breach of copyright,
                                    trademark,
                                    patent,
                                    confidentiality, privacy or any other proprietary information or right; or is
                                    otherwise
                                    injurious
                                    to third parties; or relates to or promotes money laundering or gambling; or is
                                    harmful to
                                    minors in any way; or impersonates another person; or threatens the unity,
                                    integrity,
                                    defence,
                                    security or sovereignty of India or friendly relations with foreign States or public
                                    order
                                    or
                                    causes incitement to the commission of any cognisable offence or prevents
                                    investigation of
                                    any offence or is insulting other nation; or objectionable or otherwise unlawful in
                                    any
                                    manner
                                    whatsoever; or which consists of or contains software viruses or any other computer
                                    code,
                                    file
                                    or program designed to interrupt, destroy or limit the functionality of any computer
                                    resource,
                                    political campaigning, commercial solicitation, chain letters, mass mailings or any
                                    "spam;
                                    or is
                                    patently false and untrue.
                                 </li>
                                 <li>to cause annoyance, inconvenience, or needless anxiety.</li>
                              </ul>
                           </li>
                        </ul>

                        <p><strong>Indemnity and Release</strong></p>
                        <ul>
                           <li>
                              You shall indemnify and hold harmless Growciti Tech Services Private Limited, its subsidiaries,
                              affiliates
                              and their respective officers, directors, agents and employees, from any claim or demand,
                              or actions
                              including reasonable advocate's fees, made by any Vendor or penalty imposed due to or
                              arising out of
                              your breach of these Terms of Service and Use or any document incorporated by reference,
                              or your
                              violation of any law, rules, regulations or the rights of a third party.
                           </li>
                           <li>
                              You hereby expressly release Growciti Tech Services Private Limited and/or its affiliates
                              and/or any of its
                              officers and representatives from any cost, damage, liability, or other consequence of any
                              of the actions/inactions of the Vendors and specifically waiver any claims or demands that
                              you may have in
                              this behalf under any statute, contract or otherwise.
                           </li>
                        </ul>

                        <p><strong>Claims against Objectionable Content</strong></p>
                        <ul>
                           <li>
                              You can refer to the product detail / service professional page on growciti.in for
                              checking
                              any product details / service specifications provided by the Vendor regarding the
                              following:
                           </li>
                           <li>
                              the total price in single figure of any product or service, along with the breakup price
                              for the good
                              or service, showing all the compulsory and voluntary charges such as delivery charges,
                              postage and
                              handling charges, conveyance charges and the applicable tax, as applicable. These details
                              are available
                              on the invoice issued to you. Further, all contractual information required to be
                              disclosed by law is
                              incorporated as part of the Growciti Vendor Agreement executed by each
                              seller/vendor/service
                              professional/business on growciti.in, prior to listing its products and services.
                           </li>
                           <li>
                              Because growciti.in lists millions of products for sale offered by Vendors on the
                              Website
                              and hosts many thousands of comments, it is not possible for Growciti Tech Services Private Limited
                              to be aware of
                              the contents of each product/service listed for sale, or each comment that is displayed.
                              Accordingly,
                              growciti.in operates on a "notice and takedown" basis. If you believe that any
                              content on the
                              website is illegal, offensive (including but not limited to material that is sexually
                              explicit content or
                              which promotes racism, bigotry, hatred or physical harm), deceptive, misleading, abusive,
                              indecent,
                              insulting or harassing, blasphemous, defamatory, libellous, obscene, pornographic,
                              paedophilic,
                              invasive of another’s privacy or menacing; ethnically objectionable, disparaging; or in
                              breach of a third
                              party’s confidential, proprietary information or right; or is otherwise injurious to third
                              parties; or relates
                              to or promotes money laundering or gambling; or is harmful to minors in any way; or
                              impersonates
                              another person; or threatens the unity, integrity, defence, security or sovereignty of
                              India or friendly
                              relations with foreign States, or public order, or causes incitement to the commission of
                              any cognisable
                              offence or prevents investigation of any offence or in insulting other nation; or
                              objectionable or
                              otherwise unlawful in any manner whatsoever; or which consists of or contains software
                              viruses or any
                              other computer code, file or program designed to interrupt, destroy or limit the
                              functionality of any
                              computer resource; or is patently false and untrue ("Objectionable Content"), please
                              notify the Website
                              immediately. Once this procedure has been followed, growciti.in will make all
                              reasonable
                              endeavours to remove such Objectionable Content complained about within a reasonable time,
                              with
                              an opportunity to the offender to explain its version, as per the law.
                           </li>
                        </ul>

                        <p><strong>Copyright, authors' rights, and database rights</strong></p>
                        <ul>
                           <li>
                              All content included on the website, such as text, graphics, logos, button icons, images,
                              audio clips,
                              digital downloads, data compilations, and software, is the property of Growciti Tech Services
                              Private Limited,
                              its affiliates or its Vendors or content suppliers and is protected by India and
                              international copyright,
                              authors' rights, and database right laws. The compilation of all content on the Website is
                              the exclusive
                              property of Growciti Tech Services Private Limited and its affiliates and is protected by laws
                              of India and
                              international copyright and database right laws. All software and AR Services used on this
                              Website is
                              the property of Growciti Tech Services Private Limited, its affiliates or its software
                              suppliers and is protected
                              by India and international copyright and author' rights laws.
                           </li>
                           <li>
                              You may not systematically extract / or re-utilise parts of the contents of the website
                              without
                              Growciti Tech Services Private Limited and / or its affiliate's (as may be applicable) express
                              written consent.
                              You may not utilise any data mining, robots, or similar data gathering and extraction
                              tools to extract
                              (whether once or many times) for re-utilisation of any substantial parts of this website,
                              without Growciti Tech Services Private Limited and / or its affiliate's (as may be applicable) express written
                              consent. You may
                              also not create and/ or publish your own database that features substantial (eg: prices
                              and product
                              listings) parts of this website without Growciti Tech Services Private Limited and / or its
                              affiliate's (as may be
                              applicable) express written consent.
                           </li>
                        </ul>

                        <p><strong>Intellectual Property Claims</strong></p>
                        <p>
                           Growciti Tech Services Private Limited and its affiliates respect the intellectual property of
                           others. If you
                           believe that your intellectual property rights have been used in a way that gives rise to
                           concerns of
                           infringement, please notify Us immediately.
                        </p>

                        <p><strong>Trademarks</strong></p>
                        <p>
                           growciti.in, Growciti logo, and other marks indicated on the Website are trademarks
                           or registered trademarks of Growciti Tech Services Private Limited or its subsidiaries
                           (collectively
                           "Growciti") or our Vendors, in India and/or other jurisdictions. growciti.in's
                           graphics, logos,
                           page headers, button icons, scripts and service names are the trademarks or trade dress of
                           Growciti. Growcitis's trademarks and trade dress may not be used in connection with
                           any
                           product or service that is not Growciti's, in any manner that is likely to cause
                           confusion among
                           customers, or in any manner that disparages or discredits Growciti. All other trademarks
                           not
                           owned by Growciti that appear on the Website are the property of their respective owners
                           and
                           our Vendors, who may or may not be affiliated with, connected to, or sponsored by
                           Growciti.
                        </p>

                        <p><strong> Communications </strong></p>
                        <ul>
                           <li>
                              When you visit growciti.in, you are communicating with Us electronically, through the
                              Website. Communication between our Vendors and You will never be direct and will always be
                              through
                              the Website, who is the intermediary for all transactions. You will be required to provide
                              a valid phone
                              number while placing an order with our Vendors through Us. We may communicate with you by
                              e-mail,
                              SMS, phone call or by posting notices on the Website or by any other mode of
                              communication. For
                              contractual purposes, you consent to receive communications including SMS, e-mails, or
                              phone calls
                              from Us with respect to your order.
                           </li>
                           <li>
                              You agree, understand, and acknowledge that the Website is an online platform that enables
                              you
                              to purchase products and services listed on the Website at the price indicated therein at
                              any time from
                              any location. YOU FURTHER AGREE AND ACKNOWLEDGE THAT growciti.in AND Growciti Tech Services
                               PVT. LTD. IS ONLY A FACILITATOR/INTERMEDIARY AND IS NOT AND CANNOT BE A PARTY TO OR
                              CONTROL IN ANY MANNER ANY TRANSACTIONS ON THE WEBSITE. Accordingly, You agree and
                              understand that any contract of sale of products and services through the Website shall be
                              a strictly
                              bipartite contract directly between You and the Vendors.
                           </li>
                        </ul>

                        <p><strong>Losses</strong></p>
                        <p>Our Vendors, as well as the Website, will not be responsible for any business loss (including
                           loss
                           of profits, revenue, contracts, anticipated savings, data, goodwill or wasted expenditure) or
                           any other
                           indirect or consequential loss for any reason whatsoever when a contract for the sale of
                           products or
                           services by the Vendors to You was formed.
                        </p>

                        <p><strong>Alteration or Amendments to the Conditions</strong></p>
                        <p>
                           We reserve the right to make changes to our policies, and these Conditions of Sale at any
                           time.
                           You will be subject to the policies and Conditions of Sale in force at the time you order
                           products or
                           services from our Vendors through the Website, unless any change to those policies or these
                           conditions
                           is required to be made by law or government authority (in which case it will apply to orders
                           previously
                           placed by you, if so directed). If any of these conditions is deemed invalid, void, or for
                           any reason
                           unenforceable, that condition will be deemed severable and will not affect the validity and
                           enforceability of any remaining condition.
                        </p>

                        <p><strong>Events beyond our Reasonable Control</strong></p>
                        <p>We will not be held responsible for any delay or failure to comply with our obligations under
                           these conditions if the delay or failure arises from any cause or reason which is beyond our
                           reasonable control.
                        </p>

                        <p><strong>Waiver</strong></p>
                        <p>
                           If you breach these conditions and we take no action, we will still be entitled to use our
                           rights and
                           remedies in any other situation where you breach these conditions.
                        </p>

                        <p><strong>Disclaimer</strong></p>
                        <ul>
                           <li>
                              You acknowledge and undertake that you are accessing the products and services on the
                              Website
                              and transacting at your own risk and are using your best and prudent judgment before
                              entering
                              into
                              any transactions with the Vendors through the Website. The Website shall neither be liable
                              nor
                              responsible for any actions or inactions of vendors nor any breach of conditions,
                              representations or
                              warranties by the Vendors of the products or services and hereby expressly disclaim and
                              any
                              all
                              responsibility and liability in that regard. The Website may mediate or resolve any
                              dispute
                              or
                              disagreement between you and the Vendors of the products or services to the extent
                              possible,
                              subject
                              to the good-faith relations between you, the Vendors and the Website.
                           </li>
                           <li>
                              Growciti Tech Services Private Limited further expressly disclaim any warranties or representations
                              (express or
                              implied) in respect of quality, suitability, accuracy, reliability, completeness,
                              timeliness,
                              performance,
                              safety, merchantability, fitness for a particular purpose, or legality of the products or
                              services listed or
                              displayed or transacted or the content (including product or pricing information and/or
                              specifications)
                              on the Website. Growciti Tech Services Private Limited does not implicitly or explicitly support or
                              endorse the sale or
                              purchase of any products or services on the Website. At no time shall any right, title or
                              interest in the
                              products/services sold through or displayed on the website vest with Us nor shall the
                              Website
                              have any
                              obligations or liabilities in respect of any transactions on the Website.
                           </li>
                        </ul>

                        <p><strong>Vendors and Other Businesses</strong></p>
                        <p>
                           Vendors, who are neither Growciti Tech Services Private Limited nor its affiliates operate stores,
                           provide
                           services, or sell products on the Website (e.g.: Businesses offer products via the Product
                           Marketplace
                           and individuals/firms offer services via the Professional Services Page). The website is not
                           responsible
                           for examining or evaluating, and the Website does not warrant or endorse the offerings of any
                           of these
                           businesses or individuals/firms, or the content of their respective listings. Growciti Tech Services
                            Private
                           Limited does not assume any responsibility or liability for the actions, products, and
                           content of any of
                           these and any other third-parties. Terms and conditions between the Vendors and Us is
                           available here.
                        </p>

                        <p><strong>Governing Law and Jurisdiction</strong></p>
                        <ul>
                           <li>
                              Your use of this Website will be governed by and construed in accordance with the laws of
                              India.
                           </li>
                           <li>
                              You agree that any legal action or proceedings arising out of your use may be brought
                              exclusively
                              before the competent courts/fora/authorities having jurisdiction in New Delhi, India and
                              irrevocably
                              submit yourself to the jurisdiction of such courts/fora/authorities.
                           </li>
                        </ul>

                        <p><strong> Website Details</strong></p>
                        <p>
                           The Website is operated as an intermediary between the Vendors and you by Growciti Tech Services
                           Pvt. Ltd. For the growciti.in Website, you could contact us by visiting:
                           <br>
                           <b><a href="https://growciti.in/contact-us">www.growciti.in/contact-us</a></b>
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
