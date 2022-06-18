$('#addSer').click(function (e) {
    e.preventDefault();

    let outro = $('#outroSer').val();

    console.log(outro.length);

    if (outro !== null && outro !== "" && outro.length > 5) {
        $('.ser-box').prepend("<div class='form-check form-check-inline'><input class='form-check-input' type='checkbox' id='" + outro.toLowerCase().split(" ").join("") + "' name='serPtd[]' value='" + outro + "' checked><label class='form-check-label' for='" + outro.toLowerCase().split(" ").join("") + "'>" + outro + "</label></div>");
        $('#outroSer').val('');
    } else {
        if (!document.querySelector('.warning')) {
            $('#formSer').prepend("<p class='warning text-white text-center bg-danger py-2 px-2 rounded-2'>Por favor, preencha todos os campos!</p>");
        }
    }
})

document.getElementById('addSer').disabled = true;

document.getElementById('outroSer').addEventListener('input', function (e) {
    let content = document.getElementById('outroSer').value;

    if (content !== null && content !== "") {
        document.getElementById('addSer').disabled = false;
    } else {
        document.getElementById('addSer').disabled = true;
    }
})