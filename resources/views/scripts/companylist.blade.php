<script>
$(document).ready(function () {

      $.ajaxSetup({
       headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      }); 
    var tcode = $('#tenant_code').val();
  $.ajax({
        type: "get",
         url:  "/"+tcode+"/company/getCompanyList",
        dataType: "json",
          success: function (result) {
            $(".company_id").empty();
            $(".company_id").append(
                '<option selected value="0">Select Company</option>'
            );
            if (result && result?.status === "success") {

              result?.data?.map((company) => {
                  
                    const companies = `<option value='${company?.id}'> ${company?.comp_name} </option>`;
                    $(".company_id").append(companies);
                });
            }
        },
        error: function (result) {
            console.log("error", result);
        }
    });
});

</script>