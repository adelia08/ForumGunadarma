<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CI Forum</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
    <link rel="stylesheet" href="<?= base_url('style.css') ?>" type="text/css">
</head>

<body>

    <!-- HEADER: MENU + HEROE SECTION -->

    <!-- CONTENT -->

    <section>
        <?php
        $session = session();
        $errors = $session->getFlashdata('errors');
        $success = $session->getFlashdata('success');
        $username = [
            'name' => 'username',
            'placeholder' => 'USERNAME',
        ];
        $password = [
            'name' => 'password',
            'placeholder' => 'PASSWORD',
            'autocomplete' => 'new-password',
        ];
        $repeatPassword = [
            'name' => 'repeatPassword',
            'placeholder' => 'REPEAT PASSWORD',
        ];
        $nama = [
            'name' => 'nama',
            'placeholder' => 'NAMA',
        ];
        $email = [
            'name' => 'email',
            'type' => 'email',
            'placeholder' => 'EMAIL',
        ];
        $tanggal_lahir = [
            'name' => 'tanggal_lahir',
            'type' => 'date',
            'placeholder' => 'TANGGAL LAHIR',
        ];
        $alamat = [
            'name' => 'alamat',
            'placeholder' => 'ALAMAT',
        ];
        $telp = [
            'name' => 'telp',
            'type' => 'number',
            'placeholder' => 'TELEPHONE/NO HANDPHONE',
        ];
        $avatar = [
            'name' => 'avatar',
            'value' => null,
        ];
        $submit = [
            'name' => 'submit',
            'value' => 'Submit',
            'type' => 'submit',
            'class' => 'button'
        ];
        ?>

        <?php if ($errors != null) : ?>
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <h4>Terjadi Kesalahan</h4>
                <hr>
                <p>
                    <?php foreach ($errors as $err) : ?>
                        <?= $err ?><br>
                    <?php endforeach ?>
                </p>
            </div>
        <?php endif ?>


        <?php if ($success != null) : ?>
            <div class="alert-success">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <h4>Sukses! <?= $success ?></h4>
            </div>
        <?php endif ?>

        <div class="login-container">
            <h1>REGISTER USER</h1>
            <?= form_open_multipart('user/create') ?>
            <?= form_input($username) ?>
            <?= form_password($password) ?>
            <?= form_password($repeatPassword) ?>
            <?= form_input($nama) ?>
            <?= form_input($tanggal_lahir) ?>
            <?= form_input($email) ?>
            <?= form_input($telp) ?>
            <?= form_textarea($alamat) ?>
            <strong><?= form_label("Avatar", "avatar") ?></strong>
            <?= form_upload($avatar) ?>
            <?= form_submit($submit) ?>

            <?= form_close() ?>
        </div>

    </section>

    <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

    <footer>

        <div class="copyrights">

            <p>&copy; <?= date('Y') ?> CodeIgniter Foundation. CodeIgniter is open source project released under the MIT
                open source licence.</p>

        </div>

    </footer>

    <!-- SCRIPTS -->

    <script>
        function toggleMenu() {
            var menuItems = document.getElementsByClassName('menu-item');
            for (var i = 0; i < menuItems.length; i++) {
                var menuItem = menuItems[i];
                menuItem.classList.toggle("hidden");
            }
        }
    </script>

    <!-- -->

</body>

</html>