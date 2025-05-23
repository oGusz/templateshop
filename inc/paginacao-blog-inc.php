<?php
$PerPage = filter_input(INPUT_GET, 'perpage', FILTER_VALIDATE_INT);
$PerPage = (!empty($PerPage) || isset($PerPage) ? $PerPage : MIN_PER_PAGE);
$Page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
$Pager = new Pager(RAIZ . Check::AmmountURL($URL) . "&perpage={$PerPage}&page=");
$Pager->ExePager($Page, $PerPage);
?>