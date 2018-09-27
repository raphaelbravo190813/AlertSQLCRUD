
function Aplicar () {
	var elemento = document.getElementById("nombre")
	var elemento2 = document.getElementById("result")

	if (elemento.value != "") {
	elemento2.innerHTML = generate_token(20)}
}
function generate_token(length){
    //edit the token allowed characters
    var a = "abcdefghijklmnopqrstuvwxyz1234567890".split("");
    var b = [];  
    for (var i=0; i<length; i++) {
        var j = (Math.random() * (a.length-1)).toFixed(0);
        b[i] = a[j];
    }
    return b.join("");
}
