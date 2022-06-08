<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1>Inbox</h1>
<a href="<?= base_url('messages/outbox') ?>">Go To Outbox</a>
<div class="loginbox">
    <img src="https://www.linkpicture.com/q/sammy-49.png">
</div>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>From</th>
            <th>Message</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($messages as $key => $message) : ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $message->nama ?></td>
                <td>
                    <a href="<?= base_url("messages/view/" . $message->messages_id) ?>">
                        <?= $message->message ?>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?= $this->endSection() ?>