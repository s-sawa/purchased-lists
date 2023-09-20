// function openEditModal(id) {
//     $.when($(".modal-edit-container").addClass("active"))
//         .done(function () {
//             $.ajax({
//                 method: "POST",
//                 url: "/ajax",
//                 data: { id: id },
//                 dataType: "json",
//                 headers: {
//                     //以下のコードが必要。CSRFトークンの生成をしているぽい
//                     "X-CSRF-TOKEN": $("[name='csrf-token']").attr("content"),
//                 },
//             }).done(function (res) {
//                 $("#item-name").val(res.item_name);
//                 $("#item-maker").val(res.item_maker);
//                 $("#item-value").val(res.item_value);
//                 $("#id").val(res.id);
//                 if (res.want_level == 1) {
//                     $("#want-level1").prop("checked", true);
//                 } else {
//                     $("#want-level2").prop("checked", true);
//                 }
//             });
//         })
//         .fail(function () {
//             alert("ajax error");
//         });
// }

function openEditModal(id) {
    const url = "/ajax";
    const data = { id: id };
    const headers = {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document
            .querySelector("[name='csrf-token']")
            .getAttribute("content"),
    };

    fetch(url, {
        method: "POST",
        headers: headers,
        body: JSON.stringify(data),
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Ajax request failed");
            }
            return response.json();
        })
        .then((res) => {
            $("#item-name").val(res.item_name);
            $("#item-maker").val(res.item_maker);
            $("#item-value").val(res.item_value);
            $("#id").val(res.id);
            if (res.want_level == 1) {
                $("#want-level1").prop("checked", true);
            } else {
                $("#want-level2").prop("checked", true);
            }
        })
        .catch((error) => {
            console.error(error);
            alert("Ajax error");
        });

    $(".modal-edit-container").addClass("active");
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
