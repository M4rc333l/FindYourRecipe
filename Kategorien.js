function buttonReady(bildRequired, idName){
    let id = "";
    if(idName!=null){
        id = "suchen";
    }
    else {
        id = "button";
    }
    if(bildRequired==null && id !== "suchen"){
        document.querySelector('#'+id).disabled =
            !((document.getElementById('firstCheckbox').checked
                || document.getElementById('secondCheckbox').checked
                || document.getElementById('thirdCheckbox').checked
                || document.getElementById('fourthCheckbox').checked
                || document.getElementById('fifthCheckbox').checked
                || document.getElementById('sixthCheckbox').checked)
                && document.getElementsByName("zutaten")[0].value.trim().length>0
                && document.getElementsByName("zubereitung")[0].value.trim().length>0);
    }
    else if(bildRequired!=null && id === "button") {
        let file = document.getElementById("bild").files;
        document.querySelector('#'+id).disabled =
            !((document.getElementById('firstCheckbox').checked
                    || document.getElementById('secondCheckbox').checked
                    || document.getElementById('thirdCheckbox').checked
                    || document.getElementById('fourthCheckbox').checked
                    || document.getElementById('fifthCheckbox').checked
                    || document.getElementById('sixthCheckbox').checked) && file.length>0
                    && document.getElementsByName("zutaten")[0].value.trim().length>0
                    && document.getElementsByName("zubereitung")[0].value.trim().length>0);
    }
    if(idName==="suchen"){
        document.querySelector('#'+id).disabled =
            !((document.getElementById('firstCheckbox').checked
                || document.getElementById('secondCheckbox').checked
                || document.getElementById('thirdCheckbox').checked
                || document.getElementById('fourthCheckbox').checked
                || document.getElementById('fifthCheckbox').checked
                || document.getElementById('sixthCheckbox').checked));
    }
    if(document.getElementById("firstCheckbox").checked || document.getElementById("secondCheckbox").checked){
        document.getElementById("thirdCheckbox").disabled = true;
        document.getElementById("fourthCheckbox").disabled = true;
    }
    else {
        document.getElementById("thirdCheckbox").disabled = false;
        document.getElementById("fourthCheckbox").disabled = false;
    }
    if(document.getElementById("thirdCheckbox").checked || document.getElementById("fourthCheckbox").checked){
        document.getElementById("firstCheckbox").disabled = true;
        document.getElementById("secondCheckbox").disabled = true;
    }
    else {
        document.getElementById("firstCheckbox").disabled = false;
        document.getElementById("secondCheckbox").disabled = false;
    }
    if(id ==="button"){
        previewImage();
    }
}
function previewImage(){
    let file = document.getElementById("bild").files;
    if(file.length > 0){
        let fileReader = new FileReader();
        fileReader.onload = function (event){
            document.getElementById("preview").setAttribute("src", event.target.result);
        };
        fileReader.readAsDataURL(file[0]);
    }
}