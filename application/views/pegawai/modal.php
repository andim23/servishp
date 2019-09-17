<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="error_add"></div>
            <?php echo form_open('', array('id' => 'form_add')); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Username</label>
                    <select class="form-control" id="users_add" name="users_add"></select>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="nama_add" name="nama_add" placeholder="Nama Lengkap">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin_add" name="jenis_kelamin_add">
                                <option value="">--- Pilih Jenis Kelamin</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" id="nama_add" name="nama_add" placeholder="Nama Lengkap">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="text" class="form-control datepicker" id="tanggal_lahir_add" name="tanggal_lahir_add" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Level</label>
                            <select class="form-control level" id="level_add" name="level_add" ></select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" id="status_add" name="status_add" >
                                <option value="">--- Pilih Status ---</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
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
                <h5 class="modal-title">Update Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('', array('id' => 'form_update')); ?>
            <div id="error_update"></div>
            <div class="modal-body">
                <input type="hidden" id="id" name="id">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="username_update" name="username_update" >
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password_update" name="password_update" placeholder="Password Minimal 3 Karakter">
                    <input type="hidden" class="form-control" id="password_old" name="password_old" >
                    <small>Jika tidak ingin merubah <b>PASSWORD</b> harap untuk <b>DIKOSONGKAN</b>.</small>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Level</label>
                            <select class="form-control level" id="level_update" name="level_update" ></select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" id="status_update" name="status_update" >
                                <option value="">--- Pilih Status ---</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Created</label>
                            <input type="text" class="form-control" name="created" id="created" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Terakhir Diubah</label>
                            <input type="text" class="form-control" name="updated" id="updated" readonly>
                        </div>
                    </div>
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