<div id="detail-template" class="card mb-3 d-none">
    <div class="card-body">
        <button type="button" class="btn btn-danger btn-sm float-end remove-detail">
            <i class="feather icon-x"></i>
        </button>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control detail-title" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control detail-description" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Picture</label>
                    <input type="file" class="form-control detail-image" accept="image/*" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="preview-container p-3 border rounded">
                    <div class="image-preview-container mt-3">
                        <img src="#" class="img-thumbnail d-none image-preview" alt="Image preview"
                            style="max-height: 200px;">
                        <div class="no-image text-muted">No image selected</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>