<!DOCTYPE html>
<html lang="en">

<?php
require '../config/config.php';

session_start();
$id = session_id();

require "$root/functions.php";
?>

<head>
    <title>Messages for the results page</title>
    <meta name="robots" content="noindex">
</head>

<body>
  <?php
  $downloadPath = "$home/tmp/$id-gretel-results.txt";
  ?>

  <div id="results-found">
      <p><strong class="amount-hits">--</strong> result(s) have/has been found!</p>
      <small class="is-still-counting">Still counting the total amount of hits. This can take a while but you can already download the first 500 results by clicking the button below.</small>
      <p class="is-restricted" style="display: none;">We have restricted the output to 500 hits. You can find the reason for this
        <a href='<?php echo "$home/documentation.php#faq-1"; ?>' title="Why is the output limited to 500 sentences?" target="_blank">in our FAQ</a>.<br>
      </p>

      <p>
        <a href="<?php echo $downloadPath; ?>" title="Download results" class="download-link" target="_blank" download="gretel-results.txt">
        <i class="fa fa-fw fa-download" aria-hidden="true"></i> Download results</a>
    </p>
  </div>
  <div id="no-results-found">
      <strong>No results were found!</strong>
      <?php setPreviousPageMessage(1); ?>
  </div>
  <div id="error">
      <strong>Error! <span class="error-msg"></span></strong>
      <?php setPreviousPageMessage(1); ?>
  </div>
  <div id="looking-for-tree">
    <p>It seems that you want to open a tree in a new window. The tree first needs to be found again, but as soon as it is found it will pop up.</p>
  </div>
</body>

</html>