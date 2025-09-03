<?php
include __DIR__ . "/../header.php";
?>
<div class="container my-4 d-flex flex-column mb-3">
    <h1>Batches</h1>
    <?php
    $selectedBatchId = $_POST['batch_id'] ?? null;
    ?>
    <select class="form-select" name="batch_id" id="batchSelect">
        <option selected disabled>Open this select menu</option>
        <?php foreach ($batches as $b): ?>
            <option value="<?= htmlspecialchars($b['id']) ?>"
                <?= ($b['id'] == $selectedBatchId) ? 'selected' : '' ?>>
                <?= htmlspecialchars($b['title']) ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

<div id="batchDetails" class="container"></div>

<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Open Modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Special Request</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="/php_crud/index.php?controller=batches&action=store">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">หมายเลขอ้างอิง</label>
                            <input type="text" class="form-control" name="ref_no" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput2" class="form-label">ชื่อ batches</label>
                            <input type="text" class="form-control" name="title" id="exampleFormControlInput2">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea3" class="form-label">รายละเอียด</label>
                            <textarea class="form-control" id="exampleFormControlTextarea3" name="description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('batchSelect').addEventListener('change', function() {
        document.getElementById('batchDetails').textContent = "Selected ID: " + this.value;
    });
</script>