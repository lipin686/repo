<script type="text/javascript">
    $(document).ready(function() {
        $('#userstable').DataTable();
        $('#itemstable').DataTable();
        $('#orderstable').DataTable();
    });

    function userAdd() {
        $('#userAdd-modal').modal('show');
    }

    function userEdit(e) {
        var name = $(e).parent().parent().children(".name").text();
        var email = $(e).parent().parent().children(".email").text();

        $('#userEdit-form').attr("action", '/admin/users/' + e.dataset.userid);
        $("#modal-edit-id").attr("value", e.dataset.userid);
        $("#modal-edit-name").val(name);
        $("#modal-edit-email").val(email);

        $('#userEdit-modal').modal('show');
    }
    // $("#userEdit-modal").on("shown.bs.modal", function() {

    // });

    function userRemove(e) {
        var removeAlert = window.confirm('確認要刪除使用者?');

        if (removeAlert == true) {
            $.ajax({
                url: '/admin/users/' + e.dataset.userid,
                type: 'DELETE',
                data: {
                    _method: 'DELETE',
                    _token: "{{ csrf_token() }}",
                },

                success: function(res) {
                    //alert("a");
                    location.reload(true);
                },
                error: function(err) {
                    //alert(err.status);
                },
            });
        } else {
            alert('您已取消確認');
        }
    }

    function itemAdd() {
        $('#itemAdd-modal').modal('show');
    }

    function itemEdit(e) {
        var title = $(e).parent().parent().children(".title").text();
        // var pic = $(e).parent().parent().children(".pic").text();
        var price = $(e).parent().parent().children(".price").text();
        var totle = $(e).parent().parent().children(".totle").text();
        $('#itemEdit-form').attr("action", '/admin/items/' + e.dataset.itemid);
        $("#modal-edit-id").attr("value", e.dataset.itemid);
        $("#modal-edit-title").val(title);
        // $("#modal-edit-pic").val(pic);
        $("#modal-edit-price").val(price);
        $("#modal-edit-totle").val(totle);
        $('#itemEdit-modal').modal('show');
    }
    // $("#itemEdit-modal").on("shown.bs.modal", function() {

    // });

    function itemRemove(e) {

        var removeAlert = window.confirm('確認要刪除商品?');

        if (removeAlert == true) {
            $.ajax({
                url: '/admin/items/' + e.dataset.itemid,
                type: 'DELETE',
                data: {
                    _method: 'DELETE',
                    _token: "{{ csrf_token() }}",
                },

                success: function(res) {
                    //alert("a");
                    location.reload(true);
                },
                error: function(err) {
                    //alert(err.status);
                },
            });
        } else {
            alert('您已取消確認');
        }
    }

    function orderEdit(e) {
        $.ajax({
            url: '/admin/orders/' + e.dataset.orderid,
            type: 'GET',
            success: function(res) {

                $("#modal-edit-id").attr("value", e.dataset.itemid);
                $("#modal-edit-title").val(title);
                $("#modal-edit-pic").val(pic);
                $("#modal-edit-price").val(price);
                $("#modal-edit-totle").val(totle);
                $('#itemEdit-modal').modal('show');
            },
            error: function(err) {

            },
        });

    }
    // $("#orderEdit-modal").on("shown.bs.modal", function() {

    // });

    function orderRemove(e) {
        var removeAlert = window.confirm('確認要刪除訂單?');

        if (removeAlert == true) {
            $.ajax({
                url: '/admin/orders/' + e.dataset.orderid,
                type: 'DELETE',
                data: {
                    _method: 'DELETE',
                    _token: "{{ csrf_token() }}",
                },

                success: function(res) {
                    location.reload(true);
                },
                error: function(err) {},
            });
        } else {
            alert('您已取消確認');
        }
    }
    //上傳圖片預覽
    $("#modal-input-pic").change(function() {
        inputReadURL(this);
    });
    function inputReadURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#input-preview_image").attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    //修改圖片預覽
    $("#modal-edit-pic").change(function() {
        editReadURL(this);
    });
    function editReadURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#edit-preview_image").attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    //總選單 預覽圖片
    function previewImage(e) {
        
        $('#previewImageList').attr("src", '/storage/' + e.dataset.pic);
        $('#previewImage-modal').modal('show');
    }

</script>

