import { showConfirmationModal } from "@/utils/helper.js";

let table;

$(() => {
    table = $(".table").DataTable();
});

$(document).on("click", ".delete-symptoms", function (e) {
    e.preventDefault();
    let url = urlDestroy.replace(":uuid", $(this).data("uuid"));
    showConfirmationModal(
        "Dengan menekan tombol hapus, Maka semua data <b>Gejala Penyakit</b> tersebut akan hilang!",
        "Hapus Data",
        url,
        "DELETE",
        handleSuccess
    );
});

// Show Detail disturbance
$(document).on("click", ".show-symptoms", function (e) {
    e.preventDefault();
    var url = urlShowDetail.replace(":uuid", $(this).data("uuid"));
    function showSymptom(url) {
        const modal = $("#modal-show-symptom");
        const modalContent = modal.find(".modal-content");

        modal.modal("show");
        modal.find(".block-title").text("Detail Data Dosen Pembimbing");

        $.get(url).done((response) => {
            const symptom = response.symptom;

            const elements = {
                "#symptom-code": symptom.code,
                "#symptom-point": symptom.point,
                "#symptom-description": symptom.description,
                "#symptom-disturbance": symptom.disturbance,
            };

            Object.entries(elements).forEach(([selector, value]) => {
                modalContent.find(selector).text(value);
            });
        });
    }

    return showSymptom(url);
});

function handleSuccess() {
    table.ajax.reload(); // Reload datatable setelah permintaan berhasil
}
