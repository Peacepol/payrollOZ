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
        url:  "/"+tcode+"/branch/getBranchList",
        dataType: "json",
          success: function (result) {
            $(".branch_id").empty();
            $(".branch_id").append(
                '<option selected disabled value="0">Select Branch</option>'
            );
            if (result && result?.status === "success") {

              result?.data?.map((branch) => {
                  
                    const branches = `<option value='${branch?.id}'>${branch?.branch_code} - ${branch?.branch_name} </option>`;
                    $(".branch_id").append(branches);
                });
            }
        },
        error: function (result) {
            console.log("error", result);
        }
    });
});

</script>