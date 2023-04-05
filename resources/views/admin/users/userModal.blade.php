<div class="modal fade" id="userEdit-modal" tabindex="-1" role="dialog" aria-labelledby="userEdit-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderEdit-modal-title">編輯訂單</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="userEdit-form" class="" method="POST" action="">
                @csrf
                <div class="modal-body">
                    <div class="card text-white bg-dark mb-0">
                        <div class="card-header">
                            <h2 id='userEdit-modal-label' class="m-0">編輯使用者</h2>
                        </div>
                        <div class="card-body">
                            <!-- Equivalent to... -->
                            <input type="hidden" name="_method" value="PUT">
                            <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> -->
                            <input type="hidden" name="modal-edit-id" id="modal-edit-id" value="">
                            <div class="form-group">
                                <label class="col-form-label" for="modal-edit-name">名稱</label>
                                <input type="text" name="modal-edit-name" class="form-control" id="modal-edit-name" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="modal-edit-email">Email</label>
                                <input type="text" name="modal-edit-email" class="form-control" id="modal-edit-email" required>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="modal-edit-password">重設密碼</label>
                                <input type="password" name="modal-edit-password" class="form-control" id="modal-edit-password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="儲存">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="userAdd-modal" tabindex="-1" role="dialog" aria-labelledby="userAdd-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userAdd-modal-title">新增使用者</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="userAdd-form" class="" method="POST" action="/admin/users">
                <div class="modal-body">
                    @csrf
                    <div class="card text-white bg-dark mb-0">
                        <div class="card-header">
                            <h2 id='userAdd-modal-label' class="m-0">新增使用者</h2>
                        </div>
                        <div class="card-body">
                            <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> -->
                            <div class="form-group">
                                <label class="col-form-label" for="modal-input-name">名稱</label>
                                <input type="text" name="modal-input-name" class="form-control" id="modal-input-name" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="modal-input-email">Email</label>
                                <input type="text" name="modal-input-email" class="form-control" id="modal-input-email" required>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="modal-input-password">密碼</label>
                                <input type="password" name="modal-input-password" class="form-control" id="modal-input-password" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="儲存">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                </div>
            </form>
        </div>
    </div>
</div>