<!DOCTYPE html>
<html>
<head>
	<title>test Onglet</title>
	<style type="text/css">

div#settings {
    position: relative;
    padding-left: 200px;
}
 
div#settings > div {
    min-height: 300px;
}
 
div#settings .ui-tabs-nav {
    position: absolute;
    left: 0px;
    top: 0px;
    bottom: 0px;
    width: 200px;
    padding: 5px 0px 5px 5px;
}
 
div#settings .ui-tabs-nav li {
    left: 0px;
    width: 195px;
    border-right: none;
    overflow: hidden;
    margin-bottom: 2px;
}
 
div#settings .ui-tabs-nav li a {
    float: right;
    width: 100%;
    text-align: right;
}
 
div#settings .ui-tabs-nav li.ui-tabs-selected {
    border: none;
    border-right: solid 1px #fff;
    background: none;
    background-color: #fff;
    width: 200px;
}
	</style>
</head>
<body>
	@model ByteCarrot.WebConsole.Web.Controllers.Settings.SettingsViewModel</pre>
<div id="settings">
<ul>
    <li><a href="@Url.Action(MVC.Account.List())">Users</a></li>
    <li><a href="@Url.Action(MVC.Account.List())">Settings 1</a></li>
    <li><a href="@Url.Action(MVC.Account.List())">Settings 2</a></li>
</ul>
</div>
<script type="text/javascript">
     $(function () {
         $("#settings").tabs();
     });
</script>

</body>
</html>