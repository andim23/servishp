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
                    <select class="form-control users" id="users_add" name="users_add">
                        <option value="">--- Pilih Username ---</option>
                    </select>
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
                            <select class="form-control tempat" id="tempat_add" name="tempat_add">
                                <option value="">--- Pilih Tempat Lahir ---</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="text" class="form-control datepicker" id="tanggal_lahir_add" name="tanggal_lahir_add" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea cols="30" rows="2" class="form-control" id="alamat_add" name="alamat_add"></textarea>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Agama</label>
                            <select class="form-control agama" id="agama_add" name="agama_add">
                                <option value="">--- Pilih Agama ---</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>No Telp</label>
                            <input type="number" class="form-control" id="no_telp_add" name="no_telp_add" min="0">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control status" id="status_add" name="status_add">
                                <option value="">--- Pilih Status ---</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Kawin">Kawin</option>
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
                <input type="hidden" id="kode" name="kode">
                <div class="form-group">
                    <label>Username</label>
                    <select class="form-control users" id="users_update" name="users_update">
                        <option value="">--- Pilih Username ---</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="nama_update" name="nama_update" placeholder="Nama Lengkap">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin_update" name="jenis_kelamin_update">
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
                            <select class="form-control tempat" id="tempat_update" name="tempat_update">
                                <option value="">--- Pilih Tempat Lahir ---</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="text" class="form-control datepicker" id="tanggal_lahir_update" name="tanggal_lahir_update" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea cols="30" rows="2" class="form-control" id="alamat_update" name="alamat_update"></textarea>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Agama</label>
                            <select class="form-control agama" id="agama_update" name="agama_update">
                                <option value="">--- Pilih Agama ---</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>No Telp</label>
                            <input type="number" class="form-control" id="no_telp_update" name="no_telp_update" min="0">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control status" id="status_update" name="status_update">
                                <option value="">--- Pilih Status ---</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Kawin">Kawin</option>
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