<script>
$(document).ready(function () {
   var table = $('#empflag_table').DataTable();
     $('#company_id').on('change', function() {
            var company_id = $(this).val();
            var tcode = $('#tenant_code').val();
  
               if(company_id) {
                   $.ajax({
                       url: '/'+tcode+'/getFlagCompany/'+company_id,
                       type: "GET",
                       dataType: "json",
                       success:function(result)
                       { 
                        console.log(result);
                        table.clear().draw();
                           $('#empflag_table_body').empty();
                           var empflag_data = '';
                           $.each(result, function (index) {
                               empflag_data += '<tr>';
                                empflag_data += '<td>'+result[index].id+'</td>';
                                empflag_data += '<td>'+result[index].emp_code+'</td>';
                                empflag_data += '<td>'+result[index].emp_fname +''+ result[index].emp_lname+'</td>';
                               empflag_data += '<td>' +result[index].comp_name + '</td>';
                               empflag_data += '<td>';
                              var flags =JSON.stringify(<?php echo json_encode(config('const.EMP_FLAG'));?>);
                                $.each(JSON.parse(flags), function(index, value){
                                    console.log(index);
                                });
                                empflag_data += '<select name="emp_flag" id="emp_flag" class="form-control emp_flag" value="" autofocus >';
                                                        $.each(JSON.parse(flags), function(flag_id, value){
                                                        empflag_data += '<option value="'+flag_id+'"'+ (flag_id === result[index].emp_flag ? "selected" : "" )+'>'+value+'</option>';
                                                    
                                                        });           
                                empflag_data += '</select> </td>';
                               empflag_data += '<td> <input type="date" name="emp_dot" id="emp_dot" class="form-control"value="'+ result[index].emp_dot+'" autocomplete="emp_dob" autofocus /></td>';
                              var  branch_id = result[index].id;
                               empflag_data += '<td>\
                                                    <button class="btn btn-success btn-sm saveflag" data-empid="{{ $item->id  }}"><i class="fa-solid fa-floppy-disk"></i> Save Flag</button>  \
                                                </td>';
                                empflag_data += '</tr>';
                           });
                             $("#empflag_table_body").html(empflag_data);
                     }
                   });
               }else{
               
                 $('#company_id').empty();
               }
            });
    
    table.on('click','.saveflag', function() {
     var id = $(this).closest("tr").find("td").eq(0).text(); 
    });

     $('#tbfilter').on('change', function() {
            var filter = $(this).val();
            var tcode = $('#tenant_code').val();
             alert(filter);
               if(filter) {
                   $.ajax({
                       url: '/'+tcode+'/FlagFilter/'+filter,
                       type: "GET",
                       dataType: "json",
                       success:function(result)
                       { 
                        console.log(result);
                        table.clear().draw();
                           $('#empflag_table_body').empty();
                           var empflag_data = '';
                           $.each(result, function (index) {
                                empflag_data += '<tr>';
                                empflag_data += '<td>'+result[index].id+'</td>';
                                empflag_data += '<td>'+result[index].emp_code+'</td>';
                                empflag_data += '<td>'+result[index].emp_fname +' '+ result[index].emp_lname+'</td>';
                                empflag_data += '<td>' +result[index].comp_name + '</td>';
                                empflag_data += '<td>';
                                var flags =JSON.stringify(<?php echo json_encode(config('const.EMP_FLAG'));?>);
                                $.each(JSON.parse(flags), function(index, value){
                                    console.log(index);
                                });
                                empflag_data += '<select name="emp_flag" id="emp_flag" class="form-control emp_flag" value="" autofocus >';
                                                        $.each(JSON.parse(flags), function(flag_id, value){
                                                        empflag_data += '<option value="'+flag_id+'"'+ (flag_id === result[index].emp_flag ? "selected" : "" )+'>'+value+'</option>';
                                                    
                                                        });           
                                empflag_data += '</select> </td>';
                                            
                               empflag_data += '<td> <input type="date" name="emp_dot" id="emp_dot" class="form-control"value="'+ result[index].emp_dot+'" autocomplete="emp_dob" autofocus /></td>';
                              var  branch_id = result[index].id;
                               empflag_data += '<td>\
                                                    <button class="btn btn-success btn-sm saveflag" data-empid="{{ $item->id  }}"><i class="fa-solid fa-floppy-disk"></i> Save Flag</button>  \
                                                </td>';
                                empflag_data += '</tr>';
                           });
                             $("#empflag_table_body").html(empflag_data);
                     }
                   });
               }else{
               
                 $('#company_id').empty();
               }
            });
});
    
</script>