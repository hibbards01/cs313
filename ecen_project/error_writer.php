<?php
  // error_writer.php
  // Write the error message!

  /****************************
  * writeError
  *   Write the error to the error.txt
  *     file.
  ****************************/
  public function writeError($error)
  {
    // Open the file!
    $file = fopen("error.txt", "a");

    // Now write to it!
    $message = "ERROR message: " . $error;
    fwrite($file, $error);

    // Always close it...
    fclose($file);
  }
?>