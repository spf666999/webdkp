<?php
if(security::hasAccess("controlPanel")) {
$url = dispatcher::getUrl();
$toSelect = "home";

// Add a condition below to set it so that when the user clicks a tab, that tab  becomes visually selected.
if(fileutil::ContainsPath($url,"admin/security"))
	$toSelect = "security";
else if(fileutil::ContainsPath($url,"admin/webpages"))
	$toSelect = "pages";
else if(fileutil::ContainsPath($url,"admin/library"))
	$toSelect = "parts";
else if(fileutil::ContainsPath($url,"admin/themes"))
	$toSelect = "themes";
else if(fileutil::ContainsPath($url,"admin/content"))
	$toSelect = "content";
else if(fileutil::ContainsPath($url,"admin/databasefunctions"))
	$toSelect = "databasefunctions";

//check security
$showSecurity = (security::hasAccess("Edit Users") || security::hasAccess("Edit Permissions") || security::hasAccess("Edit User Groups"));
$showPages = (security::hasAccess("Edit Page") || security::hasAccess("Create Page"));
$showThemes = (security::hasAccess("Manage Themes"));
$showLibrary = (security::hasAccess("Manage Parts"));

?>
<div id="header">
	<img id="headerTitle" src="<?=$theme->getAbsDirectory()?>images/header/title.gif">
	<ul id="controlTabs">
		<li class="<?=($toSelect=="home"?"selected":"back")?>"><a href="<?=$SiteRoot?>admin/">Control Center</a></li>
		<li class="<?=($toSelect=="content"?"selected":"back")?>" ><a href="<?=$SiteRoot?>admin/content">Content</a></li>
		<?php if($showPages){ ?><li class="<?=($toSelect=="pages"?"selected":"back")?>" ><a href="<?=$SiteRoot?>admin/webpages">Pages</a></li><?php } ?>
		<?php if($showThemes){ ?><li class="<?=($toSelect=="themes"?"selected":"back")?>" ><a href="<?=$SiteRoot?>admin/themes">Themes</a></li><?php } ?>
		<?php if($showLibrary){ ?><li class="<?=($toSelect=="parts"?"selected":"back")?>" ><a href="<?=$SiteRoot?>admin/library">Parts</a></li><?php } ?>
		<?php if($showSecurity){ ?><li class="<?=($toSelect=="security"?"selected":"back")?>" ><a href="<?=$SiteRoot?>admin/security">User Administration</a></li><?php } ?>
		<?php if($showSecurity){ ?><li class="<?=($toSelect=="databasefunctions"?"selected":"back")?>" ><a href="<?=$SiteRoot?>admin/databasefunctions">Database Functions</a></li><?php } ?>
	</ul>
</div>
<?php } else { ?>

<div id="header">
	<img id="headerTitle" src="<?=$theme->getAbsDirectory()?>images/header/title.gif">
	<ul id="controlTabs">
		<li class="selected"><a href="<?=$SiteRoot?>admin/login">Login</a></li>
		<li class="back" ><a href="<?=$SiteRoot?>">Return to Site</a></li>

	</ul>
</div>
<?php } ?>