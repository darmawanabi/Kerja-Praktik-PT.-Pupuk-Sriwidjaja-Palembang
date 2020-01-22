(function() {
    $('button[id^="btnRevisi"]').click(function(){
        var full_id = this.id;
        var id = full_id.replace("btnRevisi", "");

        $('#modalRevisi' + id).modal('show');
        document.getElementById("modalReminder").classList.remove("bd-example-modal-xl");
        document.getElementById("modalReminderDialog").classList.remove("modal-xl");
    });

    $('button[id^="modalCancel"]').click(function(){
        var full_id = this.id;
        var id = full_id.replace("modalCancel", "");

        $('#modalRevisi' + id).modal('hide');
        document.getElementById("modalReminder").classList.add("bd-example-modal-xl");
        document.getElementById("modalReminderDialog").classList.add("modal-xl");
    });

    $('button[id^="modalTutup"]').click(function(){
        var full_id = this.id;
        var id = full_id.replace("modalTutup", "");

        $('#modalRevisi' + id).modal('hide');
        document.getElementById("modalReminder").classList.add("bd-example-modal-xl");
        document.getElementById("modalReminderDialog").classList.add("modal-xl");
    });
})(jQuery);
