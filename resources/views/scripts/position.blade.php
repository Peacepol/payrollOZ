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

        $('#id').val(data[0]);
        $('#position_name').val(data[1]);
        $('#position_code').val(data[2]); 
        
        $('#editForm').attr('action', 'empposition/'+data[0]);
        $('#EditModal').modal('show');
    });
});    
</script>