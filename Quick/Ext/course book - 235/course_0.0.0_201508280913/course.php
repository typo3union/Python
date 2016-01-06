<?php
function course_title() {

  $title = $GLOBALS['TYPO3_DB']->exec_SELECTquery('name', 'tx_course_domain_model_course','hidden=0 AND deleted=0','','');
  $mytitles = '---Bitte wählen Sie einen Kurs---'."\r\n";
  while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($title)) {
    $mytitles .= $row['name']."\r\n";
  }

return $mytitles;
}

?>