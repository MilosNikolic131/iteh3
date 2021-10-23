$('#dodajForm').submit(function(){
event,preventDefault();
console.log("dodavanje");
const $form = $(this);
const $input = $form.find('input','select','button','textarea');
const serijalizacija = $form.serialize();
console.log(serijalizacija);
$input.prop('disabled',true);
req = $.ajax({
    url: 'handler/add.php',
    type: 'post',
    data:serijalizacija
});
req.done(function(res,textStatus,jqXHR){
    if(res == "Success"){
        alert("kolokvijum uspesno dodat");
        location.reload(true);
    } else {
        console.log("");
    }
});
req.fail(function(jqXHR,textStatus,errorThrown){
console.error(textStatus, errorThrown);
})
})

$('#btn-obrisi').click(function(){
    event,preventDefault();
    const checked = $('input[name = checked-donut]:checked')
  
    req = $.ajax({
        url: 'handler/delete.php',
        type: 'post',
        data:{'id':checked.val()}
    });
    req.done(function(res,textStatus,jqXHR){
        if(res == "Success"){
            checked.closest('tr',remove());
        } else {
            console.log("");
        }
    });
    req.fail(function(jqXHR,textStatus,errorThrown){
    console.error(textStatus, errorThrown);
    })
    })