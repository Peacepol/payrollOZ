<script>
$(document).ready(function (){

    var table = $('#datatable').DataTable();
    $('#company').on('change', function() {
        var company_id = $(this).val();
        var tcode = $('#tenant_code').val();
               if(company_id) {
                   $.ajax({
                       url: '/'+tcode+'/getCompanyPayLocation/'+company_id,
                       type: "GET",
                       dataType: "json",
                       success:function(result)
                       { console.log(result);
                        table.clear().draw();
                           $('#paylocation_table_body').empty();
                           var paylocation_data = '';
                           $.each(result, function (index) {
                                paylocation_data += '<tr>';
                                paylocation_data += '<td>'+result[index].id+'</td>';
                                paylocation_data += '<td>'+result[index].paylocation_name+'</td>';
                                paylocation_data += '<td>'+result[index].paylocation_code+'</td>';
                                paylocation_data += '<td>\
                                                    <button class="btn btn-info btn-sm edit"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i> Edit</button>\
                                                     <form method="POST" action="PayLocation/'+result[index].id+'" accept-charset="UTF-8" style="display:inline">\
                                                        {{ method_field("DELETE") }}  	\
                                                        {{ csrf_field() }}	\
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Company" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>\
                                                    </form>\
                                                </td>';
                                paylocation_data += '</tr>';
                           });
                             $("#paylocation_table_body").html(paylocation_data);
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
   
        $('#paylocation_id').val( id);
        $('#paylocation_name').val(b_name);
        $('#paylocation_code').val( b_code); 
        
        $('#editpaylocationForm').attr('action', "paylocation/"+ id);
        
         $('#EditModal').modal('show');
       
    });
});
</script>