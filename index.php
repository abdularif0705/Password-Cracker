<!DOCTYPE html>
<head><title>Abdul Arif MD5 Password Cracker</title></head>
<!--https://www.wa4e.com/assn/crack/-->
<body>
<h1>MD5 Password Cracker</h1>
<p>
    This application takes an MD5 hash of a four
    digit pin and check all 10,000 possible four
    digit PINs to determine the PIN.
</p>
<pre>
Debug Output:
<?php
$goodtext = "Not found";
// If there is no parameter, this whole if statement is all skipped
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5']; // the entered MD5 hash code of the PIN

    // These are our numbers
    $txt = "123456789";
    $show = 15;

    // Outer loop to go through the number for the
    // first position in our "possible" pre-hash
    // PIN
    for($i=0; $i<strlen($txt); $i++) {
        $ch1 = $txt[$i];   // The first of four "characters"/digits in our PIN
        // Our inner loop. Note the use of new variables
        // $j and $ch2
        for($j=0; $j<strlen($txt); $j++) {
            $ch2 = $txt[$j];  // Our second character
            for($k=0; $k<strlen($txt); $k++) {
                $ch3 = $txt[$k];  // Our second character
                for ($l = 0; $l < strlen($txt); $l++) {
                    $ch4 = $txt[$l];  // Our second character

                    // Concatenate the two characters together to
                    // form the "possible" pre-hash text
                    $try = $ch1 . $ch2 . $ch3 . $ch4;

                    /*You must check all four-digit combinations. You must hash the value as a string not as an integer. For example, this shows the right and wrong way to check the hash for "1234":
                    $check = hash('md5', '1234');  // Correct - hashing a string
                    $check = hash('md5', 1234);    // Incorrect - hashing an integer*/

                    // Run the hash and then check to see if we match
                    $check = hash('md5', $try);
                    if ($check == $md5) {
                        $goodtext = $try;
                        break;   // Exit the inner loop
                    }

                    // Debug output until $show hits 0
                    if ($show > 0) {
                        print "$check $try\n";
                        $show = $show - 1;
                    }
                }
            }
        }
    }
    // Compute elapsed time
    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<p>Original Text: <?= htmlentities($goodtext); ?></p>
<form>
<input type="text" name="md5" size="60" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a
href="https://github.com/abdularif0705/Password-Cracker"
target="_blank">Source code for this application</a></li>
</ul>
</body>

