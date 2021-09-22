function runScript(e) {
    if (e.keyCode == 13) {
        if(document.getElementById("input").value != '') 
        {
            newElement();
            document.getElementById("input").value = '';
            return false;
        }
    }
}

var input = document.querySelector('#input');
var btn1 = document.querySelector('#btn1');
var content = document.querySelector('#content');
content.innerHTML = localStorage.getItem('localoldhtml');
var counter = localStorage.getItem('counter');

function newElement(){
    var value = input.value;
    var oldHtml = content.innerHTML
    content.innerHTML = oldHtml + '<div id="task' + counter + '" class="items"  style="clear:both"><label style="float:left;"><label class="container"><span id="span' + counter + '">' + value + ' </span><input type="checkbox" id="check'+ counter +'" onclick="ban(' + counter + ')" ><span class="checkmark"></span></label>  </label> <i style="float:right;" onclick="deleteItem(' + counter + ')">Delete</i></div>';
    localStorage.setItem('localoldhtml', content.innerHTML);
    counter++;
    localStorage.setItem('counter', counter);
}
function deleteItem(id) {
    document.querySelector('#task' + id).remove();
    localStorage.setItem('localoldhtml', content.innerHTML);
}
function ban(idd){
    id = "span" + idd;
    checkk = "check" + idd;
    if (document.getElementById(checkk).checked){
        document.getElementById(id).style.textDecoration = "line-through";
    }
    else{
        document.getElementById(id).style.textDecoration = "none";    
    }
}