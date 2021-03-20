function addZutat() {
    var block = document.querySelector('.zutatenblock');
    var neuer_block = block.cloneNode(true);

    document.querySelector('.zutatenliste').append(neuer_block);

    neuer_block.querySelector('select').value = "";
    neuer_block.querySelector('input[name="menge[]"]').value = "";
    neuer_block.querySelector('input[name="einheit[]"]').value = "";

    // optional
    var rand = (new Date()).getTime();
    neuer_block.querySelector('label[for="zutaten_id"]').setAttribute("for", "zutaten_id_" + rand);
    neuer_block.querySelector('select[id="zutaten_id"]').setAttribute("id", "zutaten_id_" + rand);
}
