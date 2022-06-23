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
        url:  "/"+tcode+"/department/getDepartmentList",
        dataType: "json",
          success: function (result) {
            $(".dept_id").empty();
            $(".dept_id").append(
                '<option selected disabled value="0">Select Department</option>'
            );
            if (result && result?.status === "success") {

              result?.data?.map((department) => {
                  
                    const departments = `<option value='${department?.id}'>${department?.dep_code} - ${department?.dep_name} </option>`;
                    $(".dept_id").append(departments);
                });
            }
        },
        error: function (result) {
            console.log("error", result);
        }
    });
});

</script>