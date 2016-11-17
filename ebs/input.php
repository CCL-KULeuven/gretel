<?php
/**
 * EBS STEP 1: Takes a sentence as input from a user, which is processed in the next steps.
 *
 * A user inputs a valid XPath structure that will be queried in Basex. The XPath is
 * briefly validated before submitting (in js/scripts.js) check opening/closing tags match),
 * and fully parsed in the next step(s). A user can choose for a basic search, or an
 * adcanced search which will provide more options.
 *
 * @author Liesbeth Augustinus
 * @author Bram Vanroy
 */

session_start();
header('Content-Type:text/html; charset=utf-8');

$example = isset($_SESSION['example']) ? $_SESSION['example'] : 'Dit is een zin.';
// Unset previous session ID, we don't want one session to span multiple queries
session_regenerate_id(FALSE);
session_unset();

$currentPage = 'ebs';
$step = 1;

require "../config.php";
require ROOT_PATH."/helpers.php";

$id = session_id();
$time = time();
$_SESSION['queryid'] = "$id-$time";

require ROOT_PATH."/functions.php";
require ROOT_PATH."/front-end-includes/head.php";
?>
</head>
<?php flush(); ?>
<?php require ROOT_PATH."/front-end-includes/header.php"; ?>
    <form action="ebs/parse.php" method="post" enctype="multipart/form-data">
        <p>Enter a sentence, phrase, or constituent containing the (syntactic) characteristics you are looking for.</p>
        <div class="input-wrapper">
          <input type="text" name="input" placeholder="Dit is een voorbeeldzin." value="<?php echo $example; ?>" required>
          <button type="reset" name="clear" title="Empty the input field">
            <i class="fa fa-fw fa-times"></i>
            <span class="sr-only">Empty the input field</span>
          </button>
      </div>
        <?php setContinueNavigation(); ?>
    </form>

    <?php
    require ROOT_PATH."/front-end-includes/footer.php";
    include ROOT_PATH."/front-end-includes/analytics-tracking.php";
    ?>
</body>
</html>
