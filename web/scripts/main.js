function clicked() {
    alert("Clicked!");
}

function changeColor() {
    // Jquery
    $("#div1").css({"background-color": $("#newcolor").val()});

    // Vanilla JS
    // document.getElementById("div1").style.backgroundColor = document.getElementById("newcolor").value;
}


function fadeDiv3() {
}