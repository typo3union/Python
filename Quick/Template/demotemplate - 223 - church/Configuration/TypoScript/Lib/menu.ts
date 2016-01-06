###################################################
# Menu
###################################################

lib.menu {
	homePageUID = {$homePageUID}

	main {
		entryLevel = {$navigationOneEntryLevel}
	}
	sub {
		entryLevel = {$navigationTwoEntryLevel}
	}
	#subOfSub {
		#entryLevel = {$navigationThreeEntryLevel}
	#}
	user {
		pageUid = {$navigationUserEntryId}
	}
	footer {
		pageUid = {$navigationFooterEntryId}
	}
	login {
		pageUid = {$navigationLogInPageId}
	}
}



[treeLevel = 1]

lib.menu {	
	subOfSub {
		entryLevel = 1
	}
}

page.headerData.554 = TEXT
page.headerData.554.value (
<style>
.left-bar ul.leftnavigation ul {display:none;}	
</style>
)

[global]

[treeLevel = 2]
lib.menu {	
	subOfSub {
		entryLevel = 2
	}
}

page.headerData.554 = TEXT
page.headerData.554.value (
<style>
.left-bar ul.leftnavigation ul {display:none;}	
</style>
)
[global]

[treeLevel = 3]
lib.menu {	
	subOfSub {
		entryLevel = 3
	}
}
page.headerData.554 = TEXT
page.headerData.554.value (
<style>
.left-bar ul.leftnavigation ul {display:none;}	
</style>
)
[global]

[treeLevel = 4]
lib.menu {	
	subOfSub {
		entryLevel = 4
	}
}
page.headerData.554 = TEXT
page.headerData.554.value (
<style>
.left-bar ul.leftnavigation ul {display:none;}	
</style>
)
[global]
[global]

[treeLevel = 5]
lib.menu {	
	subOfSub {
		entryLevel = 5
	}
}
page.headerData.554 = TEXT
page.headerData.554.value (
<style>
.left-bar ul.leftnavigation ul {display:none;}	
</style>
)
[global]