<script>
$(document).ready(function () {
   var table = $('#branch_table').DataTable();
     $('#company_id').on('change', function() {
         var company_id = $(this).val();
    var tcode = $('#tenant_code').val();
  
               if(company_id) {
                   $.ajax({
                       url: '/'+tcode+'/getCompany/'+company_id,
                       type: "GET",
                       dataType: "json",
                       success:function(result)
                       { console.log(result);
                        table.clear().draw();
                           $('#branch_table_body').empty();
                           var branch_data = '';
                           $.each(result, function (index) {
                               branch_data += '<tr>';
                                branch_data += '<td>'+result[index].id+'</td>';
                                branch_data += '<td>'+result[index].branch_name+'</td>';
                                branch_data += '<td>'+result[index].branch_code+'</td>';
                               branch_data += '<td>' + result[index].branch_address + '</td>';
                              var  branch_id = result[index].id;
                               branch_data += '<td>\
                                                    <button class="btn btn-info btn-sm edit"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i> Edit</button>\
                                                     <form method="POST" action="branch/'+branch_id+'" accept-charset="UTF-8" style="display:inline">\
                                                        {{ method_field("DELETE") }}  	\
                                                        {{ csrf_field() }}	\
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Company" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>\
                                                    </form>\
                                                </td>';
                                branch_data += '</tr>';
                           });
                             $("#branch_table_body").html(branch_data);
                     }
                   });
               }else{
               
                 $('#company_id').empty();
               }
            });
    
    table.on('click','.edit', function() {
var idx = $(this).find('td').eq(0).text();

     var id = $(this).closest("tr").find("td").eq(0).text(); 
     var b_name = $(this).closest("tr").find("td").eq(1).text(); 
     var b_code = $(this).closest("tr").find("td").eq(2).text(); 
     var b_address = $(this).closest("tr").find("td").eq(3).text(); 
   
        $('#branch_id').val( id);
        $('#edit_branch_name').val(b_name);
        $('#edit_branch_code').val( b_code); 
        $('#edit_branch_address').val(b_address); 
        
        $('#edit_branchform').attr('action', "branch/"+ id);
        
         $('#branchEdit').modal('show');
       
    });
    function CloseModalPopup() {       
        $("#branchEdit").modal('hide');
    }
    });
</script>