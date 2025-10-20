<?php $page = 'newtask';?>
<?php include( 'header.php' );?>
<div class="panel-container">
    <?php include( 'sidebar.php' );?>
    <main>
        <h1>ثبت کار جدید</h1>
        <form action="/new.php" id="task-form" method="POST" class="row">
            <div class="col col-12">
                <div class="form-group">
                    <label for="title">نام کار</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
            </div>
            <div class="col col-4">
                <div class="form-group">
                    <label for="status">وضعیت</label>
                    <select name="status" id="status" class="form-control">
                        <option value="queue">در صف انجام</option>
                        <option value="doing">در حال انجام</option>
                        <option value="done">انجام شده</option>
                        <option value="expire">منقضی شده</option>
                    </select>
                </div>
            </div>
            <div class="col col-4">
                <div class="form-group">
                    <label for="progress">درصد پیشرفت</label>
                    <input type="number" min="0" max="100" step="1" class="form-control" id="progress" name="progress" value="0">
                </div>
            </div>
            <div class="col col-4">
                <div class="form-group">
                    <label for="date">مهلت زمانی</label>
                    <input type="text" min="0" max="100" step="1" class="form-control date-field" id="date" name="date">
                </div>
            </div>
            <div class="col col-12">
                <input type="hidden" name="action" value="save_task">
                <button class="btn btn-primary" name="save_task">
                    ذخیره کار
                </button>
            </div>
        </form>

        <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            flatpickr(".date-field", {
                enableTime  : true,
                dateFormat  : "Y-m-d H:i:s",
            });
        </script>-->

    </main>
</div><!--.panel-container-->
<?php include( 'footer.php' );?>