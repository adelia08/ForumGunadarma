<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php
$keyword = [
    'name' => 'keyword',
    'value' => $keyword,
    'placeholder' => 'Keyword...'
];

$submit = [
    'name' => 'submit',
    'value' => 'Cari',
    'type' => 'submit',
];
?>
<h1>Threads</h1>
<a href="<?= base_url('thread/create') ?>" class="button">Buat Thread/Postingan Baru</a>

<?= form_open('thread/index', ['class' => 'form-inline']) ?>
<div>
    <?= form_input($keyword) ?>
</div>
<div class="ml-3">
    <?= form_submit($submit) ?>
</div>
<?= form_close() ?>
<!-- <div class="threadsbox">
    <img src="https://www.linkpicture.com/q/sammy-25.png">
</div> -->

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Thread</th>
            <th>Rating</th>
            <th>Kategori</th>
            <th>Posted By</th>
            <?php if (session()->get('role') == 0) : ?>
                <th>Action</th>
            <?php endif ?>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($threads->getResult() as $key => $thread) : ?>
            <tr>
                <td><?= $offset + $key + 1 ?></td>
                <td>
                    <a href="<?= base_url('thread/view/' . $thread->id) ?>">
                        <?= $thread->judul ?>
                </td>
                </a>
                <td>
                    <?php
                    for ($i = 0; $i < 5; $i++) {
                        if (($i + 1) <= $thread->rating) {
                            echo '<span class="fa fa-star checked"></span>';
                        } else {
                            echo '<span class="fa fa-star"></span>';
                        }
                    }
                    ?>
                    <br>
                    <small>dari <?= $thread->count_star ?> user</small>
                </td>
                <td><?= $thread->kategori ?></td>
                <td><?= $thread->nama ?></td>
                <?php if (session()->get('role') == 0) : ?>
                    <td>
                        <a href="<?= base_url('thread/update/' . $thread->id) ?>">Update</a>
                        <a href="<?= base_url('thread/delete/' . $thread->id) ?>">Delete</a>
                    </td>
                <?php endif ?>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= \Config\Services::pager()->makeLinks($page, $perPage, $total, 'custom_pagination') ?>
<?= $this->endSection() ?>