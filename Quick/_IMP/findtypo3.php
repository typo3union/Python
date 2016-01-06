<?php
    $grep_pattern = "";    
    $formatted = "";
    $output = array();
    $command = "";
	$search_path = ""; 
    if (!empty($_POST['grep_pattern'])) {
       
                $grep_pattern = $_POST['grep_pattern'];
               
        $case_insensitive = false;
        if (!empty($_POST['case_insensitive'])) {
            $case_insensitive = true;
        }
        $search_path = $_POST['search_path'];
        $command = "grep -RnI" . ($case_insensitive ? "i" : "") . " " . escapeshellarg($_POST['grep_pattern']) . " " . $search_path . " | grep -v \".svn\"";
        $result = -1;
        $return_code = -1;
        $result = exec($command, $output, $return_code);
        foreach($output as $line) {
            $grep_parts = explode(":", $line, 3); // split into three parts
            $filepath = $grep_parts[0];
            $lineno = $grep_parts[1];
            $matched_line = $grep_parts[2];

$formatted .= "<span class=\"path_component\"><a href=\"" . htmlspecialchars($filepath) . "\" target=\"_blank\"><span class=\"filename\">" . htmlspecialchars($filepath) . "</span></a>:" . $lineno . "</span> <span class=\"match_component\"><pre class=\"brush: php; first-line: " . $lineno . "\">" . htmlspecialchars($matched_line) . "</pre></span><br>";
        }
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <title>Find in TYPO3</title>
        <style type="text/css" media="screen">
            .filename {
                font-family: Helvetica;
                font-size: 10pt;
            }
        </style>
    </head>
    <body id="" onload="">
        <form action="findtypo3.php" method="post" accept-charset="utf-8">
            <label for="grep_pattern">Search for: </label><input type="text" name="grep_pattern" value="<?php echo $grep_pattern; ?>" id="grep_pattern">
            <label for="search_path">Search in: </label>
            <select name="search_path" id="search_path">
                <option <?php echo ($search_path == ".") ? "selected" : ""; ?> value=".">Search in entire TYPO3</option>
                <option <?php echo ($search_path == "fileadmin") ? "selected" : ""; ?> value="fileadmin">fileadmin</option>
                <option <?php echo ($search_path == "typo3conf") ? "selected" : ""; ?> value="typo3conf">typo3conf</option>
                <option <?php echo ($search_path == "typo3conf") ? "selected" : ""; ?> value="typo3">typo3</option>
                <option <?php echo ($search_path == "t3lib") ? "selected" : ""; ?> value="t3lib">t3lib</option>
                <option <?php echo ($search_path == "typo3temp") ? "selected" : ""; ?> value="typo3temp">typo3temp</option>
            </select>
            <input type="checkbox" name="case_insensitive" value="1" id="case_insensitive" checked="checked">
            <label for="case_insensitive"> Case Insensitive</label>
            <p><input type="submit" value="Search It! &rarr;"></p>
        </form>
<?php if (!empty($command)) { ?>
        Command: <code><?php echo htmlspecialchars($command); ?></code><br>
        Output: <br>
        <?php echo $formatted; ?>
        Last line of result was: <code><?php echo htmlspecialchars($result); ?></code><br>
        Return code is: <code><?php echo $return_code; ?></code><br>
        Number of results: <code><?php echo count($output); ?></code>
<?php } ?>
        <script type="text/javascript">
             SyntaxHighlighter.all()
        </script>
    </body>
</html>