<script>
$(document).ready(function () {
   var table = $('#department_table').DataTable();
     $('#company_id').on('change', function() {
         var company_id = $(this).val();
            var tcode = $('#tenant_code').val();
               if(company_id) {
             
                   $.ajax({
                       url: '/'+tcode+'/getCompanyDeps/'+company_id,
                       type: "GET",
                       dataType: "json",
                       success:function(result)
                       { console.log(result);
                            table.clear().draw();
                           $('#dept_table_body').empty();
                           var dep_data = '';
                           $.each(result, function (index) {
                               dep_data += '<tr>';
                                dep_data += '<td>'+result[index].id+'</td>';
                                dep_data += '<td>'+result[index].dep_code+'</td>';
                                dep_data += '<td>'+result[index].dep_name+'</td>';
                               dep_data += '<td>\
                                                <button class="btn btn-info btn-sm edit"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i> Edit</button>\
                                                     <form method="POST" action="department/'+result[index].id+'" accept-charset="UTF-8" style="display:inline">\
                                                        {{ method_field("DELETE") }}  	\
                                                        {{ csrf_field() }}	\
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Company" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>\
                                                    </form>\
                                                </td>';
                                dep_data += '</tr>';
                           });
                             $("#dept_table_body").html(dep_data);
                     }
                   });
               }else{
               
                 $('#company_id').empty();
               }
            });
    
    table.on('click','.edit', function() {
     var id = $(this).closest("tr").find("td").eq(0).text(); 
     var d_code = $(this).closest("tr").find("td").eq(1).text(); 
     var d_name = $(this).closest("tr").find("td").eq(2).text(); 
        $('#dep_id').val( id);
        $('#edit_dep_name').val(d_name);
        $('#edit_dep_code').val( d_code); 
        
        $('#edit_depform').attr('action', "department/"+ id);
        
         $('#depEdit').modal('show');
       
    });
   
    });
</script>