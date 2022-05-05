$(document).ready(function() {

    url = "";
    
    $(document).on('click', '#qlSach', function() {
        url = "http://localhost:88/QLTV/index.php?controller=book";
        action = "get_book";
        load_data(action);
    })
})
function load_data(action) {
    $.ajax({
        url: url + "&action=" + action,
        method: "POST",
        data: {

        },
        success: function(dt) {
            $('#data').html(dt)
        }
    })
}