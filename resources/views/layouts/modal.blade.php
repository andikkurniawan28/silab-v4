
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Change Password Modal-->
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <form action="{{ route('change_password') }}" method="POST"> --}}
                    @csrf
                    <p>Masukkan Password <strong>Lama</strong> Anda</p>
                    <p>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password_old" required>
                        </div>
                    </p>
                    <p>Masukkan Password <strong>Baru</strong> Anda</p>
                    <p>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Change Password</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Image Modal-->
    <div class="modal fade" id="uploadImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <form action="{{ route('upload_image') }}" method="POST" enctype="multipart/form-data"> --}}
                    @csrf

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image</label>
                        <input
                            type="file"
                            class="form-control-file"
                            accept="image/png, image/gif, image/jpeg"
                            name="image"
                        >
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Upload Image</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
