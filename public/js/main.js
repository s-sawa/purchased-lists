function openEditModal(id) {
    $.when($(".modal-edit-container").addClass("active"))
        .done(function () {
            $.ajax({
                method: "POST",
                url: "/ajax",
                data: { id: id },
                dataType: "json",
                headers: {
                    //以下のコードが必要。CSRFトークンの生成をしているぽい
                    "X-CSRF-TOKEN": $("[name='csrf-token']").attr("content"),
                },
            }).done(function (res) {
                $("#item-name").val(res.item_name);
                $("#item-maker").val(res.item_maker);
                $("#item-value").val(res.item_value);
                $("#id").val(res.id);
                if (res.want_level == 1) {
                    $("#want-level1").prop("checked", true);
                } else {
                    $("#want-level2").prop("checked", true);
                }
            });
        })
        .fail(function () {
            alert("ajax error");
        });
}
//削除ajax
function deleteAjax(id) {
    $.ajax({
        method: "POST",
        url: "/delete/" + id,
        data: { id: id },
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $("[name='csrf-token']").attr("content"),
        },
    })
        .done(function (response) {
            if (response.success) {
                console.log(response.message);
                //一意のIDでDOMを削除する。
                $("#list-" + id).remove();
                $("#information").empty();
                $("#information").append("< " +response.message + " >");
                $("#information").addClass('text-red-500');
                // 必要ならばDOMから要素を削除するなどの処理をここに追加
            } else {
                alert("Error: " + response.message);
            }
        })
        .fail(function () {
            alert("ajax error");
        });
}
$(document).on("click", "#editButton", function () {
    alert("a");
});
