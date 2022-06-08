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
            'name' => 'user-username',
            'placeholder' => 'USERNAME',
        ];
        $password = [
            'name' => 'user-password',
            'autocomplete' => 'new-password',
            'placeholder' => 'PASSWORD'
        ];
        $submit = [
            'name' => 'submit',
            'value' => 'LOGIN',
            'type' => 'submit',
            'class' => 'button'
        ]
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
            <h1>Login Forum Gunadarma</h1>
            <img src="https://www.linkpicture.com/q/sammy-29.png">
            <?= form_open('auth/login') ?>
            <?= form_input($username) ?>
            <?= form_password($password) ?>
            <?= form_submit($submit) ?>
            <p>Belum Terdaftar? </p>
            <a href=" <?= base_url('auth/register') ?>">Register</a>
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