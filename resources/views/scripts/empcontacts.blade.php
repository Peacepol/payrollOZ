
<script>
$(document).ready(function (){
    var tenantcode = $('#tenant_code').val();
    var table = $('#datatable').DataTable();
    //Start Edit Record
    table.on('click','.edit', function() {
        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        console.log(data);
        
        $('#emp_id').val(data[0]);
        $('#emp_cname').val(data[1]);
        $('#emp_cadd').val(data[2]); 
        $('#emp_cphone').val(data[3]); 
        $('#emp_cmobile').val(data[4]); 
        $('#emp_cemail').val(data[5]); 
        $('#emp_crelation').val(data[6]); 
        //$('#editForm').attr('action', '/'+data[0]);
        $('#EditModal').modal('show');
    });
});    
</script>