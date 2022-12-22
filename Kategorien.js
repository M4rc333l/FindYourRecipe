function buttonReady(bildRequired, idName){
    if(idName!=null){
        idName = "suchen";
    }
    else {
        idName = "button";
    }
    if(bildRequired==null){
        document.querySelector('#'+idName).disabled = !((document.getElementById('firstCheckbox').checked || document.getElementById('secondCheckbox').checked || document.getElementById('thirdCheckbox').checked
            || document.getElementById('fourthCheckbox').checked || document.getElementById('fifthCheckbox').checked || document.getElementById('sixthCheckbox').checked)
            && document.getElementsByName("zutaten")[0].value.trim().length>0 && document.getElementsByName("zubereitung")[0].value.trim().length>0);
    }
    else {
        let file = document.getElementById("bild").files;
        document.querySelector('#'+idName).disabled = !((document.getElementById('firstCheckbox').checked || document.getElementById('secondCheckbox').checked || document.getElementById('thirdCheckbox').checked
            || document.getElementById('fourthCheckbox').checked || document.getElementById('fifthCheckbox').checked || document.getElementById('sixthCheckbox').checked) && file.length>0
            && document.getElementsByName("zutaten")[0].value.trim().length>0 && document.getElementsByName("zubereitung")[0].value.trim().length>0);
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
    previewImage();
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