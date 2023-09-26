import { showConfirmationModal } from "@/utils/helper.js";

let table;

$(() => {
    table = $(".table").DataTable();
});

$(document).on("click", ".delete-disturbances", function (e) {
    e.preventDefault();
    let url = urlDestroy.replace(":uuid", $(this).data("uuid"));
    showConfirmationModal(
        "Dengan menekan tombol hapus, Maka semua data <b>Gangguan atau Penyakit</b> tersebut akan hilang!",
        "Hapus Data",
        url,
        "DELETE",
        handleSuccess
    );
});

// Show Detail disturbance
$(document).on("click", ".show-disturbances", function (e) {
    e.preventDefault();
    var url = urlShowDetail.replace(":uuid", $(this).data("uuid"));
    function showDisturbance(url) {
        const modal = $("#modal-show-disturbance");
        const modalContent = modal.find(".modal-content");

        modal.modal("show");
        modal.find(".block-title").text("Detail Data Dosen Pembimbing");

        $.get(url).done((response) => {
            const disturbance = response.disturbance;

            const elements = {
                "#disturbance-code": disturbance.code,
                "#disturbance-name": disturbance.name,
                "#disturbance-description": disturbance.description,
            };

            Object.entries(elements).forEach(([selector, value]) => {
                modalContent.find(selector).text(value);
            });
        });
    }

    return showDisturbance(url);
});

function handleSuccess() {
    table.ajax.reload(); // Reload datatable setelah permintaan berhasil
}
