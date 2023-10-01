<div class="modal fade" id="modal-show-symptom" tabindex="-1" role="dialog" aria-labelledby="modal-popin" aria-hidden="true">
  <div class="modal-dialog modal-dialog-popin" role="document">
    <div class="modal-content">
      <div class="block block-rounded shadow-none mb-0">
        <div class="block-header block-header-default">
          <h3 class="block-title"></h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
              <i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content fs-sm">

          <ul class="list-group push">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              {{ trans('Kode') }}
              <span class="fw-semibold" id="symptom-code"></span>
            </li>
            <li class="list-group-item">
              {{ trans('Deskripsi') }}
              <p class="fw-semibold mb-0" id="symptom-description" style="text-align: justify"></p>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              {{ trans('Point CF') }}
              <span class="fw-semibold" id="symptom-point"></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              {{ trans('Gejala') }}
              <span class="fw-semibold" id="symptom-disturbance"></span>
            </li>
          </ul>

        </div>
        <div class="block-content block-content-full block-content-sm text-end border-top">
          <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
            {{ trans('Close') }}
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
