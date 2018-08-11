function CargaEmpresas(){
    
    $.ajax({
        url: '/piece.json',
        type: "GET",
        dataType: "json",
        success: function (data) {
            alert(data);
        },
        error: function (data){

        }
    });
    
}