<div id="myModalStatic" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="padding: 5px 17px !important;">
                <div class="row rounded" style="border:2px solid #de58ff">
                    <div class="modal-header border border-0 py-0">
                        <h5 class="modal-title" id="staticBackdropLabel">&nbsp;</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <h3 class="text-center pb-3">Welcome to <i class="fa fa-building"></i> eBuildbazar India
                    </h3>
                    <h6 class="text-center">India's fastest-growing Construction Material & <br> Home Service
                        eCommerce Portal</h6>
                    <img src="{{static_asset('assets_web/img/Comming_Soon.png')}}" alt="Comming Soon" class="text-center w-auto m-auto py-4"
                        width="225px" height="250px">
                    <h6 class="text-center">We'll be launching our full service in India <br> by <b>December
                            2022</b></h6>
                    <h6 class="py-4 text-center">We are still functional though. If you've got any construction
                        requests, <br>
                        renovation ideas, or any home service in mind, reach out to us at <br>
                        <a href="mailto:info@ebuildbazar.in" class="fw-bold text-decoration-none text-black">
                            info@ebuildbazar.in </a>
                    </h6>
                    <h6 class="text-center pb-2">Be the first ones to be notified when we launch!</h6>
                    <h6 class="text-center w-auto m-auto p-2 rounded" style="border:2px solid #de58ff">
                        <input type="text" id="contact" name="contact" Placeholder="Your Email / Contact Info" class="popupsubmit"> 
                        <button type="submit" class="submit_btn_icon">
                            <i class="fa fa-circle-chevron-right"></i>
                        </button>
                    </h6>
                   <h8 class="text-center pb-2"><a href="https://vendor.ebuildbazaar.in/register">Register as a vendor</a></h8>
                </div>
                <h6 class="text-center py-5 text-success d-none" id="success_msg"></h6>
                <h6 class="text-center py-5 text-danger d-none" id="error_msg"></h6>
            </div>
        </div>
    </div>
</div>

<script>
    $(".submit_btn_icon").click(function(e){
        e.preventDefault();
            var contact =  $('#contact').val();
            console.log("contact : "+contact);
            if(contact!==''){
                var url = '{{ url('comming_soon/enquiry_form') }}';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:url,
                    method:'POST',
                    data:{
                        contact:contact,
                    },
                    success:function(response){
                        $('#contact').val('');
                        toastr.info("Your Request Sent Successfully!");
                        $('#success_msg').removeClass('d-none');
                        document.getElementById("success_msg").innerHTML="Thanks for Submitting! We'll reach out to you soon.";
                    },
                    error:function(error){
                        $('#error_msg').removeClass('d-none');
                        console.log(error);
                    }
                });
            }else{
                $('#error_msg').removeClass('d-none');
                document.getElementById("error_msg").innerHTML="Contact fields are Required.";
            }
       
    });

</script>