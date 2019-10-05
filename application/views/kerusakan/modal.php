<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Kerusakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="error_add"></div>
            <?php echo form_open('', array('id' => 'form_add')); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Kerusakan</label>
                    <input type="text" class="form-control" id="kerusakan_add" name="kerusakan_add" required>
                </div>
                <div class="form-group">
                    <label>Harga Kerusakan</label>
                    <input type="number" class="form-control" id="harga_add" name="harga_add" min="0" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required>
                </div>
            </div>
            <div class="modal-footer no-bd">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Kerusakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('', array('id' => 'form_update')); ?>
            <div id="error_update"></div>
            <div class="modal-body">
                <input type="hidden" id="kode" name="kode">
                <div class="form-group">
                    <label>Nama Kerusakan</label>
                    <input type="text" class="form-control" id="kerusakan_update" name="kerusakan_update" required>
                </div>
                <div class="form-group">
                    <label>Harga Kerusakan</label>
                    <input type="number" class="form-control" id="harga_update" name="harga_update" min="0" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required>
                </div>
            </div>
            <div class="modal-footer no-bd">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>