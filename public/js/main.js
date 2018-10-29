document.addEventListener("DOMContentLoaded", function(event) {
    bindUserEditButtons();
    bindGenderDropdown();
});

function bindGenderDropdown() {
    var menuItems = document.getElementsByClassName("dropdown-item");
    for (var i = 0; i < menuItems.length; i++) {
        var item = menuItems[i];
        item.addEventListener('click', function(event){
            document.getElementById('gender-selected').textContent = this.text;
            document.getElementById('gender-val').value = this.text;
        });
    }

    $('.dropdown-menu a').click(function(){
        $('#selected').text($(this).text());
      });
}
function bindUserEditButtons() {
    var btns = document.getElementsByClassName("entity-edit-btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener('click', function(event){
            window.location.replace('/v1/users/' + this.dataset.id);
        });
    }
}