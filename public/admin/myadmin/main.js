//===============image show================
var loadFile = function(event)
{
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
}

var loadFile2 = function(event)
{
    var output = document.getElementById('output2');
    output.src = URL.createObjectURL(event.target.files[0]);
}

var loadFile3 = function(event)
{
    var output = document.getElementById('output3');
    output.src = URL.createObjectURL(event.target.files[0]);
}

var loadFile4 = function(event)
{
    var output = document.getElementById('output4');
    output.src = URL.createObjectURL(event.target.files[0]);
}