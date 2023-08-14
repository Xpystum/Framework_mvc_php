<!-- Modal Alert Status -->
<button type="button" class="btn btn-primary modal_okno_active" data-toggle="modal" data-target=".bs-example-modal-sm" style="visibility:hidden;">Small modal</button>
<div class="modal fade bs-example-modal-sm in" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="display: none;" aria-hidden="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="mySmallModalLabel" style="font-weight: bold;">Успех</h4>
            </div>
            <div class="modal-body">
            <div class="alert alert-success" role="alert"><?php echo $data?></div>
            </div>
        </div>
    </div>
</div>


