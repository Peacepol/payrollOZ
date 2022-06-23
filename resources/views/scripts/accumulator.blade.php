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
        url:  "/"+tcode+"/PayAccumulator/getAccumulators",
        dataType: "json",
          success: function (result) {
            $(".accum_id").empty();
            if (result && result?.status === "success") {
              result?.data?.map((accum) => {
                    const accum_list = `<option value='${accum?.id}'> ${accum?.payaccumulator_code} - ${accum?.payaccumulator_name} </option>`;
                    $(".accum_id").append(accum_list);
                });
            }
        },
        error: function (result) {
            console.log("error", result);
        }
    });
});

</script>