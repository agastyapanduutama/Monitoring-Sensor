<div class="card">
    <div class="card-header">
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kondisi Pompa</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($list as $key) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?php
                            if ($key->kondisi == '1') {
                                echo "Aktif";
                            } else {
                                echo "Tidak Aktif";
                            }
                            ?></td>
                        <td><?= $key->dibuat ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>