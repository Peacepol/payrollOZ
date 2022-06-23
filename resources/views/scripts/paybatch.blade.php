<script>
$(document).ready(function (){

    var table = $('#datatable').DataTable();
    $('#company').on('change', function() {
        var company_id = $(this).val();
        var tcode = $('#tenant_code').val();
               if(company_id) {
                   $.ajax({
                       url: '/'+tcode+'/getComp/'+company_id,
                       type: "GET",
                       dataType: "json",
                       success:function(result)
                       { console.log(result);
                        table.clear().draw();
                           $('#paybatch_table_body').empty();
                           var paybatch_data = '';
                           $.each(result, function (index) {
                                paybatch_data += '<tr>';
                                paybatch_data += '<td>'+result[index].id+'</td>';
                                paybatch_data += '<td>'+result[index].paybatch_name+'</td>';
                                paybatch_data += '<td>'+result[index].paybatch_code+'</td>';
                                paybatch_data += '<td>\
                                                    <button class="btn btn-info btn-sm edit"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i> Edit</button>\
                                                     <form method="POST" action="PayBatch/'+result[index].id+'" accept-charset="UTF-8" style="display:inline">\
                                                        {{ method_field("DELETE") }}  	\
                                                        {{ csrf_field() }}	\
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Company" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>\
                                                    </form>\
                                                </td>';
                                paybatch_data += '</tr>';
                           });
                             $("#paybatch_table_body").html(paybatch_data);
                     }
                   });
               }else{
               
                 $('#company_id').empty();
               }
    });    


    //Start Edit Record
    table.on('click','.edit', function() {

     var id = $(this).closest("tr").find("td").eq(0).text(); 
     var b_name = $(this).closest("tr").find("td").eq(1).text(); 
     var b_code = $(this).closest("tr").find("td").eq(2).text(); 
   
        $('#paybatch_id').val( id);
        $('#paybatch_name').val(b_name);
        $('#paybatch_code').val( b_code); 
        
        $('#editPayBatchForm').attr('action', "PayBatch/"+ id);
        
         $('#EditModal').modal('show');
       
    });
});
</script>