<div class="modal fade" id="orderEdit-modal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="orderEdit-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderEdit-modal-title">編輯訂單</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card text-white bg-dark mb-0">
                    <div class="card-header">
                        <h2 id='orderEdit-modal-label' class="m-0">編輯訂單</h2>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="modal-edit-id" id="modal-edit-id" value="">

                        <label class="col-form-label" for="modal-edit-name">使用者名稱</label>
                        <input type="text" name="modal-edit-name" class="form-control" id="modal-edit-name" value="{{$order->name}}" required autofocus>


                        <label class="col-form-label" for="modal-edit-phone">電話</label>
                        <input type="text" name="modal-edit-phone" class="form-control" id="modal-edit-phone" value="{{$order->phone}}" required>


                        <label class="col-form-label" for="modal-edit-address">地址</label>
                        <input type="text" name="modal-edit-address" class="form-control" id="modal-edit-address" value="{{$order->address}}" required>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">編輯</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
            </div>
        </div>
    </div>
</div>