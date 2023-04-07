
console.log(array);
var HtmlDaPagina = "<table class='table table-hover'>";
for (let i = 0; i < array.length; i++) {
    HtmlDaPagina += "<tbody><tr>";
    HtmlDaPagina += "<td>" + array[i].titulo + "</td>";
    HtmlDaPagina += "<td>" + array[i].genero + "</td>";
    HtmlDaPagina += "<td>" + array[i].data + "</td>";

    HtmlDaPagina += "</tr></tbody>";
}
HtmlDaPagina += "</table>";
HtmlDaPagina += '<span type="" class="badge bg-md bg-primary position-relative"> Quantidade de Series encontrada<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"> ' + array.length + ' <span class="visually-hidden">unread messages</span> </span></span>';
// escreve no HTML
var elemento = document.getElementById('receberDados');
elemento.innerHTML = HtmlDaPagina;
