
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

        $('#paybatch_id').val(data[0]);
        $('#company').val(data[1]);
        $('#paybatch_name').val(data[2]);
        $('#paybatch_code').val(data[3]); 
        
        $('#editPayBatchForm').attr('action', 'PayBatch/'+data[0]);
        $('#EditModal').modal('show');
    });
 
 
    
    function CloseModalPopup() {       
        $("#EditModal").modal('hide');
    }
 
});


