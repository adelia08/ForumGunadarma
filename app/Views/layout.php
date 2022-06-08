<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>CI Forum</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico" />
	<link rel="stylesheet" href="<?= base_url('style.css') ?>" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<?php
	$session = session();
	$errors = $session->getFlashdata('errors');
	$success = $session->getFlashdata('success');

	$modelMessages = new \App\Models\MessagesModel();

	$count_inbox = $modelMessages->where('id_recipient', $session->id)
		->where('is_read', 0)
		->countAllResults();

	?>
	<!-- HEADER: MENU + HEROE SECTION -->
	<header>

		<div class="menu">
			<ul>
				<a class="logo" href="<?= base_url("home/index") ?>"><img src="<?= base_url('logogf.png') ?>" alt="logo"></a>
				<li class="menu-toggle">
					<button onclick="toggleMenu();">&#9776;</button>
				</li>
				<li class="menu-item hidden"><a href="<?= base_url("thread/index") ?>">Thread</a></li>
				<li class="menu-item hidden"><a href="<?= base_url("messages/inbox") ?>">Inbox(<?= $count_inbox ?>)</a></li>
				<?php if ($session->role == 0) : ?>
					<li class="menu-item hidden"><a href="<?= base_url("user/index") ?>">User</a></li>
					<li class="menu-item hidden"><a href="<?= base_url("dashboard/index") ?>">Dashboard</a></li>
				<?php endif ?>
				<li class="menu-item hidden"><a href="<?= base_url("auth/logout") ?>">Logout (<?= $session->username ?>)</a></li>
			</ul>
		</div>

	</header>

	<!-- CONTENT -->


	<section>


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

		<?= $this->renderSection('content') ?>

	</section>

	<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

	<footer>

		<div class="copyrights">

			<p>&copy; <?= date('Y') ?> CodeIgniter Foundation. CodeIgniter is open source project released under the MIT
				open source licence.</p>

		</div>

	</footer>

	<!-- SCRIPTS -->
	<?= $this->renderSection('script') ?>

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