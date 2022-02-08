<?php if (isset($_SESSION['msg'])){ ?>

<div class="modal fade" id="popup-msg" tabindex="-1" aria-labelledby="popup-msgLabel" aria-hidden="true">
    <div class="modal-dialog" id="popup-msg">
        <div class="modal-content" id="popup-msg">
            <div class="modal-header" id="popup-msg">
                <h5 class="modal-title" id="popup-msgLabel">UniChem</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo $_SESSION['msg'] ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var myModal = new bootstrap.Modal(document.getElementById("popup-msg"), {});
    document.onreadystatechange = function() {
        myModal.show();
    };
</script>

<?php } unset($_SESSION['msg'])?>