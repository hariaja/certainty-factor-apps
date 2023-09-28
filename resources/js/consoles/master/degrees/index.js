import { showConfirmationModal } from "@/utils/helper.js";

let table;

$(() => {
    table = $(".table").DataTable();
});

$(document).on("click", ".delete-degrees", function (e) {
    e.preventDefault();
    let url = urlDestroy.replace(":uuid", $(this).data("uuid"));
    showConfirmationModal(
        "Dengan menekan tombol hapus, Maka semua data <b>Derajat Kepastian</b> tersebut akan hilang!",
        "Hapus Data",
        url,
        "DELETE",
        handleSuccess
    );
});

function handleSuccess() {
    table.ajax.reload(); // Reload datatable setelah permintaan berhasil
}
