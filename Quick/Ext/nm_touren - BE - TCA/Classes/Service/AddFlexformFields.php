<?php 

namespace TYPO3\NmTouren\Service;

class AddFlexformFields
{	
	public function specialField($PA, $fObj) {
		
        $color = (isset($PA['parameters']['color'])) ? $PA['parameters']['color'] : 'red';
        $formField  = '<div style="padding: 5px; background-color: ' . $color . ';">';
        $formField .= '<input type="text" name="' . $PA['itemFormElName'] . '"';
        $formField .= ' value="' . htmlspecialchars($PA['itemFormElValue']) . '"';
        $formField .= ' onchange="' . htmlspecialchars(implode('', $PA['fieldChangeFunc'])) . '"';
        $formField .= $PA['onFocus'];
        $formField .= ' /></div>';
        return $formField;
	}
}

?>