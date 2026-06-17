<div id="detail-template" class="card mb-3 d-none">
    <div class="card-body">
        <button type="button" class="btn btn-danger btn-sm float-end remove-detail">
            <i class="feather icon-x"></i>
        </button>

        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Title (EN)</label>
                        <input type="text" class="form-control detail-title_en" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Title (ID)</label>
                        <input type="text" class="form-control detail-title_id" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Description (EN)</label>
                        <textarea class="form-control detail-description_en" rows="3" required></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Description (ID)</label>
                        <textarea class="form-control detail-description_id" rows="3" required></textarea>
                    </div>
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