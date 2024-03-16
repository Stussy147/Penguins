(function () {
    document.getElementById('searchText').addEventListener('keydown', function (e) {
        if (e.key == "Enter") {
            // можете делать все что угодно со значением текстового поля
            alert(this.value);
        }
    });
})();