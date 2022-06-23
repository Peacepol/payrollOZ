$.ajax({
    type: "POST",
    url: '/your_url',
    data: { somefield: "Some field value", _token: '{{csrf_token()}}' },
    success: function (data) {
       console.log(data);
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data);
 
    },
});