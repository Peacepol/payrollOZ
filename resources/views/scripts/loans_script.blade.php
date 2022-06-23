<script>
$(document).ready(function () {
   var table = $('#emploan_table').DataTable();
   var loans_table = $('#loans_table').DataTable();
   var loans_payment_table = $('#loans_payment_table').DataTable();
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

    loans_table.on('click','.payloan', function() {
     var loan_id = $(this).closest("tr").find("td").eq(0).text(); 
     var item_id = $(this).closest("tr").find("td").eq(1).text(); 
     var item_code = $(this).closest("tr").find("td").eq(2).text(); 
     var item_name = $(this).closest("tr").find("td").eq(3).text(); 
     var amt = $(this).closest("tr").find("td").eq(7).text(); 
     var bal = $(this).closest("tr").find("td").eq(9).text(); 
        $('#loan_id').val( loan_id);
        $('.item_id').val(item_id);
        $('.item_code').html(item_code);
        $('.item_name').html(item_name);
        $('.loan_id').html(loan_id);
        $('.loan_amount').html(Number(amt).toFixed(2));
        $('.loan_balance').html(Number(bal).toFixed(2));
        
         $('#PayLoan').modal('show');
       
    });

   var pay_items_table = $('#pay_items').DataTable();
    pay_items_table.on('click','.add_loan', function() {
     var id = $(this).closest("tr").find("td").eq(0).text(); 
     var item_code = $(this).closest("tr").find("td").eq(1).text(); 
     var item_name = $(this).closest("tr").find("td").eq(2).text(); 
        $('#item_id').val( id);
        $('.item_name').html(item_name);
        $('.item_code').html(item_code); 
         $('#AddItemModal').hide();
         $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        $('#edit_depform').attr('action', "department/"+ id);
         $('#AddLoan').modal('show');
       
    });
   
    });
</script>