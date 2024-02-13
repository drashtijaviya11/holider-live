<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->

<style>
.temp{
    /* border: 1px solid #010101 !important;
    border-radius: 0px !important; */
}
    .whatsapp{
    background-color: #055c7491;
    padding: 5px;
    font-weight: bold;
}
@media (max-width: 767px) {
        .temp,label {
            font-size: 10px;
        }
    }
</style>

                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center whatsapp">Add Cotegory</div>
                        <hr>
                    </div>
                    <form action="" id="add_category"  method="post" >
                        <div class="row mt-2">
                            <div class="col-12">
                                <label for=""><?= lang('name') ?></label><i class="bi bi-star-fill"></i>
                                <input type="text" name="name" class="form-control temp" value="">
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
        $("#add_category").submit(function(e){
            e.preventDefault();
            var formValid = true;
                $(this).find('input[type="text"]').each(function () {
                    if ($(this).val().trim() === "") {
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
                url : "<?= base_url('admin/add_category') ?>",
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
                        $('#categoryModal').css('display','none');
                        $(".catTbody").append('<tr id='+res.id+'>'+res.html+'</tr>');
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