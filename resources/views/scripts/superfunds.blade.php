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

        $('#superfund_id').val(data[0]);
        $('#product_name').val(data[1]);
        $('#registered_name').val(data[2]);        
        $('#contact_phone').val(data[3]);
        $('#email').val(data[4]);        
        $('#physical_address_line_1').val(data[5]);
        $('#physical_address_line_2').val(data[6]);
        $('#physical_suburb').val(data[7]);
        $('#physical_state').val(data[8]);
        $('#physical_post_code').val(data[9]);
        $('#postal_address_line_1').val(data[10]);
        $('#postal_address_line_2').val(data[11]);
        $('#postal_suburb').val(data[12]);
        $('#postal_state').val(data[13]);
        $('#postal_post_code').val(data[14]);
        $('#abn').val(data[15]);
        $('#bsb_account_number').val(data[16]);
        $('#website_url').val(data[17]);

        $('#editSuperFundForm').attr('action', 'SuperFunds/'+data[0]);
        $('#EditModal').modal('show');
    });
 
    function CloseModalPopup() {       
        $("#EditModal").modal('hide');
    }
});    
</script>