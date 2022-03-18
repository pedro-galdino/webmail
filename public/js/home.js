function excluir(id){
    let form = document.getElementById("form1");
    form.action = "/excluirEmail/"+id;
}

function ler(id){
    let form = document.getElementById("form1");
    form.action = "/lerEmail/"+id;
}

$('.no-link').mouseover(function() {
    $("#"+$(this).attr('id')+".hidden-div").hide();
    $("#"+$(this).attr('id')+".show-div").show();
});

$('.no-link').mouseout(function() {
    $("#"+$(this).attr('id')+".hidden-div").show();
    $("#"+$(this).attr('id')+".show-div").hide();
});
