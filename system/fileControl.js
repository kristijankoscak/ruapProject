function chooseFile() {
    document.getElementById('fileToUpload').click();
    document.getElementById('fileToUpload').onchange = function(e){
        setLabel();
        
    };
}

function setLabel() {
    var chosenFile = document.getElementById('choosenFile');
    chosenFile.style.display="block";
    chosenFile.innerHTML = getFileName();
}
function getFileName() {
    path = document.getElementById('fileToUpload').value;
    parts = path.split("\\");
    //last = parts[parts.lenght-1];
    return parts[2];
}

$(document).mouseup(function(e) {
    var container = $(".chartjs-size-monitor");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        container.hide();
    }
});
