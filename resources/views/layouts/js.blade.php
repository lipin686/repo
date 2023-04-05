<script type="text/javascript">
    $(document).ready(function() {
        
    });

    $("#inputSearch").keydown(function(event) {
        var name = $("#inputSearch").val();
        
        if (event.keyCode == 13) {
            document.location.href = "/Search/" + name;
        };
    });
    $("#itemcount").on('change', function() {
        var count = $("#itemcount").val();
        var total = $("#itemtotal").text();

        if (Number(count) >= Number(total)) {
            $('#itemcount').val(Number(total));
        };
    });
    $('#increaseitembyone').on('click', function() {
        var count = $('#itemcount').val();
        var total = $("#itemtotal").text();

        if (Number(count) >= Number(total)) {
            $('#itemcount').val(Number(total));
            var href = $("#addcart").attr("href");
            $("#addcart").attr("href", href + "/" + Number(total));
        } else {
            $('#itemcount').val(Number(count) + 1);
            var href = $("#addcart").attr("href");
            $("#addcart").attr("href", href + "/" + Number(count) - 1);
        }

    });
    $('#decreaseitembyone').on('click', function() {
        var count = $('#itemcount').val();
        var href = $("#addcart").attr("href");
        
        if (Number(count) - 1 == 0) {
            $('#itemcount').val(1);
        } else {
            $('#itemcount').val(Number(count) - 1);
        }
    });

    function Search(e) {
        var name = $(e).parent().find("input").val();
        document.location.href = "/Search/" + name;
    }

    function addcart(e) {
        var count = $('#itemcount').val();
        document.location.href = "/add_to_cart/" + e.dataset.itemid + "/" + count;
    }
</script>