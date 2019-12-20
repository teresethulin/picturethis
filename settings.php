<?php require __DIR__ . '/views/header.php'; ?>

<?php if (!isset($_SESSION['user'])) {
    redirect('/');
} ?>

<?php $user = getUserById($_SESSION['user']['id'], $pdo); ?>

<section class="settings-page">
    <h2>Settings</h2>

    <form class="profile-image" action="app/users/profileimage.php" method="post" enctype="multipart/form-data">
        <div class="form-information">
            <label for="profile-image">Choose your profile image</label>
            <input class="input-field-information" type="file" accept="image/jpeg, image/png" name="profileimage" required>
            <button class="button-primary" type="submit" name="button">Upload photo</button>
        </div>
    </form>

    <form class="user-settings" action="app/users/biography.php" method="post" enctype="multipart/form-data">
        <div class="form-information">
            <label for="biography">Write some information about yourself</label>
            <textarea class="biography-field" name="biography" placeholder="<?= $user['biography'] ?>" cols="30" rows="10"></textarea>
            <br> <!-- not able to echo out the bio in placeholder-->
            <label for="name">Change your Name</label>
            <input class="input-field-information" type="text" name="edit-name" placeholder="<?= $user['fullname'] ?>">
            <br> <!-- Not working with SESSION either. -->
            <label for="username">Change your Username</label>
            <input class="input-field-information" type="text" name="edit-username" placeholder="<?= $user['username'] ?>">
            <br>
            <button class="submit-button" type="submit" name="button">Save your changes</button>
        </div>
    </form>

    <form action="app/users/update-email-settings.php" class="user-settings" method="post" enctype="multipart/form-data">
        <div class="form-information-email">
            <label for="email">Change your email</label>
            <br>
            <input class="input-field-information" type="email" name="current-email" placeholder="<?= $user['email'] ?>">
            <br>
            <input class="input-field-information" type="email" name="new-email" placeholder="New Email">
            <br>
            <input class="input-field-information" type="email" name="repeat-email" placeholder="Repeat New Email">
            <br>
            <button class="submit-button" type="submit">Save changes</button>
        </div>
    </form>

    <form action="app/users/update-password-settings.php" class="user-settings" method="post" enctype="multipart/form-data">
        <div class="form-information-password">
            <label for="password">Change your password</label>
            <br>
            <input class="input-field-information" type="password" name="current-password" placeholder="Current Password">
            <br>
            <input class="input-field-information" type="password" name="new-password" placeholder="New Password">
            <br>
            <input class="input-field-information" type="password" name="repeat-password" placeholder="Repeat New Password">
            <br>
            <button class="submit-button" type="submit">Save changes</button>
        </div>
    </form>

    <?php if (isset($_SESSION['message'])) : ?>
        <p><?php echo $_SESSION['message'];
                unset($_SESSION['message']); ?></p>
    <?php endif; ?>


</section>

<?php require __DIR__ . '/views/footer.php'; ?>