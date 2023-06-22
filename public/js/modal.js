$(".modal-edit-close").on("click", function () {
    $(".modal-edit-container").removeClass("active");
});

//モーダルの外側をクリックしたらモーダルを閉じる
    // $(document).on("click", function (e) {
    //     if (!$(e.target).closest(".modal-edit-body").length) {
    //         $(".modal-edit-container").removeClass("active");
    //     }
    // });
    // $(document).on("click", function (e) {
    //     if (!$(e.target).closest(".msg").length) {
    //         $(".modal-edit-container").removeClass("active");
    //     }
    // });