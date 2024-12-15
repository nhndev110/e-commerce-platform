<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload and attach file</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="actions">
          <div class="dropzone bg-light rounded fileinput-button" id="productImages">
            <div class="dz-message" data-dz-message>
              <p class="border rounded-circle" style="width: 50px">
                <i class="p-3 text-primary fas fa-cloud-upload-alt fa-lg"></i>
              </p>
              <p><span class="text-primary font-weight-bold">Click to Upload</span> or drag and drop</p>
              <p class="text-secondary">(Max. File size: 2MB)</p>
            </div>
            <div class="fallback">
              <input name="file" type="file" multiple />
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
