<?php
session_start();
if (!empty($_SESSION['userType'])) {
    header('Location: sections/notifications.php');
}
?>

<!-- USER ACCOUNT 
van@gmail.com
van123
-->

<!-- MANAGER ACCOUNT
marge@gmail.com
marge123
-->

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Unichem</title>

    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/index.css?v=<?php echo time(); ?>">

</head>

<body class="text-center">
    <main class="form-signin border shadow">
        <form method="post" action="crud/login.php">
            <img class="mb-4" src="assets/images/Unichem-Logo-Text.svg" alt="" width="200" height="100" />

            <?php
            if (isset($_SESSION['msg'])) { ?>
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>

                <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        <?php echo $_SESSION['msg'] ?>
                    </div>
                </div>
            <?php
                unset($_SESSION['msg']);
            }
            ?>

            <div class="form-floating">
                <input type="email" class="form-control" name="email" placeholder="Email Address" />
                <label for="floatingInput">Email address</label>
            </div>

            <div class="form-floating mt-2">
                <input type="password" class="form-control" name="password" placeholder="Password" />
                <label for="floatingPassword">Password</label>
            </div>

            <button type="submit" class="w-100 btn btn-lg btn-primary mt-1" type="submit">
                Log in
            </button>

            <p class="mt-5 mb-3 text-muted">&copy; <script>
                    document.write(new Date().getFullYear())
                </script> | Unichem</p>
        </form>
    </main>
</body>

</html>