<div class="container">
                    <div class="row">
                        <div class="col-12 text-center whatsapp">Add Reply</div>
                        <hr>
                    </div>
                    <form action="" id="reply"  method="post" >
                        <div class="row mt-2">
                            <div class="col-12">
								<p><b>Message: </b><?= $contact_support['message'] ?></p>
								<input type="hidden" name="parrent_id" value="<?= $contact_support['id'] ?>">
								<input type="hidden" name="offer_id" value="<?= $contact_support['offer_id'] ?>">
								<input type="hidden" name="provider_id" value="<?= $contact_support['provider_id'] ?>">
								<input type="hidden" name="voucher_id" value="<?= $contact_support['voucher_id'] ?>">
								<input type="hidden" name="id" value="<?= $contact_support['id'] ?>">
                                <label for="">Reply</label><i class="bi bi-star-fill"></i>
                                <textarea id="message" class="require" name="message_reply" rows="4" cols="80" placeholder="Type your reply here..."></textarea>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 text-center">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>

                <script>
    $(document).ready(function(){
        $("#reply").submit(function(e){
            e.preventDefault();
            var formValid = true;
                $(this).find('input[type="text"]').each(function () {
                    if ($(this).val() === "") {
                        formValid = false;
                        return false;
                    }
                });

                if (!formValid) {
                    new Noty({
                        text: '* Fields are Required',
                        type: 'error',
                        timeout: 5000
                    }).show();
                    return; 
                    console.log("fill all fields");
                }
  /**********Loader**************/
  Swal.fire({
        title: 'Loading...',
        showConfirmButton: false,
        allowOutsideClick: false,
        willOpen: () => {
            Swal.showLoading();
        }
    });                                       
/**********Loader**************/ 
            var formData = new FormData(this);
            var phoneNumber = formData.get('phone');
            $.ajax({
                url : "<?= base_url('admin/save_contact_support_reply') ?>",
                data : formData,
                dataType : "json",
                type : "POST",
                contentType: false,
                processData: false,
                success : function(res)
                {
                    Swal.close(); 
                    if(res.status == true)
                    {
                        console.log(res);
                        $('#replyModal').css('display','none');
                        $(".Cont_SupportTbody #"+res.id+"").html(res.html);
                    }
                    else{
                        new Noty({
                            text: res.Message,
                            type: 'error',
                            timeout: 9000,
                        }).show();
                    }
                }
            });
        });
    });
</script>
